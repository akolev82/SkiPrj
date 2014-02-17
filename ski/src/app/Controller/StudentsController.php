<?php
App::uses('AppController', 'Controller');

class StudentsController extends AppController {

  public function index() {
    $this->Student->recursive = 0;
    $this->set('students', $this->Paginator->paginate());
  }

  public function view($id = null) {
    if (!$this->Student->exists($id)) {
      throw new NotFoundException(__('Invalid student'));
    }
    $options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
    $this->set('student', $this->Student->find('first', $options));
  }
  
  public function admin_index() {
    $this->index();
    $this->render('index');
  }
  
  public function admin_view($id = null) {
    $this->view($id);
    $this->render('view');
  }
  
  protected function setVariables() {
    
  }

  public function admin_add() {
    if ($this->request->is('post')) {
      $this->Student->create();
      if ($this->Student->save($this->request->data)) {
        $this->Session->setFlash(__('The student has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The student could not be saved. Please, try again.'));
      }
    }
    $this->setVariables();
  }

  public function admin_edit($id = null) {
    if (!$this->Student->exists($id)) {
      throw new NotFoundException(__('Invalid student'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Student->save($this->request->data)) {
        $this->Session->setFlash(__('The student has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The student could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('Student.' . $this->Student->primaryKey => $id));
      $this->request->data = $this->Student->find('first', $options);
    }
    $this->setVariables();
  }

  public function admin_delete($id = null) {
    $this->Student->clear();
    if (!$this->Student->exists($id)) {
      throw new NotFoundException(__('Invalid student'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->Student->delete($id)) {
      $this->Session->setFlash(__('The student has been deleted.'));
    } else {
      $this->Session->setFlash(__('The student could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
  }
}
