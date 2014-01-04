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
	public function index() {
		$this->RolePermission->recursive = 0;
		$this->set('rolePermissions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RolePermission->exists($id)) {
			throw new NotFoundException(__('Invalid role permission'));
		}
		$options = array('conditions' => array('RolePermission.' . $this->RolePermission->primaryKey => $id));
		$this->set('rolePermission', $this->RolePermission->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RolePermission->create();
			if ($this->RolePermission->save($this->request->data)) {
				$this->Session->setFlash(__('The role permission has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The role permission could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
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
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->RolePermission->id = $id;
		if (!$this->RolePermission->exists()) {
			throw new NotFoundException(__('Invalid role permission'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RolePermission->delete()) {
			$this->Session->setFlash(__('The role permission has been deleted.'));
		} else {
			$this->Session->setFlash(__('The role permission could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
