<?php

App::uses('AppController', 'Controller');

/**
 * Clients Controller
 *
 * @property Client $Client
 */
class ClientsController extends AppController {

    public function isAuthorized($user) {
        if (in_array($this->action, array('delete', 'archive'))) {
            if (isset($user['role']) && ($user['role'] === 'admin')) {
                return false;
            }
        }
        return parent::isAuthorized($user);
    }

    /**
     * index method
     *
     * @return void
     */
       
   /* public function index() {
        $this->loadModel('User');
        $this->Client->recursive = 0;
        $this->set('clients', $this->Client->find('all'));
    }
    /*public function index() {
        $this->Client->recursive = 0;
        $this->set('clients', $this->Client->find('all', array('Client.flag_active LIKE' => '%active%')));
    }*/
       public function index() {
        $this->Client->recursive = 0;
        $this->set('clients', $this->Client->find('all', array('conditions' =>
                    array('User.role' => 'client', 'User.flag_active' => 'active'))));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Client->id = $id;
        if (!$this->Client->exists()) {
            throw new NotFoundException(__('Invalid client'));
        }
        $this->set('client', $this->Client->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {

            $this->Client->create();
            $this->loadModel('User');
            $this->User->create();

            if ($this->Client->save(
                            array(
                                'first_name' => $this->request->data('Client.first_name'),
                                'last_name' => $this->request->data('Client.last_name'),
                                'dob' => $this->request->data('Client.dob'),
                                'email' => $this->request->data('Client.email'),
                                'phone' => $this->request->data('Client.phone'),
                                'mobile' => $this->request->data('Client.mobile'),
                                'suburb' => $this->request->data('Client.suburb'),
                                'postal' => $this->request->data('Client.postal'),
                                'address' => $this->request->data('Client.address'),
                                'user_id' => $this->User->id,
                                'flag_active' => 'active'
                    ))
                    &&
                    $this->User->save(
                            array(
                                'username' => $this->request->data('Client.email'),
                                'password' => implode($this->request->data('Client.dob')),
                                'role' => 'client',
                                'client_id' => $this->Client->id,
                    ))) {

                //Send client email (with login details) function goes here (build 2)
                $this->sendEmailConfirmation($this->request->data('Client.first_name'), $this->request->data('Client.last_name'), $this->request->data('Client.email'), implode($this->request->data('Client.dob')));

                $this->Session->setFlash(__('The client has been added'));
                $this->Client->saveField('user_id', $this->User->id);
                //debug($this->User->id);
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The client could not be added. Please, try again.', true), 'failure-message');
            }
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Client->id = $id;
        if (!$this->Client->exists()) {
            throw new NotFoundException(__('Invalid client'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Client->save($this->request->data)) {
                $this->Session->setFlash(__('The client has been added', true), 'success-message');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The client could not be added. Please, try again.', true), 'failure-message');
            }
        } else {
            $this->request->data = $this->Client->read(null, $id);
        }
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

        $this->loadModel('User');
        $this->Client->id = $id;
        //get user id from client table
        $user_id = $this->Client->find('list', array('conditions' => array ('id'=>$id),'fields'=>'user_id'));
        //set client.user_id into user.user_id
        $this->User->id = $user_id[$id];
        
        if (!$this->Client->exists()) {
            throw new NotFoundException(__('Invalid client', true), 'failure-message');
        }
        
        if ($this->User->saveField('flag_active', 'deactivate')) {
            $this->Session->setFlash(__('Client archived', true), 'success-message');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Client was not archive', true), 'failure-message');
        $this->redirect(array('action' => 'index'));
    }

    public function archive() {
        $this->Client->recursive = 0;
        $this->set('clients', $this->Client->find('all', 
             array('conditions' => array('User.flag_active' => 'deactivate' , 'User.role' => 'client'))));
    }

    public function activate($id = null) {
        //activate archive client
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        $this->loadModel('User');
        $this->Client->id = $id;
        //get user id from client table
        $user_id = $this->Client->find('list', array('conditions' => array ('id'=>$id),'fields'=>'user_id'));
        //set client.user_id into user.user_id
        $this->User->id = $user_id[$id];

        if (!$this->Client->exists()) {
            throw new NotFoundException(__('Invalid client', true));
        }
        if ($this->User->saveField('flag_active', 'active')) {
            $this->Session->setFlash(__('Client is now active', true), 'success-message');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Client was not activated', true), 'failure-message');
        $this->redirect(array('action' => 'index'));
    }
    
    public function resendwelcome($id) {
        
        $client = $this->Client->read(null, $id);
        $time = date('d-m-Y', strtotime($client['Client']['dob']));
        $explode = explode('-', $time);
        $implode = implode($explode);
        $this->sendEmailConfirmation($client['Client']['first_name'], $client['Client']['last_name'], $client['Client']['email'], $implode); 
        $this->Session->setFlash(__('Email sent!', true), 'success-message');
        $this->redirect(array('action' => 'index')); 
       
    }

}