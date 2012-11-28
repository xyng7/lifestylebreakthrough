<?php

App::uses('AppController', 'Controller');

/**
 * Programs Controller
 *
 * @property Program $Program
 */
class ProgramsController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Program->recursive = 0;
        $this->set('programs', $this->paginate());
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
        $exercisesProgram = $this->ExercisesProgram->query("SELECT exercises_programs.rec_sets, exercises_programs.rec_reps, exercises_programs.rec_res FROM exercises_programs WHERE exercises_programs.program_id = $id");
        $this->set('exercisesPrograms', $exercisesProgram);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->loadModel('ExercisesProgram');

        if ($this->request->is('post')) {
            $this->Program->create();

            if ($this->Program->save($this->request->data)) {

                $prid = $this->Program->id;
                // $i = 0;
                foreach ($this->request->data('Exercise.Exercise') as $ex) {
                    //  debug($ex);
                    //  debug(count($ex, COUNT_RECURSIVE));

                    if (count($ex, COUNT_RECURSIVE) == 5) {
                        // debug("im in the loop");
                        $exid = $ex['0'];
                        //    debug($exid);

                        $rec_sets = $ex['program']['0'];
                        $rec_reps = $ex['program']['1'];
                        $rec_res = $ex['program']['2'];

                        $this->ExercisesProgram->save(array( 'program_id' => $prid,
                                                             'exercise_id' => $exid,
                                                             'rec_sets' => $rec_sets,
                                                             'rec_reps' => $rec_reps,
                                                             'rec_res' => $rec_res,
                                                             'act_sets' => null,
                                                             'act_reps' => null,
                                                            'act_res' => null,
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
        $clients = $this->Program->Client->find('list');
        $exercises = $this->Program->Exercise->find('all');
        $this->set(compact('clients', 'exercises'));
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
            if ($this->Program->save($this->request->data)) {

                foreach ($this->request->data('Exercise.Exercise') as $ex) {

                    if (count($ex, COUNT_RECURSIVE) == 5) {

                        $exid = $ex['0'];


                        $rec_sets = $ex['program']['0'];
                        $rec_reps = $ex['program']['1'];
                        $rec_res = $ex['program']['2'];
                        
                        $this->ExercisesProgram->save(array( 'program_id' => $id,
                                                             'exercise_id' => $exid,
                                                             'rec_sets' => $rec_sets,
                                                             'rec_reps' => $rec_reps,
                                                             'rec_res' => $rec_res,
                                                             'act_sets' => null,
                                                             'act_reps' => null,
                                                            'act_res' => null,
                                                            'date' => null,
                                                             'id' => null
                            ));
                        
                        //$this->ExercisesProgram->query("INSERT INTO `dev`.`exercises_programs` (`program_id`, `exercise_id`, `rec_sets`, `rec_reps`, `rec_res`, `act_sets`, `act_reps`, `act_res`, `date`, `id`) VALUES ($id, $exid, $rec_sets, $rec_reps, $rec_res, NULL, NULL, NULL, NULL, NULL)");
                        //  $this->ExercisesProgram->query("UPDATE  `dev`.`exercises_programs` SET  `rec_sets` = $rec_sets, `rec_reps` = $rec_reps, `rec_res` =  $rec_res WHERE  `exercises_programs`.`exercise_id` =$exid AND  `exercises_programs`.`program_id` =$id");
                    }
                }
                $this->Session->setFlash(__('The program has been saved', true),'success-message');
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The program could not be saved. Please, try again.', true),'failure-message');
            }
        } else {
            
            debug($this->Program->read(null, $id));
            $this->request->data = $this->Program->read(null, $id);
        }
        $clients = $this->Program->Client->find('list');
        $exercises = $this->Program->Exercise->find('all');
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
        if ($this->Program->delete()) {
            $this->Session->setFlash(__('Program deleted', true),'success-message');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Program was not deleted', true),'failure-message');
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

}
