<?php
// Users Controller
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('logout'); //logout??
        
    }

    public function index() {
        //$this->User->recursive = 0;
        //$this->set('users', $this->paginate());
        $this->User->recursive = 0;
        $cond = array('OR' =>array('User.role' => 'admin'));
        $this->set('users', $this->paginate("User", $cond));
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
           
            if (AuthComponent::password($this->data['User']['password']) == AuthComponent::password($this->data['User']['password_confirm']))
            { $this->User->create();
            if ($this->User->save(array(
                    
                'username' => $this->request->data('User.username'),
                'password' => $this->request->data('User.password'),
		'role' => 'admin'))) 
               {
                $this->Session->setFlash(__('The user has been saved'));
               $this->redirect(array('action' => 'index'));
           } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
            }
            else{
                $this->Session->setFlash(__('Password do not match, please try again.'));
            }
        }
    }
    
  
   public function edit($id = null) {
        $this->User->id = $id;
      
       if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if (AuthComponent::password($this->request->data('User.password')) == AuthComponent::password($this->request->data('User.password_confirm')))
        {
            
        if ($this->request->is('post') || $this->request->is('put')) {
          
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } 
            else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->User->read(null, $id);
            unset($this->request->data['User']['password']);
        }
    }
    else {
            $this->Session->setFlash(__('Password do not match, please try again.'));
   }}

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
    
    public function login() {
        $this->layout = 'default.old'; //do not show default layout with menu bar
        
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                
                // Check for a successful login
                if (!empty($this->data) && $id = $this->Auth->user('id')) {
 
                    // Set the lastlogin time
                    $fields = array('last_login' => date('Y-m-d H:i:s'), 'modified' => false);
                    $this->User->id = $id;
                    $this->User->save($fields, false, array('last_login'));
                    }
                
                            //Redirect user
                            if ($this->Auth->user('role') === 'client') //if current user is client
                            {
                            $this->redirect(array('controller' => 'clientpages', 'action' => 'index')); //client pages index
                            }
                            else{
                                $this->Session->setFlash('Welcome!');
                                $this->redirect($this->Auth->redirect());
                            }
                    } 
                    else {
                    $this->Session->setFlash(__('Invalid username or password, try again'));
                    }
        }
    }

    public function logout() {
        $this->Session->setFlash('Logout successful');
    $this->redirect($this->Auth->logout());
}
}