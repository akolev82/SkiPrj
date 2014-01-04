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

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UserPermission->recursive = 0;
		$this->set('userPermissions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->UserPermission->exists($id)) {
			throw new NotFoundException(__('Invalid user permission'));
		}
		$options = array('conditions' => array('UserPermission.' . $this->UserPermission->primaryKey => $id));
		$this->set('userPermission', $this->UserPermission->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserPermission->create();
			if ($this->UserPermission->save($this->request->data)) {
				$this->Session->setFlash(__('The user permission has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user permission could not be saved. Please, try again.'));
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
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->UserPermission->id = $id;
		if (!$this->UserPermission->exists()) {
			throw new NotFoundException(__('Invalid user permission'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UserPermission->delete()) {
			$this->Session->setFlash(__('The user permission has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user permission could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
