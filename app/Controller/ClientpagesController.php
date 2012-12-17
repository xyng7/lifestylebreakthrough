<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Clients Controller
 *
 * @property Client $Client
 */
class ClientpagesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function client() {
        // $this->layout = 'clientsdefault';
        $this->loadModel('Client');
        $this->loadModel('Program');
        $client_id = AuthComponent::user('client_id');

        $this->Client->id = $client_id;
        if (!$this->Client->exists()) {
            throw new NotFoundException(__('Invalid client'));
        }
    }

    public function isAuthorized($user) {

        return true;
    }

    public function clientdetails() {
        $this->layout = 'clientdefault'; //load clientsdefault layout
        $this->loadModel('Client');

        $id = AuthComponent::user('client_id');
        $this->Client->id = $id;
        $client = $this->Client->read(null, $id);
        if (!$this->Client->exists()) {
            throw new NotFoundException(__('Invalid client'));
        }
        $this->set('client', $client);
    }

    public function index() {
        $this->clientdetails();
        $programs = $this->Client->find('all'); //, array('conditions' => array('Client.Program.flag_active' => 'active')));
     
    }

    public function viewProgram($id) {
        $this->clientdetails();
        $this->loadModel('Program');
        $this->loadModel('ExercisesProgram');
        $this->Program->id = $id;
        $prog = $this->Program->read(null, $id);
        if (AuthComponent::user('client_id') != $prog['Program']['client_id']) {
            $this->Session->setFlash(__('Unauthorised'));
            // $this->redirect(array('action' => 'index'));
        }
        //$this->Program->id = $id;
        if (!$this->Program->exists()) {
            throw new NotFoundException(__('Invalid program'));
        }
        $this->set('program', $prog);

        $exercisesProgram = $this->ExercisesProgram->query("SELECT exercises_programs.rec_sets, exercises_programs.rec_reps, exercises_programs.rec_res, exercises_programs.rec_load FROM exercises_programs WHERE exercises_programs.program_id = $id");
        $this->set('exercisesPrograms', $exercisesProgram);
    }

    public function changePassword($id = null) {
        $this->clientdetails();
        $this->loadModel('User');
        $this->User->id = $id;
        $user = $this->User->read(null, $id);
       
        if (!$this->User->exists() || AuthComponent::user('id') != $id) {
            $this->Session->setFlash(__('Unauthorised'));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
        if (AuthComponent::password($this->request->data('User.old_password')) == $user['User']['password'] ) {
        if (AuthComponent::password($this->request->data('User.password')) == AuthComponent::password($this->request->data('User.new_password_confirm'))) {

                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('Password change successful', true),'success-message');
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The user could not be saved. Please, try again.', true),'failure-message');
                }
            } else {
                $this->Session->setFlash(__('Password do not match, please try again.', true),'failure-message');
            }
        } else {
            
            $this->Session->setFlash(__('Incorrect old password, please try again.', true),'failure-message');
            
        }
        } else {
            $this->request->data = $this->User->read(null, $id);
                unset($this->request->data['User']['password']);
            
        }
    }

    public function viewExercise($id = null) {
        $this->clientdetails();
        $this->loadModel('Program');
        $this->Program->Exercise->id = $id;
        if (!$this->Program->Exercise->exists()) {
            throw new NotFoundException(__('Invalid exercise'));
        }
        //$this->set('program', $progid);
        $this->set('exercise', $this->Program->Exercise->read(null, $id));
    }

    public function reqappointment() {
        $this->clientdetails();
        $this->loadModel('Venueformdatum');
        $client = $this->Client->read(null, AuthComponent::user('client_id'));
        $venues = $this->Venueformdatum->find('list');
        
        $firstname = $client['Client']["first_name"];
        $lastname = $client['Client']["last_name"];
        $this->set(compact('firstname', 'lastname', 'venues'));

        if ($this->request->is('post')) {

           $postdata = $this->request->data;
        
          
            $prefcontact = $postdata['reqappointment']['prefcontact'];
            $prefdate = $postdata['reqappointment']['prefdate'];
            $comment = $postdata['reqappointment']['comment'];
            $venueid = $postdata['reqappointment']['prefvenue'];
            $venue = $this->Venueformdatum->read(null, $venueid);
            $prefvenue = $venue['Venueformdatum']['venue'];
            
            if ($postdata['reqappointment']['preftime'] != null) {
                $preftime = implode(", ", $postdata['reqappointment']['preftime']);
            } else {
                $preftime = "No prefered time selected";
            }

            $email = new CakeEmail();
            $email->config('default');
            $email->from(array('enquiries@lifestylebreakthrough.com.au' => 'Lifestyle Breakthrough'))
                    ->to('enquiries@lifestylebreakthrough.com.au')
                    ->subject("New request for appointment")
                    ->send("Appointment request from client: $firstname $lastname
                       
                           Prefered contact: $prefcontact
                           Prefered date: $prefdate
                           Prefered venue: $prefvenue
                           Comment: $comment
                           Prefered time: $preftime"
            ); 
            $this->Session->setFlash(__('Request for appointment has been sent!', true), 'success-message');
            $this->redirect(array('action' => 'index'));
        }
    }

    public function belongsTo($id) {
        
    }
    
    public function progress($id) {
        
        
        $this->clientdetails();
        $this->loadModel('Program');
        $this->loadModel('ExercisesProgram');
        $this->Program->id = $id;
        $prog = $this->Program->read(null, $id);
        if (AuthComponent::user('client_id') != $prog['Program']['client_id']) {
            $this->Session->setFlash(__('Unauthorised'));
            // $this->redirect(array('action' => 'index'));
        } if ($this->request->is('post') || $this->request->is('put')) {
           
           $this->ExercisesProgram->deleteAll(array('ExercisesProgram.program_id' => $id), false);
            foreach ($this->request->data("Exercise") as $ex) {
             
                
                            
                       $exid = $ex['id'];
                       $rec_sets = $ex['rec_sets'];
                       $rec_reps = $ex['rec_reps'];
                       $rec_res = $ex['rec_res'];
                       $rec_load = $ex['rec_load'];
                        $act_sets = $ex['actual_sets'];
                        $act_reps = $ex['actual_reps'];
                        $act_res = $ex['actual_res'];
                        $act_load = $ex['actual_load'];
                        $date = $ex['actual_date']; 
                       $this->ExercisesProgram->save(array( 'program_id' => $id,
                                                             'exercise_id' => $exid,
                                                             'rec_sets' => $rec_sets,
                                                             'rec_reps' => $rec_reps,
                                                             'rec_res' => $rec_res,
                                                             'rec_load' => $rec_load,
                                                             'act_sets' => $act_sets,
                                                             'act_reps' => $act_reps,
                                                            'act_res' => $act_res,
                                                            'act_load' => $act_load,
                                                            'date' => $date,
                                                             'id' => null
                            ));  
            }
             $this->Session->setFlash(__('Progress updated!', true), 'success-message');
        }
        //$this->Program->id = $id;
        if (!$this->Program->exists()) {
            throw new NotFoundException(__('Invalid program'));
        }
        $this->set('program', $prog);

        $exercisesProgram = $this->ExercisesProgram->query("SELECT exercises_programs.rec_sets, exercises_programs.rec_reps, exercises_programs.rec_res, exercises_programs.rec_load FROM exercises_programs WHERE exercises_programs.program_id = $id");
        $this->set('exercisesPrograms', $exercisesProgram);
    }

}