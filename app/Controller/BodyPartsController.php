<?php
App::uses('AppController', 'Controller');
/**
 * BodyParts Controller
 *
 * @property BodyPart $BodyPart
 */
class BodyPartsController extends AppController {

/**
 * index method
 *
 * @return void
 */
    
    public function isAuthorized($user) {
    
        if (in_array($this->action, array('delete', 'add', 'edit', 'index'))) {
        
            if (isset($user['role']) && ($user['role'] === 'admin')) {
        return false;
     } } 
    return parent::isAuthorized($user);
    }
    
	public function index() {
		$this->BodyPart->recursive = 0;
		$this->set('bodyParts', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->BodyPart->id = $id;
		if (!$this->BodyPart->exists()) {
			throw new NotFoundException(__('Invalid body part'));
		}
		$this->set('bodyPart', $this->BodyPart->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BodyPart->create();
			if ($this->BodyPart->save($this->request->data)) {
				$this->Session->setFlash(__('The body part has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The body part could not be saved. Please, try again.'));
			}
		}
		$exercises = $this->BodyPart->Exercise->find('list');
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
		$this->BodyPart->id = $id;
		if (!$this->BodyPart->exists()) {
			throw new NotFoundException(__('Invalid body part'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->BodyPart->save($this->request->data)) {
				$this->Session->setFlash(__('The body part has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The body part could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->BodyPart->read(null, $id);
		}
		$exercises = $this->BodyPart->Exercise->find('list');
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
		$this->BodyPart->id = $id;
		if (!$this->BodyPart->exists()) {
			throw new NotFoundException(__('Invalid body part'));
		}
		if ($this->BodyPart->delete()) {
			$this->Session->setFlash(__('Body part deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Body part was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
