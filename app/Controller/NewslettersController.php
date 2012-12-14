<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

/**
 * Newsletters Controller
 *
 * @property Newsletter $Newsletter
 */
class NewslettersController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
            
        $this->Newsletter->recursive = 0;
        $this->set('newsletters', $this->Newsletter->find('all'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Newsletter->id = $id;
        
        $template = new File(WWW_ROOT.'files'.DS.'templates'.DS.$id.'.html');	
        $msg = $template->read();
        $this->set('msg', $msg);
        
        if (!$this->Newsletter->exists()) {
            throw new NotFoundException(__('Invalid newsletter'));
        }
        $this->set('newsletter', $this->Newsletter->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Newsletter->create();
            $this->loadModel('User');
            $authuser = $this->Session->read('Auth.User');
            $user_id = $authuser['id'];

            if ($this->Newsletter->save(
                            array(
                                'title' => $this->request->data('Newsletter.title'),
                                'content' => $this->request->data('Newsletter.content'),
                                'user_id' => $user_id
                    ))) {
                $this->Session->setFlash(__('The newsletter has been saved', true), 'success-message');
                //$this->Newsletter->saveField('user_id', $this->User->id);
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The newsletter could not be saved. Please, try again.', true), 'failure-message');
            }
        }
        $users = $this->Newsletter->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null ) {
        $this->Newsletter->id = $id;
        if (!$this->Newsletter->exists()) {
            throw new NotFoundException(__('Invalid newsletter'));
        }
        $this->set('newsinfo', $this->Newsletter->find('all', array('conditions' => array('Newsletter.id' => $id))) );
        
        $template = new File(WWW_ROOT.'files'.DS.'templates'.DS.$id.'.html');	
        $msg = $template->read();
        $this->set('mfile',$id);
        $this->set('msg', $msg);

        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Newsletter->save($this->request->data)) {
                
			$template = new File(WWW_ROOT.'files'.DS.'templates'.DS.$this->data['Newsletter']['file'].'.html');
			$template->write($this->data['Newsletter']['content']);
			$template->close();                
                
                $this->Session->setFlash(__('The newsletter has been saved', true), 'success-message');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The newsletter could not be saved. Please, try again.', true), 'failure-message');
            }
        } else {
            $this->request->data = $this->Newsletter->read(null, $id);
        }
        $users = $this->Newsletter->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * delete method
     *
     * @throws MethodNotAllowedException
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Newsletter->id = $id;
        if (!$this->Newsletter->exists()) {
            throw new NotFoundException(__('Invalid newsletter'));
        }
        if ($this->Newsletter->delete()) {
            $this->Session->setFlash(__('Newsletter deleted', true), 'success-message');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Newsletter was not deleted', true), 'failure-message');
        $this->redirect(array('action' => 'index'));
    }

    public function send($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        $this->loadModel('User');
        $this->Newsletter->id = $id;
        $news = $this->Newsletter->read(null, $id);
        $r = $this->User->find('all', array('conditions' => array('User.role' => 'client', 'User.flag_active' => 'active')));

        foreach ($r as $s) {
            //debug($s);
            $email = new CakeEmail();
            $email->config('default');
            $email->emailFormat('html');
            $email->from(array('lifestylebreakthroughtest@gmail.com' => 'Lifestyle Breakthrough'));
            $client_email = $s['User']['username'];

            $email->subject('Monthly Newsletter');
            $email->to("$client_email");
            $newsletter_title = $news['Newsletter']['title'];
            //$newsletter_content = $news['Newsletter']['content'];
            
            $template = new File(WWW_ROOT.'files'.DS.'templates'.DS.$id.'.html');	
            $msg = $template->read();
            $msg = str_replace("{username}", ucwords($s['Client']['first_name']) . " " . ucwords($s['Client']['last_name']), $msg);
            $newsletter_content = $msg;
            $template->close();
            
            $email->subject($newsletter_title);
            $email->send($newsletter_content);
        }
        $this->Session->setFlash(__('Newsletter sent', true), 'success-message');
        $this->redirect(array('action' => 'index'));
        
    }

}
