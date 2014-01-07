<?php
App::uses('AppController', 'Controller');
/**
 * RolePermissions Controller
 *
 * @property RolePermission $RolePermission
 * @property PaginatorComponent $Paginator
 */
class RolePermissionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	
	protected function setVirtualFields() {
	  $this->RolePermission->virtualFields = array(
	      'RoleName' => 'Role.RoleName',
	      'PermissionName' => 'Permission.PermissionName'
	  );
	}
	
	public function admin_index() {
		$this->RolePermission->recursive = 0;
		$this->setVirtualFields();
		$this->set('rolePermissions', $this->Paginator->paginate());
	}
	
	protected function refreshForeignKeys() {
	  $roles = $this->RolePermission->Role->find('list');
	  $permissions = $this->RolePermission->Permission->find('list');
	  $this->set(compact('roles', 'permissions'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->RolePermission->exists($id)) {
			throw new NotFoundException(__('Invalid role permission'));
		}
		$this->setVirtualFields();
		$options = array('conditions' => array('RolePermission.' . $this->RolePermission->primaryKey => $id));
		$this->set('rolePermission', $this->RolePermission->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->RolePermission->create();
			if ($this->RolePermission->save($this->request->data)) {
				$this->Session->setFlash(__('The role permission has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The role permission could not be saved. Please, try again.'));
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
		if (!$this->RolePermission->exists($id)) {
			throw new NotFoundException(__('Invalid role permission'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->RolePermission->save($this->request->data)) {
				$this->Session->setFlash(__('The role permission has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The role permission could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RolePermission.' . $this->RolePermission->primaryKey => $id));
			$this->request->data = $this->RolePermission->find('first', $options);
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
		$this->RolePermission->clear();
		if (!$this->RolePermission->exists($id)) {
			throw new NotFoundException(__('Invalid role permission'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RolePermission->delete($id)) {
			$this->Session->setFlash(__('The role permission has been deleted.'));
		} else {
			$this->Session->setFlash(__('The role permission could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
