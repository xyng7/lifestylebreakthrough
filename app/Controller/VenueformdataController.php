<?php
App::uses('AppController', 'Controller');

class VenueformdataController extends AppController {
    
    public function index() {
		$this->Venueformdatum->recursive = 0;
		$this->set('venueformdata', $this->paginate());
	}
        
    public function add() {
		if ($this->request->is('post')) {
			$this->Venueformdatum->create();
			if ($this->Venueformdatum->save($this->request->data)) {
                            
				$this->Session->setFlash(__('The venueformdatum has been saved', true), 'success-message');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The venueformdatum could not be saved. Please, try again.', true), 'failure-message');
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
		$this->Venueformdatum->id = $id;
		if (!$this->Venueformdatum->exists()) {
			throw new NotFoundException(__('Invalid venueformdatum'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Venueformdatum->save($this->request->data)) {
				$this->Session->setFlash(__('The venueformdatum has been saved', true), 'success-message');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The venueformdatum could not be saved. Please, try again.', true), 'failure-message');
			}
		} else {
			$this->request->data = $this->Venueformdatum->read(null, $id);
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
		$this->Venueformdatum->id = $id;
		if (!$this->Venueformdatum->exists()) {
			throw new NotFoundException(__('Invalid venueformdatum'));
		}
		if ($this->Venueformdatum->delete()) {
			$this->Session->setFlash(__('Venueformdatum deleted', true), 'success-message');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Venueformdatum was not deleted', true), 'failure-message');
		$this->redirect(array('action' => 'index'));
	}

}


?>
