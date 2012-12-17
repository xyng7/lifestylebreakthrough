<?php

App::uses('AppController', 'Controller');

/**
 * Programs Controller
 *
 * @property Program $Program
 */
class ProgramsController extends AppController {
    public $components = array('RequestHandler');
    /**
     * index method
     *
     * @return void
     */
       public function index() {
        $this->Program->recursive = 0;
        $this->set('programs', $this->Program->find('all', array('conditions' => array('Program.flag_active' => 'active'))));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Program->id = $id;
        $this->loadModel('ExercisesProgram');

        if (!$this->Program->exists()) {
            throw new NotFoundException(__('Invalid program'));
        }
        $this->set('program', $this->Program->read(null, $id));
        $exercisesProgram = $this->ExercisesProgram->query("SELECT exercises_programs.rec_sets, exercises_programs.rec_reps, exercises_programs.rec_res, exercises_programs.rec_load FROM exercises_programs WHERE exercises_programs.program_id = $id");
        $this->set('exercisesPrograms', $exercisesProgram);
    }
    
    public function view_progress($id = null) {
        $this->Program->id = $id;
        $this->loadModel('ExercisesProgram');

        if (!$this->Program->exists()) {
            throw new NotFoundException(__('Invalid program'));
        }
        $this->set('program', $this->Program->read(null, $id));
        $exercisesProgram = $this->ExercisesProgram->query("SELECT exercises_programs.rec_sets, exercises_programs.rec_reps, exercises_programs.rec_res, exercises_programs.rec_load FROM exercises_programs WHERE exercises_programs.program_id = $id");
        $this->set('exercisesPrograms', $exercisesProgram);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add($usetemp = false, $tempid = null) {
        $this->loadModel('ExercisesProgram');
        $this->loadModel('Template');
  
        if (isset( $this->data['temp'])) 
            {
                $usetemp = true;
                $tempid = $this->request->data('temp.tempchoice');
                $this->redirect(array('action' => 'add', $usetemp, $tempid));
         
            }
            
        if ($this->request->is('post')) {
           
           // debug($this->request->data);
            $this->Program->create();
          
            if ($this->Program->save($this->request->data)) {

                $prid = $this->Program->id;
                // $i = 0;
                foreach ($this->request->data('Exercise.Exercise') as $ex) {
                    //  debug($ex);
                    //  debug(count($ex, COUNT_RECURSIVE));
                   // debug($ex);
                    if (count($ex, COUNT_RECURSIVE) == 6) {
                        // debug("im in the loop");
                        
                        $exid = $ex['0'];
                            

                        $rec_sets = $ex['program']['0'];
                        $rec_reps = $ex['program']['1'];
                        $rec_res = $ex['program']['2'];
                        $rec_load = $ex['program']['3'];
                        $this->ExercisesProgram->save(array( 'program_id' => $prid,
                                                             'exercise_id' => $exid,
                                                             'rec_sets' => $rec_sets,
                                                             'rec_reps' => $rec_reps,
                                                             'rec_res' => $rec_res,
                                                             'rec_load' => $rec_load,
                                                             'act_sets' => null,
                                                             'act_reps' => null,
                                                            'act_res' => null,
                                                            'act_load' => null,
                                                            'date' => null,
                                                             'id' => null
                        ));
                        
                        // $this->ExercisesProgram->query("INSERT INTO `dev`.`exercises_programs` (`program_id`, `exercise_id`, `rec_sets`, `rec_reps`, `rec_res`, `act_sets`, `act_reps`, `act_res`, `date`, `id`) VALUES ($prid, $exid, $rec_sets, $rec_reps, $rec_res, NULL, NULL, NULL, NULL, NULL)");
                        //   $this->ExercisesProgram->query("UPDATE  `dev`.`exercises_programs` SET  `rec_sets` = $rec_sets, `rec_reps` = $rec_reps, `rec_res` =  $rec_res WHERE  `exercises_programs`.`exercise_id` =$exid AND  `exercises_programs`.`program_id` =$prid");
                    }
                    //$i++; 
                }
                $this->Session->setFlash(__('The program has been saved', true),'success-message');
                $this->redirect(array('action' => 'index'));

            } else {
                $this->Session->setFlash(__('The program could not be saved. Please, try again.', true),'failure-message');
            }
        }
         
        $clients = $this->Program->Client->find('list', array('conditions' =>
                    array('User.role' => 'client', 'User.flag_active' => 'active'),
           'recursive' => 0));
        $exercises = $this->Program->Exercise->find('all', array('conditions' => array('Exercise.flag_active' => 'active')));
         $xyz = $this->Template->find('list');
      
        $this->set(compact('clients', 'exercises', 'xyz', 'usetemp'));
        
        if ($tempid != null){
         $this->set('template', $this->Template->read(null, $tempid));
     //  debug($template);
         // $this->set('template', $template);
         
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
        $this->loadModel('ExercisesProgram');
        $this->loadModel('Exercise');
        // $this->ExercisesProgram->id = 132;

        $this->Program->id = $id;
        if (!$this->Program->exists()) {
            throw new NotFoundException(__('Invalid program'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
          if ($this->Program->save(//array(  'client_id' => $this->request->data('Program.client_id'),
                                     //                           'name' => $this->request->data('Program.name'),
                                       //                         'start_date' => $this->request->data('Program.start_date'),
                                         //                       'end_date' =>  $this->request->data('Program.end_date'),
                                           //                     'notes' =>  $this->request->data('Program.notes')
                                                                
        $this->request->data))//) 
              {
                
              //  debug($this->request->data);
                foreach ($this->request->data('Exercise.Exercise') as $ex) {
                   
                    if (count($ex, COUNT_RECURSIVE) == 6) {

                        $exid = $ex['0'];


                        $rec_sets = $ex['program']['0'];
                        $rec_reps = $ex['program']['1'];
                        $rec_res = $ex['program']['2'];
                        $rec_load = $ex['program']['3'];
                        
                        if($exprog = $this->ExercisesProgram->find('first', array('conditions' => array ('program_id' => $id, 
                                                                    'exercise_id' => $exid)))){
                        $this->ExercisesProgram->id = $exprog['ExercisesProgram']['id'];
                        $this->ExercisesProgram->saveField('rec_sets', $rec_sets);
                        $this->ExercisesProgram->saveField('rec_reps', $rec_reps);
                        $this->ExercisesProgram->saveField('rec_res', $rec_res);
                        $this->ExercisesProgram->saveField('rec_load',$rec_load);
                         }
                          else {
                               $this->ExercisesProgram->deleteAll(array('ExercisesProgram.program_id' => $id, 'ExercisesProgram.exercise_id' => $exid), false);
                                  $this->ExercisesProgram->save(array( 'program_id' => $id,
                                                             'exercise_id' => $exid,
                                                             'rec_sets' => $rec_sets,
                                                             'rec_reps' => $rec_reps,
                                                             'rec_res' => $rec_res,
                                                             'rec_load' => $rec_load,
                                                             'act_sets' => null,
                                                             'act_reps' => null,
                                                            'act_res' => null,
                                                            'act_load' => null,
                                                            'date' => null,
                                                             'id' => null
                            ));
                          } 
                       // debug($exprog);
                        
                     /*   $this->ExercisesProgram->updateAll(array(   'program_id' => $id, 
                                                                    'exercise_id' => $exid,
                                                                    'rec_sets' => $rec_sets,
                                                                    'rec_reps' => $rec_reps,
                                                                    'rec_res' => $rec_res,
                                                                    'rec_load' => $rec_load,
                                                                    'id' => null
                                                                    ), 
                                                           array(   'program_id' => $id, 
                                                                    'exercise_id' => $exid));
                            */
                        
                        //$this->ExercisesProgram->query("INSERT INTO `dev`.`exercises_programs` (`program_id`, `exercise_id`, `rec_sets`, `rec_reps`, `rec_res`, `act_sets`, `act_reps`, `act_res`, `date`, `id`) VALUES ($id, $exid, $rec_sets, $rec_reps, $rec_res, NULL, NULL, NULL, NULL, NULL)");
                        //  $this->ExercisesProgram->query("UPDATE  `dev`.`exercises_programs` SET  `rec_sets` = $rec_sets, `rec_reps` = $rec_reps, `rec_res` =  $rec_res WHERE  `exercises_programs`.`exercise_id` =$exid AND  `exercises_programs`.`program_id` =$id");
                    }
                   // $this->ExercisesProgram->deleteAll(array('ExercisesProgram.program_id' => $id, 'ExercisesProgram.exercise_id' => $exid), false);
                }
                $this->Session->setFlash(__('The program has been saved', true),'success-message');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The program could not be saved. Please, try again.', true),'failure-message');
            }
        } else {
            
            //debug($this->Program->read(null, $id));
            $this->request->data = $this->Program->read(null, $id);
        }
        $clients = $this->Program->Client->find('list');
        $exercises = $this->Program->Exercise->find('all', array('conditions' => array('Exercise.flag_active' => 'active')));
        $program = $this->Program->read(null, $id);
        $this->set(compact('clients', 'exercises', 'program'));
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
        $this->Program->id = $id;
        if (!$this->Program->exists()) {
            throw new NotFoundException(__('Invalid program'));
        }
        if ($this->Program->saveField('flag_active', 'deactivate')) {
            $this->Session->setFlash(__('Program archived', true),'success-message');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Program was not archive', true),'failure-message');
        $this->redirect(array('action' => 'index'));
    }

    public function editExerciseProg($id = null) {
        $this->ExercisesProgram->id = $id;
        if (!$this->ExercisesProgram->exists()) {
            throw new NotFoundException(__('Invalid exercises program'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->ExercisesProgram->save($this->request->data)) {
                $this->Session->setFlash(__('The exercises program has been saved', true),'success-message');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The exercises program could not be saved. Please, try again.', true),'failure-message');
            }
        } else {
            $this->request->data = $this->ExercisesProgram->read(null, $id);
        }
        $programs = $this->ExercisesProgram->Program->find('list');
        $exercises = $this->ExercisesProgram->Exercise->find('list');
        $this->set(compact('programs', 'exercises'));
    }
    
        public function archive() {
        $this->Program->recursive = 0;
        $this->set('programs', $this->Program->find('all', array('conditions' => array('Program.flag_active' => 'deactivate'))));
    }

        public function activate($id = null) {
        //activate archive Program
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }

        $this->Program->id = $id;
        if (!$this->Program->exists()) {
            throw new NotFoundException(__('Invalid Program', true));
        }
        if ($this->Program->saveField('flag_active', 'active')) {
            $this->Session->setFlash(__('Program is now active', true), 'success-message');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Program was not activated', true), 'failure-message');
        $this->redirect(array('action' => 'index'));
    }
    
    public function view_pdf($id = null) {
    $this->Program->id = $id;
    $this->loadModel('ExercisesProgram');
    if (!$this->Program->exists()) {
        throw new NotFoundException(__('Invalid post'));
    }
    // increase memory limit in PHP 
    ini_set('memory_limit', '512M');
    $this->set('program', $this->Program->read(null, $id));
    $exercisesProgram = $this->ExercisesProgram->query("SELECT exercises_programs.rec_sets, exercises_programs.rec_reps, exercises_programs.rec_res, exercises_programs.rec_load FROM exercises_programs WHERE exercises_programs.program_id = $id");
        $this->set('exercisesPrograms', $exercisesProgram);
    }
    public function view2_pdf($id = null) {
    $this->Program->id = $id;
    $this->loadModel('ExercisesProgram');
    if (!$this->Program->exists()) {
        throw new NotFoundException(__('Invalid post'));
    }
    // increase memory limit in PHP 
    ini_set('memory_limit', '512M');
    $this->set('program', $this->Program->read(null, $id));
    $exercisesProgram = $this->ExercisesProgram->query("SELECT exercises_programs.rec_sets, exercises_programs.rec_reps, exercises_programs.rec_res, exercises_programs.rec_load FROM exercises_programs WHERE exercises_programs.program_id = $id");
        $this->set('exercisesPrograms', $exercisesProgram);
    }
}
