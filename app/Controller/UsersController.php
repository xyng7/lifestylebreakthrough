<?php

// Users Controller
class UsersController extends AppController {
    
    var $components=array("Email","Session");
    var $helpers=array("Html","Form","Session");

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('logout', 'forgotpassword', 'reset', 'unsub'); //logout??
    }

    public function isAuthorized($user) {
        if (in_array($this->action, array('edit', 'add', 'delete'))) {
            if (isset($user['role']) && ($user['role'] === 'admin')) {
                return false;
            }
        }
        return parent::isAuthorized($user);
    }

    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->User->find('all', array('conditions' =>
                    array('User.role' => array('admin', 'superadmin'), 'User.flag_active' => 'active'))));
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {

            if (AuthComponent::password($this->data['User']['password']) == AuthComponent::password($this->data['User']['password_confirm'])) {
                $this->User->create();
                if ($this->User->save(array(
                            'username' => $this->request->data('User.username'),
                            'password' => $this->request->data('User.password'),
                            'role' => $this->request->data('User.role')))) {
                    $this->Session->setFlash(__('The user has been saved', true), 'success-message');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.', true), 'failure-message');
                }
            } else {
                $this->Session->setFlash(__('Password do not match, please try again.', true), 'failure-message');
            }
        }
    }

    public function edit($id = null) {
        $this->User->id = $id;

        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if (AuthComponent::password($this->request->data('User.password')) == AuthComponent::password($this->request->data('User.password_confirm'))) {

            if ($this->request->is('post') || $this->request->is('put')) {

                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been saved', true), 'success-message');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.', true), 'failure-message');
                }
            } else {
                $this->request->data = $this->User->read(null, $id);
                unset($this->request->data['User']['password']);
            }
        } else {
            $this->Session->setFlash(__('Password do not match, please try again.', true), 'failure-message');
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->saveField('flag_active', 'deactivate')) {
            $this->Session->setFlash(__('User archived', true), 'success-message');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not archive', true), 'failure-message');
        $this->redirect(array('action' => 'index'));
    }

    public function login() {
        $this->layout = 'logindefault'; //do not show default layout with menu bar

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $role = $this->Session->read('Auth.User.role');
                if($role === 'superadmin' || $role === 'admin'):
                    $this->__cleanup();
                endif;
                // Check for a successful login
                if (!empty($this->data) && $id = $this->Auth->user('id')) {

                    $this->loadModel('User');
                    $fields = array('last_login' => date('Y-m-d H:i:s'), 'modified' => false);
                    $this->User->id = $id;
                    $this->User->save($fields, false, array('last_login'));
                }
        
                ////Redirect user
                //if current user is client and activated
                if ($this->Auth->user('role') === 'client' && $this->Auth->user('flag_active') === 'active') { 
                    //client pages index
                    $this->redirect(array('controller' => 'clientpages', 'action' => 'index')); 
                }
                if ($this->Auth->user('role') === 'client' || 'user'  && $this->Auth->user('flag_active') === 'deactivate') { 
                    //if current user is client and activated
                    $this->Session->setFlash(__('Account has been deactivated', true), 'failure-message');
                } else {
                    //$this->Session->setFlash('Welcome!'); //annoying message
                    $this->redirect($this->Auth->redirect());
                }
            } else {
                $this->Session->setFlash(__('Invalid username or password, try again', true), 'failure-message');
            }
        }
    }
    
    private $__cleanup;
    private function __cleanup(){
                $this->loadModel('Program');
        $this->loadModel('Client');
        //get end date
        
        //Check if Client have any more program
        
         $this->Program->updateAll(
           array('flag_active' => '"deactivate"'),
           array('Program.flag_active'=>'active','end_date <' => date('Y-m-d', strtotime("-2 weeks")))
         );  
        $pp = $this->Client->Program->find('list',array('conditions' => array('flag_active'=>'deactivate'),'group' => 'client_id','fields'=>array('client_id')));
        $pa = $this->Client->Program->find('list',array('conditions' => array('flag_active'=>'active'),'group' => 'client_id','fields'=>array('client_id')));
        $pdiff = array_diff($pp,$pa);

        //Deactivate client here
        if(count($pdiff) > 0):
            foreach($pdiff as $p_id):
                //$this->User->id = $p_id;
                //$this->User->saveField('flag_active','deactivate');
           $this->User->updateAll(
                array('flag_active' => '"deactivate"'),
                array('flag_active'=>'active' , 'role'=>'client' , 'client_id'=>$p_id)
                );        
            endforeach;
        endif;
    }
    
    public function logout() {
        $this->Session->setFlash(__('Logout successful', true), 'success-message');
        $this->redirect($this->Auth->logout());
    }

    public function editmyown($id = null) {
        $this->User->id = $id;
        $user = $this->User->read(null, $id);

        if (!$this->User->exists() || AuthComponent::user('id') != $id) {
            $this->Session->setFlash(__('Unauthorised'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if (AuthComponent::password($this->request->data('User.old_password')) == $user['User']['password']) {
                if (AuthComponent::password($this->request->data('User.password')) == AuthComponent::password($this->request->data('User.new_password_confirm'))) {

                    if ($this->User->save($this->request->data)) {
                        $this->Session->setFlash(__('Details changed successfully', true), 'success-message');
                        $this->redirect(array('action' => 'index'));
                    } else {
                        $this->Session->setFlash(__('Change password failed. Please, try again.', true), 'failure-message');
                    }
                } else {
                    $this->Session->setFlash(__('Password do not match, please try again.', true), 'failure-message');
                }
            } else {

                $this->Session->setFlash(__('Incorrect old password, please try again.', true), 'failure-message');
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }

   /* public function forgotpassword() {
        $this->layout = 'forgotpassworddefault';  //dont use default layout with menu icons
    } */

    public function archive() {
        //print al archive admin
        $this->User->recursive = 0;
        $this->set('users', $this->User->find('all', array('conditions' =>
                    array('flag_active' => 'deactivate'))));
    }
    
    public function activate($id = null) {
        //activate archive admin
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid admin', true));
        }
        if ($this->User->saveField('flag_active', 'active')) {
            $this->Session->setFlash(__('Admin is now active', true), 'success-message');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Admin was not activated', true), 'failure-message');
        $this->redirect(array('action' => 'index'));
    }
    
     public function unsub() {
        $this->layout = 'unsubnewsdefault';
        $this->loadModel('Client');

        if (!empty($this->request->data['User']['address'])) {
            $ee = $this->request->data['User']['address'];
            $ec = $this->Client->find('list', array('conditions' => array('email' => $ee)));

            if (!empty($ec)) {

                $this->Client->updateAll(
                        array('subscription' => '"F"'), array('email' => $ee)
                );
                $this->Session->setFlash(__('You have successfully unsubscribe from Lifestyle Breakthrough newsletter', true), 'success-message');
            }else{
                $this->Session->setFlash(__('Invalid Email', true), 'failure-message');
            }
        }
    }

    //reset pw function
    
    function forgotpassword(){
        //$this->layout="signup";
        $this->layout = 'forgotpassworddefault'; 
        $this->User->recursive=-1;
        if(!empty($this->data))
        {
            if(empty($this->data['User']['username']))
            {
                $this->Session->setFlash(__('Please enter your email address or username', true), 'failure-message');
            }
            else
            {
                $email=$this->data['User']['username'];
                $fu=$this->User->find('first',array('conditions'=>array('User.username'=>$email)));
                if($fu)
                {
                    //debug($fu);
                    if($fu['User']['flag_active'] == 'active')
                    {
                        if($fu['User']['role'] == 'client')
                        {
                        $key = Security::hash(String::uuid(),'sha512',true);
                        $hash=sha1($fu['User']['username'].rand(0,100));
                        $url = Router::url( array('controller'=>'users','action'=>'reset'), true ).'/'.$key.'#'.$hash;
                        $ms=$url;
                        $ms=wordwrap($ms,1000);
                        //debug($url);
                        $fu['User']['tokenhash']=$key;
                        $this->User->id=$fu['User']['id'];
                        if($this->User->saveField('tokenhash',$fu['User']['tokenhash'])){
 
                                $email = new CakeEmail();
                                $email->config('default');
                                $email->viewVars(array('ms' => $ms));
                                $email->template('resetpw') 
                                        ->emailFormat('html')
                                        ->from(array('lifestylebreakthroughtest@gmail.com' => 'Lifestyle Breakthrough'))
                                        ->to($fu['User']['username'])
                                        ->subject('Password Reset')
                                        ->send();
           
   
                                $this->Session->setFlash(__('Email has been sent! Please check your email inbox for instructions on how to reset your password', true), 'success-message');
                            
                        }
                        else{
                            $this->Session->setFlash("Error Generating Reset link");
                        }
                        
                        }
                        
                        if($fu['User']['role'] == 'admin' || $fu['User']['role'] == 'superadmin')
                        {
                          $key = Security::hash(String::uuid(),'sha512',true);
                        $hash=sha1($fu['User']['username'].rand(0,100));
                        $url = Router::url( array('controller'=>'users','action'=>'reset'), true ).'/'.$key.'#'.$hash;
                        $ms=$url;
                        $ms=wordwrap($ms,1000);
                        //debug($url);
                        $fu['User']['tokenhash']=$key;
                        $this->User->id=$fu['User']['id'];
                        if($this->User->saveField('tokenhash',$fu['User']['tokenhash'])){
 
                                $email = new CakeEmail();
                                $email->config('default');
                                $email->viewVars(array('ms' => $ms));
                                $email->template('resetpw') 
                                        ->emailFormat('html')
                                        ->from(array('lifestylebreakthroughtest@gmail.com' => 'Lifestyle Breakthrough'))
                                        //->to('nathang@lifestylebreakthrough.com.au')  uncomment when ready for live
                                        ->to('lifestylebreakthroughtest@gmail.com')
                                        ->subject('Password Reset for: '. $fu['User']['username'])
                                        ->send();
           
   
                                $this->Session->setFlash(__('Email sent! Please check the default admin email inbox', true), 'success-message');
                            
                        }
                        else{
                            $this->Session->setFlash(__('Error generating reset link', true), 'failure-message');
                        }  
                        }
                        
                    }
                    else
                    {
                        $this->Session->setFlash(__('This account is not active', true), 'failure-message');
                    }
                }
                else
                {
                    $this->Session->setFlash(__('Email or user does not exist', true), 'failure-message');
                }
            }
        }
    }
    
    function reset($token=null){
        //$this->layout="Login";
          $this->layout = 'forgotpassworddefault'; 
        $this->User->recursive=-1;
        if(!empty($token)){
            $u=$this->User->findBytokenhash($token);
            if($u){
                $this->User->id=$u['User']['id'];
                if(!empty($this->data)){
                    
                    if (AuthComponent::password($this->request->data('User.password')) == AuthComponent::password($this->request->data('User.new_password_confirm'))) {
                    $this->User->data=$this->data;
                    $this->User->data['User']['username']=$u['User']['username'];
                    $new_hash=sha1($u['User']['username'].rand(0,100));//created token
                    $this->User->data['User']['tokenhash']=$new_hash;
                    if($this->User->validates(array('fieldList'=>array('password','new_password_confirm')))){
                        if($this->User->save($this->User->data))
                        {
                            $this->Session->setFlash(__('Password has been reset!', true), 'success-message');
                            $this->redirect(array('action'=>'login'));
                        }
 
                    }
                    else{
 
                        $this->set('errors',$this->User->invalidFields());
                    }
                } else {
                     $this->Session->setFlash(__('Password do not match, please try again.', true), 'failure-message');
                }
                }
            }
            
            else
            {
                $this->Session->setFlash(__('An error has occured. Please redo forgot password.', true), 'failure-message');
                $this->redirect(array('action'=>'login'));
            }
        }
 
        else{
            $this->redirect('/');
        }
    }
}