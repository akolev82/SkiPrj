<?php
App::uses('AppController', 'Controller');
/**
 * UserPermissions Controller
 *
 * @property UserPermission $UserPermission
 * @property PaginatorComponent $Paginator
 */
class UserPermissionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	
	protected function setVirtualFields() {
	  $this->UserPermission->virtualFields = array(
	      'UserName' => 'User.name',
	      'PermissionName' => 'Permission.PermissionName'
	  );
	}

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->UserPermission->recursive = 0;
		$this->setVirtualFields();
		$this->set('userPermissions', $this->Paginator->paginate());
	}
	
	protected function refreshForeignKeys() {
	  $users = $this->UserPermission->User->find('list');
	  $permissions = $this->UserPermission->Permission->find('list');
	  $this->set(compact('users', 'permissions'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->UserPermission->exists($id)) {
			throw new NotFoundException(__('Invalid user permission'));
		}
		$this->setVirtualFields();
		$options = array('conditions' => array('UserPermission.' . $this->UserPermission->primaryKey => $id));
		$this->set('userPermission', $this->UserPermission->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UserPermission->create();
			if ($this->UserPermission->save($this->request->data)) {
				$this->Session->setFlash(__('The user permission has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user permission could not be saved. Please, try again.'));
			}
		}
		$this->refreshForeignKeys();
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->UserPermission->exists($id)) {
			throw new NotFoundException(__('Invalid user permission'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->UserPermission->save($this->request->data)) {
				$this->Session->setFlash(__('The user permission has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user permission could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('UserPermission.' . $this->UserPermission->primaryKey => $id));
			$this->request->data = $this->UserPermission->find('first', $options);
		}
		$this->refreshForeignKeys();
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->UserPermission->clear();
		if (!$this->UserPermission->exists($id)) {
			throw new NotFoundException(__('Invalid user permission'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserPermission->delete($id)) {
			$this->Session->setFlash(__('The user permission has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user permission could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
