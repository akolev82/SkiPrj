<?php
App::uses('AppController', 'Controller');
/**
 * Reves Controller
 *
 * @property Ref $Ref
 * @property PaginatorComponent $Paginator
 */
class RevesController extends AppController {

/**
 * Helpers
 *
 * @var array
 */
	public $helpers = array('Js');

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
		$this->Ref->recursive = 0;
		$this->set('reves', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ref->exists($id)) {
			throw new NotFoundException(__('Invalid ref'));
		}
		$options = array('conditions' => array('Ref.' . $this->Ref->primaryKey => $id));
		$this->set('ref', $this->Ref->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ref->create();
			if ($this->Ref->save($this->request->data)) {
				$this->Session->setFlash(__('The ref has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ref could not be saved. Please, try again.'));
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
		if (!$this->Ref->exists($id)) {
			throw new NotFoundException(__('Invalid ref'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ref->save($this->request->data)) {
				$this->Session->setFlash(__('The ref has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ref could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ref.' . $this->Ref->primaryKey => $id));
			$this->request->data = $this->Ref->find('first', $options);
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
		$this->Ref->id = $id;
		if (!$this->Ref->exists()) {
			throw new NotFoundException(__('Invalid ref'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ref->delete()) {
			$this->Session->setFlash(__('The ref has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ref could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Ref->recursive = 0;
		$this->set('reves', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Ref->exists($id)) {
			throw new NotFoundException(__('Invalid ref'));
		}
		$options = array('conditions' => array('Ref.' . $this->Ref->primaryKey => $id));
		$this->set('ref', $this->Ref->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Ref->create();
			if ($this->Ref->save($this->request->data)) {
				$this->Session->setFlash(__('The ref has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ref could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Ref->exists($id)) {
			throw new NotFoundException(__('Invalid ref'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ref->save($this->request->data)) {
				$this->Session->setFlash(__('The ref has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ref could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ref.' . $this->Ref->primaryKey => $id));
			$this->request->data = $this->Ref->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Ref->id = $id;
		if (!$this->Ref->exists()) {
			throw new NotFoundException(__('Invalid ref'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ref->delete()) {
			$this->Session->setFlash(__('The ref has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ref could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
