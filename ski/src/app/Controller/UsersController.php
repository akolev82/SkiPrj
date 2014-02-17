<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

  public $components = array('Paginator');
  public $scaffold = 'admin';
  public $uses = array('User', 'UserRole');

  public function admin_index() {
    $this->User->recursive = 0;
    $this->set('users', $this->Paginator->paginate());
  }
  
  protected function getRoles($UserID) {
    $this->UserRole->recursive = 0;
    $this->UserRole->virtualFields = array(
        'RoleName' => 'Role.RoleName'
    );
    $roles = $this->UserRole->Role->find('list');
    $this->set(compact('roles'));
    $this->set('user_roles', $this->Paginator->paginate('UserRole', array('UserRole.UserID' => $UserID)));
  }

  public function admin_view($id = null) {
    if (!$this->User->exists($id)) {
      throw new NotFoundException(__('Invalid user'));
    }
    $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
    $this->set('user', $this->User->find('first', $options));
    $this->getRoles($id);
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
   
    $this->User->clear();
    $this->User->create();
    $data = array();
    $data['User']['UserID'] = 1;
    $data['User']['name'] = 'admin';
    $data['User']['pass'] = 'admin';
    $data['User']['super'] = '1';
    $this->User->save($data);

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
  
  public function admin_add_role($UserID) {
    $this->admin_view($UserID);
    $this->set('is_add_role', true);
    $this->render('admin_view');
  }
  
  public function admin_do_add_role() {
    if ($this->request->is('post')) {
      $this->UserRole->create();
      if ($this->UserRole->save($this->request->data)) {
        $this->Session->setFlash(__('The user role has been saved.'));
      } else {
        $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
      }
      $this->admin_view($this->request->data['UserRole']['UserID']);
      $this->set('is_add_role', false);
      $this->render('admin_view');
    } else {
      $this->admin_index($UserID);
      $this->render('admin_index');
    }
  }
  
  public function admin_remove_role($UserID, $id) {
    if ($this->request->is('post')) {
      $this->UserRole->clear();
      if (!$this->UserRole->exists($id)) {
        $this->Session->setFlash(__('The user role does not exists.'));
        return $this->redirect(array('action' => 'view', $UserID));
      }
      if (!$this->UserRole->delete($id)) {
        $this->Session->setFlash(__('The user role cannot be deleted.'));
        return $this->redirect(array('action' => 'view', $UserID));
      }
    }
    return $this->redirect(array('action' => 'view', $UserID));
  }

} ?>