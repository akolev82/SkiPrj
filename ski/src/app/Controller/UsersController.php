<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

  public $components = array('Paginator');
  public $scaffold = 'admin';

  public function admin_index() {
    $this->User->recursive = 0;
    $this->set('users', $this->Paginator->paginate());
  }

  public function admin_view($id = null) {
    if (!$this->User->exists($id)) {
      throw new NotFoundException(__('Invalid user'));
    }
    $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
    $this->set('user', $this->User->find('first', $options));
  }

  public function admin_add() {
    if ($this->request->is('post')) {
      $this->User->create();
      if ($this->User->save($this->request->data)) {
        $this->Session->setFlash(__('The user has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
      }
    }
  }

  public function admin_edit($id = null) {
    if (!$this->User->exists($id)) {
      throw new NotFoundException(__('Invalid user'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->User->save($this->request->data)) {
        $this->Session->setFlash(__('The user has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
      $this->request->data = $this->User->find('first', $options);
    }
  }

  public function admin_delete($id = null) {
    $this->User->clear();
    if (!$this->User->exists($id)) {
      $this->Session->setFlash(__('The user ' . $id . ' does not exists.'));
      return $this->redirect(array('action' => 'index'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->User->delete($id)) {
      $this->Session->setFlash(__('The user has been deleted.'));
    } else {
      $this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
  }

  public function admin_login() {
    $this->layout = 'loginLayout';
   
    /*$this->User->clear();
    $data = array();
    $data['User']['name'] = 'admin';
    $data['User']['pass'] = 'admin';
    $data['User']['super'] = '1';
    $this->User->save($data);*/

    if ($this->request->is('post')) {
      if ($this->Auth->login()) {
        return $this->redirect($this->Auth->redirectUrl());
        // Prior to 2.3 use `return $this->redirect($this->Auth->redirect());`
      } else {
        $this->Session->setFlash(__('Username or password is incorrect'));
      }
    }
  }
  
  public function admin_logout() {
    if ($this->Auth->loggedIn()) {
      $this->Auth->logout();
    }
  }

} ?>