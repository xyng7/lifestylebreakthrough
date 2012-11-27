<?php
App::uses('AppController', 'Controller');
/**
 * Postcodes Controller
 *
 * @property Postcode $Postcode
 */
class PostcodesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Postcode->recursive = 0;
		$this->set('postcodes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Postcode->id = $id;
		if (!$this->Postcode->exists()) {
			throw new NotFoundException(__('Invalid postcode'));
		}
		$this->set('postcode', $this->Postcode->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Postcode->create();
			if ($this->Postcode->save($this->request->data)) {
				$this->Session->setFlash(__('The postcode has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The postcode could not be saved. Please, try again.'));
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
		$this->Postcode->id = $id;
		if (!$this->Postcode->exists()) {
			throw new NotFoundException(__('Invalid postcode'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Postcode->save($this->request->data)) {
				$this->Session->setFlash(__('The postcode has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The postcode could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Postcode->read(null, $id);
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
		$this->Postcode->id = $id;
		if (!$this->Postcode->exists()) {
			throw new NotFoundException(__('Invalid postcode'));
		}
		if ($this->Postcode->delete()) {
			$this->Session->setFlash(__('Postcode deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Postcode was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        
        
        public function search($id = null) {
            $this->layout=null;
            if($id != null){
                $result = $this->Postcode->find('first',array('conditions'=>array('Pcode'=>$id),'fields'=>'locality'));
                echo ($result['Postcode']['locality']);
            }
        }
}
