<?php
App::uses('AppController', 'Controller');

/**
 * Clients Controller
 *
 * @property Client $Client
 */
class ClientsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Client->recursive = 0;
		$this->set('clients', $this->paginate());
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
                           
                             $this->User->save(array('username' => $this->request->data('Client.email'),
                                              'password' =>  $this->request->data('Client.last_name'),
                                              'role' => 'client')); 
                     debug($this->User->id);
                             debug($this->request->data);
                             debug($this->User->data);
                             if ($this->Client->save($this->request->data)) {
                            
                        
                            
				
                            debug($this->User->data);
                            $this->Session->setFlash(__('The client has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client could not be saved. Please, try again.'));
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
				$this->Session->setFlash(__('The client has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The client could not be saved. Please, try again.'));
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
		$this->Client->id = $id;
                debug($this->Client->user_id);
		if (!$this->Client->exists()) {
			throw new NotFoundException(__('Invalid client'));
		}
		if ($this->Client->delete()) {
			$this->Session->setFlash(__('Client deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Client was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
