<?php
App::uses('AppController', 'Controller');
/**
 * Templates Controller
 *
 * @property Template $Template
 */
class TemplatesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Template->recursive = 0;
		$this->set('templates', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Template->id = $id;
		if (!$this->Template->exists()) {
			throw new NotFoundException(__('Invalid template'));
		}
		$this->set('template', $this->Template->read(null, $id));
                $exercisesProgram = $this->Template->ExercisesTemplate->query("SELECT exercises_templates.rec_sets, exercises_templates.rec_reps, exercises_templates.rec_res, exercises_templates.rec_load FROM exercises_templates WHERE exercises_templates.template_id = $id");
                $this->set('exercisesPrograms', $exercisesProgram);
               // debug($this->Template->read(null, $id));
        }
        

/**
 * add method
 *
 * @return void
 */
	public function add() {
        $this->loadModel('ExercisesTemplate');

        if ($this->request->is('post')) {
            $this->Template->create();
          // debug($this->request->data);
            if ($this->Template->save($this->request->data)) {

                $prid = $this->Template->id;
                // $i = 0;
                foreach ($this->request->data('Template.Exercise') as $ex) {
                    //  debug($ex);
                    //  debug(count($ex, COUNT_RECURSIVE));

                    if (count($ex, COUNT_RECURSIVE) == 6) {
                    //     debug("im in the loop");
                        $exid = $ex['0'];
                        //    debug($exid);

                        $rec_sets = $ex['program']['0'];
                        $rec_reps = $ex['program']['1'];
                        $rec_res = $ex['program']['2'];
                        $rec_load = $ex['program']['3'];

                        $this->ExercisesTemplate->save(array( 'template_id' => $prid,
                                                             'exercise_id' => $exid,
                                                             'rec_sets' => $rec_sets,
                                                             'rec_reps' => $rec_reps,
                                                             'rec_res' => $rec_res,
                                                             'rec_load' => $rec_load,
                                                             'act_sets' => null,
                                                             'act_reps' => null,
                                                            'act_res' => null,
                                                            'date' => null,
                                                             'id' => null
                        ));
                        
                        // $this->ExercisesTemplate->query("INSERT INTO `dev`.`exercises_programs` (`program_id`, `exercise_id`, `rec_sets`, `rec_reps`, `rec_res`, `act_sets`, `act_reps`, `act_res`, `date`, `id`) VALUES ($prid, $exid, $rec_sets, $rec_reps, $rec_res, NULL, NULL, NULL, NULL, NULL)");
                        //   $this->ExercisesTemplate->query("UPDATE  `dev`.`exercises_programs` SET  `rec_sets` = $rec_sets, `rec_reps` = $rec_reps, `rec_res` =  $rec_res WHERE  `exercises_programs`.`exercise_id` =$exid AND  `exercises_programs`.`program_id` =$prid");
                    }
                    //$i++; 
                }
                $this->Session->setFlash(__('The template has been saved', true), 'success-message');
                $this->redirect(array('action' => 'index'));

            } else {
                $this->Session->setFlash(__('The template could not be saved. Please, try again.', true), 'failure-message');
            }
        }
      
        $exercises = $this->Template->Exercise->find('all');
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
            $this->loadModel('ExercisesTemplate');
		$this->Template->id = $id;
		if (!$this->Template->exists()) {
			throw new NotFoundException(__('Invalid template'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Template->save($this->request->data)) {
                            
                            $prid = $this->Template->id;
                // $i = 0;
                            $this->ExercisesTemplate->deleteAll(array('ExercisesTemplate.template_id' => $id), false);
                foreach ($this->request->data('Template.Exercise') as $ex) {
                    //  debug($ex);
                    //  debug(count($ex, COUNT_RECURSIVE));
                    
                  //  $this->ExercisesTemplate->deleteAll(array('ExercisesTemplate.template_id' => $id), false);
                    
                    if (count($ex, COUNT_RECURSIVE) == 6) {
                    //     debug("im in the loop");
                        $exid = $ex['0'];
                        //    debug($exid);

                        $rec_sets = $ex['program']['0'];
                        $rec_reps = $ex['program']['1'];
                        $rec_res = $ex['program']['2'];
                        $rec_load = $ex['program']['3'];

                        $this->ExercisesTemplate->save(array( 'template_id' => $prid,
                                                             'exercise_id' => $exid,
                                                             'rec_sets' => $rec_sets,
                                                             'rec_reps' => $rec_reps,
                                                             'rec_res' => $rec_res,
                                                             'rec_load' => $rec_load,
                                                             'act_sets' => null,
                                                             'act_reps' => null,
                                                            'act_res' => null,
                                                            'date' => null,
                                                             'id' => null
                        ));
                        
                        // $this->ExercisesTemplate->query("INSERT INTO `dev`.`exercises_programs` (`program_id`, `exercise_id`, `rec_sets`, `rec_reps`, `rec_res`, `act_sets`, `act_reps`, `act_res`, `date`, `id`) VALUES ($prid, $exid, $rec_sets, $rec_reps, $rec_res, NULL, NULL, NULL, NULL, NULL)");
                        //   $this->ExercisesTemplate->query("UPDATE  `dev`.`exercises_programs` SET  `rec_sets` = $rec_sets, `rec_reps` = $rec_reps, `rec_res` =  $rec_res WHERE  `exercises_programs`.`exercise_id` =$exid AND  `exercises_programs`.`program_id` =$prid");
                    }
                }
                            
				$this->Session->setFlash(__('The template has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The template could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Template->read(null, $id);
		}
		$exercises = $this->Template->Exercise->find('all');
                $template = $this->Template->read(null, $id);
             
		$this->set(compact('exercises', 'template'));
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
		$this->Template->id = $id;
		if (!$this->Template->exists()) {
			throw new NotFoundException(__('Invalid template'));
		}
		if ($this->Template->delete()) {
			$this->Session->setFlash(__('Template deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Template was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
