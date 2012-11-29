<?php

App::uses('AppController', 'Controller');

/**
 * Exercises Controller
 *
 * @property Exercise $Exercise
 */
class ExercisesController extends AppController {

    public function isAuthorized($user) {

        if (in_array($this->action, array('delete', 'edit'))) {

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
    public function index() {

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


            $fileOK = $this->uploadFiles('img/files', $this->data['Exercise']['start_pic']);
            $file2OK = $this->uploadFiles('img/files', $this->data['Exercise']['end_pic']);

            if (array_key_exists('urls', $fileOK)) {
                // save the url in the form data
                $this->request->data['Exercise']['start_pic'] = $fileOK['urls'][0];
               
            } else {
                $this->request->data['Exercise']['start_pic'] = null;
            }
            
            if (array_key_exists('urls', $file2OK)) {
                 $this->request->data['Exercise']['end_pic'] = $file2OK['urls'][0];
            } else {
                $this->request->data['Exercise']['end_pic'] = null;
            }

            if ($this->Exercise->save($this->request->data)) {
                
                if (array_key_exists('urls', $fileOK)) {
                // save the url in the form data
                $this->request->data['Exercise']['start_pic'] = $fileOK['urls'][0];
               
            } else {
                $this->request->data['Exercise']['start_pic'] = null;
            }
            
            if (array_key_exists('urls', $file2OK)) {
                 $this->request->data['Exercise']['end_pic'] = $file2OK['urls'][0];
            } else {
                $this->request->data['Exercise']['end_pic'] = null;
            }
                
                $this->Session->setFlash(__('The exercise has been saved', true),'success-message');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The exercise could not be saved. Please, try again.', true),'failure-message');
            }
        }
        $bodyParts = $this->Exercise->BodyPart->find('list');
        $categories = $this->Exercise->Category->find('list');
        $equipment = $this->Exercise->Equipment->find('list');

        //exercise
        $this->set('exercise_bodyparts', $this->Exercise->BodyPart->find('all'));
        //categories
        $this->set('exercise_categories', $this->Exercise->Category->find('all'));
        //equipment
        $this->set('exercise_equipment', $this->Exercise->Equipment->find('all'));


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
            
            if (isset( $this->data['delimg1'])) 
            { 
                $this->deleteImage($id, 'start_pic'); 
                $this->redirect(array('action' => 'edit', $id));
            }
            if (isset( $this->data['delimg2'])) 
            { 
                $this->deleteImage($id, 'end_pic');
                $this->redirect(array('action' => 'edit', $id));
                //$this->redirect( array( 'action' => 'index' )); 
            }
         //   debug($this->request->data);
            
            $conditions = array("Exercise.id" => $id);
            $results = $this->Exercise->find('first', array('conditions' => $conditions));
            $currentImage1 = $results['Exercise']['start_pic'];
            $currentImage2 = $results['Exercise']['end_pic'];

            $fileOK = $this->uploadFiles('img/files', $this->data['Exercise']['start_pic']);
            $file2OK = $this->uploadFiles('img/files', $this->data['Exercise']['end_pic']);

            if (array_key_exists('urls', $fileOK)) {
                // save the url in the form data
                if ($results['Exercise']['start_pic'] != null){
                $this->deleteImage($id, 'start_pic'); 
                
                }
                $this->request->data['Exercise']['start_pic'] = $fileOK['urls'][0];
               
            } else {
                $this->request->data['Exercise']['start_pic'] = $currentImage1;
            }
            
            if (array_key_exists('urls', $file2OK)) {
                if ($results['Exercise']['end_pic'] != null){
                $this->deleteImage($id, 'end_pic'); 
                
                }
                 $this->request->data['Exercise']['end_pic'] = $file2OK['urls'][0];
            } else {
                $this->request->data['Exercise']['end_pic'] = $currentImage2;
            }

            if ($this->Exercise->save($this->request->data)) {
                $this->Session->setFlash(__('The exercise has been saved', true),'success-message');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The exercise could not be saved. Please, try again.', true),'failure-message');
            }
        } else {
            $this->request->data = $this->Exercise->read(null, $id);
        }
        $bodyParts = $this->Exercise->BodyPart->find('list');
        $categories = $this->Exercise->Category->find('list');
        $equipment = $this->Exercise->Equipment->find('list');

        //exercise
        $this->set('exercise_bodyparts', $this->Exercise->BodyPart->find('all'));
        //categories
        $this->set('exercise_categories', $this->Exercise->Category->find('all'));
        //equipment
        $this->set('exercise_equipment', $this->Exercise->Equipment->find('all'));

        $exercise = $this->Exercise->read(null, $id);
        //debug($this->Exercise->read(null, $id));
        $this->set(compact('bodyParts', 'categories', 'equipment', 'exercise'));

        //$this->set(compact('bodyParts', 'categories', 'equipment', 'programs', 'exercise'));
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
        
                $conditions = array("Exercise.id" => $id);
                $results = $this->Exercise->find('first', array('conditions' => $conditions));
                $currentImage1 = $results['Exercise']['start_pic'];
                $currentImage2 = $results['Exercise']['end_pic'];

                if(($currentImage1 != null) && ($currentImage1 !='noimage.jpg')) 
                { 
                    $imageFolder = WWW_ROOT."img/files"; 
                    $imagePath = $imageFolder.'/'.$currentImage1; 
                    unlink($imagePath); 
                }
                
                if(($currentImage2 != null) && ($currentImage2 !='noimage.jpg')) 
                { 
                    $imageFolder = WWW_ROOT."img/files"; 
                    $imagePath = $imageFolder.'/'.$currentImage2; 
                    unlink($imagePath); 
                }
        
        if ($this->Exercise->delete()) {
            $this->Session->setFlash(__('Exercise deleted', true),'success-message');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Exercise was not deleted', true),'failure-message');
        $this->redirect(array('action' => 'index'));
    }

    public function deleteImage($id, $pic) {
        $conditions = array("Exercise.id" => $id);
        $results = $this->Exercise->find('first', array('conditions' => $conditions));
        $currentImage = $results['Exercise'][$pic];
            if(($currentImage != null) && ($currentImage !='noimage.jpg')) {
                
                $imageFolder = WWW_ROOT . "img/files";
                $imagePath = $imageFolder . '/' . $currentImage;
                unlink($imagePath);
        }
        $this->Exercise->query("update exercises set $pic = null where id =" . $id);
        // $this->Session->setFlash('Image deleted.'); 
       // echo $this->Html->link(__('Edit'), array('action' => 'edit', $exercise['Exercise']['id']));
    }

}
