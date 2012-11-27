<?php
App::uses('AppController', 'Controller');
/**
 * Instructions Controller
 *
 * @property Instruction $Instruction
 */
class InstructionsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Instruction->recursive = 0;
		$this->set('instructions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Instruction->id = $id;
		if (!$this->Instruction->exists()) {
			throw new NotFoundException(__('Invalid instruction'));
		}
		$this->set('instruction', $this->Instruction->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($exercise_id = null) {
		if ($this->request->is('post')) {
                    
                        if (isset( $this->data['Cancel'])) 
                        { 
                              $this->Session->setFlash('Changes were not saved', true); 
                              $this->redirect(array('controller' => 'exercises', 'action' => 'view', $exercise_id)); 
                        } 
                    
			$this->Instruction->create();
                        
                        $fileOK = $this->uploadFiles('img/files', $this->data['Instruction']['image']);

                        if (array_key_exists('urls', $fileOK)) {
                         // save the url in the form data
                        $this->request->data['Instruction']['image'] = $fileOK['urls'][0];
                        }else{
                        $this->request->data['Instruction']['image'] = null;
                        }
                    
                        if ($this->Instruction->save(array(
                    
                        'exercise_id' => $exercise_id, 
                        'instruction' => $this->request->data('Instruction.instruction'),
                        'image' => $this->request->data('Instruction.image')
                            
                            
                            ))) 
                
                        {
			
                                $this->Session->setFlash(__('The instruction has been saved'));
				$this->redirect(array('controller' => 'exercises', 'action' => 'view', $exercise_id));
			} else {
				$this->Session->setFlash(__('The instruction could not be saved. Please, try again.'));
			}
		}
                
		$exercises = $this->Instruction->Exercise->find('list');
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
            
               // $blnImage = boolean; 
		$this->Instruction->id = $id;
                $temp = $this->Instruction->field('exercise_id');
		if (!$this->Instruction->exists()) {
			throw new NotFoundException(__('Invalid instruction'));
		}
                if ($this->request->is('post') || $this->request->is('put')) {
                
                $conditions = array("Instruction.id" => $id); 
                $results = $this->Instruction->find('first', array('conditions' => $conditions)); 
                $currentImage = $results['Instruction']['image']; 

                //upload image 
                $fileOK = $this->uploadFiles('img/files', $this->data['Instruction']['image']); 

                if(array_key_exists('urls', $fileOK)) 
                { 
                    $this->deleteImage($id);
                    $this->request->data['Instruction']['image'] = $fileOK['urls'][0]; 
                } 
                else 
                { 
                $this->request->data['Instruction']['image'] = $currentImage; 
                }    
                
                
		if ($this->Instruction->save($this->request->data)) {
				$this->Session->setFlash(__('The instruction has been saved'));
				$this->redirect(array('controller' => 'exercises', 'action' => 'view', $temp));
			} else {
				$this->Session->setFlash(__('The instruction could not be saved. Please, try again.'));
			}
                        
                         $this->request->data = $this->Instruction->read(null, $id); 
            $currentImage = $this->Instruction->data['Instruction']['image']; 

            if($currentImage != null) 
            { 
                $blnImage = true; 
                $this->set(compact('blnImage')); 
            } 
            else 
            { 
                $blnImage = false; 
                $this->set(compact('blnImage')); 
            } 
                        
		} else {
			$this->request->data = $this->Instruction->read(null, $id);
		}
		$this->set('instruction', $this->Instruction->read(null, $id));
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
		$this->Instruction->id = $id;
                $temp = $this->Instruction->field('exercise_id');
             
		if (!$this->Instruction->exists()) {
			throw new NotFoundException(__('Invalid instruction'));
		}
		
                $conditions = array("Instruction.id" => $id); 
                $results = $this->Instruction->find('first', array('conditions' => $conditions)); 
                $currentImage = $results['Instruction']['image']; 

                if(($currentImage != null) && ($currentImage !='noimage.jpg')) 
                { 
                    $imageFolder = WWW_ROOT."img/files"; 
                    $imagePath = $imageFolder.'/'.$currentImage; 
                    unlink($imagePath); 
                } 
                
                if ($this->Instruction->delete()) {
			$this->Session->setFlash(__('Instruction deleted'));
			$this->redirect(array('controller' => 'exercises', 'action' => 'view', $temp));
		}
		$this->Session->setFlash(__('Instruction was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
        
        public function deleteImage($id) 
        { 
        $conditions = array("Instruction.id" => $id); 
        $results = $this->Instruction->find('first', array('conditions' => $conditions)); 
        $currentImage = $results['Instruction']['image']; 

        $imageFolder = WWW_ROOT."img/files"; 
        $imagePath = $imageFolder.'/'.$currentImage; 
        unlink($imagePath); 

       $this->Instruction->query("update instructions set image = null where id =".$id); 
      //  $this->Session->setFlash('Image deleted.'); 
       // $this->redirect(array('controller' => 'exercises', 'action'=>'index')); 
        }
}
