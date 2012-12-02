<?php

App::uses('AppController', 'Controller');

/**
 * Newsletters Controller
 *
 * @property Newsletter $Newsletter
 */
class NewslettersController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Newsletter->recursive = 0;
        $this->set('newsletters', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        $this->Newsletter->id = $id;
        if (!$this->Newsletter->exists()) {
            throw new NotFoundException(__('Invalid newsletter'));
        }
        $this->set('newsletter', $this->Newsletter->read(null, $id));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Newsletter->create();
            $this->loadModel('User');
            $authuser = $this->Session->read('Auth.User');
            $user_id = $authuser['id'];

            if ($this->Newsletter->save(
                            array(
                                'title' => $this->request->data('Newsletter.title'),
                                'content' => $this->request->data('Newsletter.content'),
                                'user_id' => $user_id
                    ))) {
                $this->Session->setFlash(__('The newsletter has been saved'));
                //$this->Newsletter->saveField('user_id', $this->User->id);
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The newsletter could not be saved. Please, try again.'));
            }
        }
        $users = $this->Newsletter->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        $this->Newsletter->id = $id;
        if (!$this->Newsletter->exists()) {
            throw new NotFoundException(__('Invalid newsletter'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Newsletter->save($this->request->data)) {
                $this->Session->setFlash(__('The newsletter has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The newsletter could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Newsletter->read(null, $id);
        }
        $users = $this->Newsletter->User->find('list');
        $this->set(compact('users'));
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
        $this->Newsletter->id = $id;
        if (!$this->Newsletter->exists()) {
            throw new NotFoundException(__('Invalid newsletter'));
        }
        if ($this->Newsletter->delete()) {
            $this->Session->setFlash(__('Newsletter deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Newsletter was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
