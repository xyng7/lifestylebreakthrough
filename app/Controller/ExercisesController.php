<?php
App::uses('AppController', 'Controller');
/**
 * Exercises Controller
 *
 * @property Exercise $Exercise
 */
class ExercisesController extends AppController {
    

    public function isAuthorized($user) {
    
        if (in_array($this->action, array('delete', 'edit', 'index_superadmin'))) {
        
            if (isset($user['role']) && ($user['role'] === 'admin')) {
        return false;
     } }
     
    return parent::isAuthorized($user);
    }    

/**
 * index method
 *
 * @return void
 */
	public function index() {
            
            if (AuthComponent::user('role') === 'superadmin')
            {
                 $this->redirect(array('action' => 'index_superadmin'));
                
            }
            else {
                $this->Exercise->recursive = 0;
		$this->set('exercises', $this->paginate());
            }  
	}
        
        public function index_superadmin() {
      
		$this->Exercise->recursive = 0;
		$this->set('exercises', $this->paginate());
                
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Exercise->id = $id;
		if (!$this->Exercise->exists()) {
			throw new NotFoundException(__('Invalid exercise'));
		}
		$this->set('exercise', $this->Exercise->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Exercise->create();

                       // $this->request->data['bodypart']['bodypart'] = array(); 
                       // foreach($this->data['bodypart'.'checkbox'] as $k=>$v) 
                       // { 
                        //    if ($v) $this->request->data['bodypart']['bodypart'][] = $k; 
                       // } 
			
                        if ($this->Exercise->save($this->request->data)) {
				$this->Session->setFlash(__('The exercise has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The exercise could not be saved. Please, try again.'));
			}
		}
		$bodyParts = $this->Exercise->BodyPart->find('list');
		$categories = $this->Exercise->Category->find('list');
		$equipment = $this->Exercise->Equipment->find('list');
                
                //exercise
                $this->set('exercise_bodyparts',$this->Exercise->BodyPart->find('all'));
                //categories
                $this->set('exercise_categories',$this->Exercise->Category->find('all'));
                //equipment
                $this->set('exercise_equipment',$this->Exercise->Equipment->find('all'));
                
                
		$this->set(compact('bodyParts', 'categories', 'equipment'));
             
               
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Exercise->id = $id;
		if (!$this->Exercise->exists()) {
			throw new NotFoundException(__('Invalid exercise'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Exercise->save($this->request->data)) {
				$this->Session->setFlash(__('The exercise has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The exercise could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Exercise->read(null, $id);
		}
		$bodyParts = $this->Exercise->BodyPart->find('list');
		$categories = $this->Exercise->Category->find('list');
		$equipment = $this->Exercise->Equipment->find('list');
		$programs = $this->Exercise->Program->find('list');
                $exercise = $this->Exercise->read(null, $id);
		$this->set(compact('bodyParts', 'categories', 'equipment', 'programs', 'exercise'));
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
		$this->Exercise->id = $id;
		if (!$this->Exercise->exists()) {
			throw new NotFoundException(__('Invalid exercise'));
		}
		if ($this->Exercise->delete()) {
			$this->Session->setFlash(__('Exercise deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Exercise was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
