<?php
App::uses('AppController', 'Controller');
/**
 * Equipment Controller
 *
 * @property Equipment $Equipment
 */
class EquipmentController extends AppController {

/**
 * index method
 *
 * @return void
 */
    public function isAuthorized($user) {
    
        if (in_array($this->action, array('delete', 'add', 'edit', 'index'))) {
        
            if (isset($user['role']) && ($user['role'] === 'admin')) {
                $this->Session->setFlash(__('You must be Superadmin to access this function'));
        return false;
     } } 
    return parent::isAuthorized($user);
    }
    
	public function index() {
		$this->Equipment->recursive = 0;
		$this->set('equipment', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Equipment->id = $id;
		if (!$this->Equipment->exists()) {
			throw new NotFoundException(__('Invalid equipment'));
		}
		$this->set('equipment', $this->Equipment->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Equipment->create();
			if ($this->Equipment->save($this->request->data)) {
				$this->Session->setFlash(__('The equipment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The equipment could not be saved. Please, try again.'));
			}
		}
		$exercises = $this->Equipment->Exercise->find('list');
		$this->set(compact('exercises'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Equipment->id = $id;
		if (!$this->Equipment->exists()) {
			throw new NotFoundException(__('Invalid equipment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Equipment->save($this->request->data)) {
				$this->Session->setFlash(__('The equipment has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The equipment could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Equipment->read(null, $id);
		}
		$exercises = $this->Equipment->Exercise->find('list');
		$this->set(compact('exercises'));
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
		$this->Equipment->id = $id;
		if (!$this->Equipment->exists()) {
			throw new NotFoundException(__('Invalid equipment'));
		}
		if ($this->Equipment->delete()) {
			$this->Session->setFlash(__('Equipment deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Equipment was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
