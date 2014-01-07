<?php
App::uses('AppController', 'Controller');

class RolesController extends AppController {

  public $components = array('Paginator');
  public $scaffold = 'admin';

  public function admin_index() {
    $this->Role->recursive = 0;
    $this->set('roles', $this->Paginator->paginate());
  }

  public function admin_view($id = null) {
    if (!$this->Role->exists($id)) {
      throw new NotFoundException(__('Invalid role'));
    }
    $options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
    $this->set('role', $this->Role->find('first', $options));
  }

  public function admin_add() {
    if ($this->request->is('post')) {
      $this->Role->create();
      if ($this->Role->save($this->request->data)) {
        $this->Session->setFlash(__('The role has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The role could not be saved. Please, try again.'));
      }
    }
  }

  public function admin_edit($id = null) {
    if (!$this->Role->exists($id)) {
      throw new NotFoundException(__('Invalid role'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Role->save($this->request->data)) {
        $this->Session->setFlash(__('The role has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The role could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('Role.' . $this->Role->primaryKey => $id));
      $this->request->data = $this->Role->find('first', $options);
    }
  }

  public function admin_delete($id = null) {
    $this->Role->clear();
    if (!$this->Role->exists($id)) {
      $this->Session->setFlash(__('The role ' . $id . ' does not exists.'));
      return $this->redirect(array('action' => 'index'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->Role->delete($id)) {
      $this->Session->setFlash(__('The role has been deleted.'));
    } else {
      $this->Session->setFlash(__('The role could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
  }
  
} ?>