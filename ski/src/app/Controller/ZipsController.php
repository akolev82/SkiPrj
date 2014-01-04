<?php
App::uses('AppController', 'Controller');
/**
 * Zips Controller
 *
 * @property Zip $Zip
 * @property PaginatorComponent $Paginator
 */
class ZipsController extends AppController {

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
		$this->Zip->recursive = 0;
		$this->set('zips', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Zip->exists($id)) {
			throw new NotFoundException(__('Invalid zip'));
		}
		$options = array('conditions' => array('Zip.' . $this->Zip->primaryKey => $id));
		$this->set('zip', $this->Zip->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Zip->create();
			if ($this->Zip->save($this->request->data)) {
				$this->Session->setFlash(__('The zip has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The zip could not be saved. Please, try again.'));
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
		if (!$this->Zip->exists($id)) {
			throw new NotFoundException(__('Invalid zip'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Zip->save($this->request->data)) {
				$this->Session->setFlash(__('The zip has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The zip could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Zip.' . $this->Zip->primaryKey => $id));
			$this->request->data = $this->Zip->find('first', $options);
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
		$this->Zip->id = $id;
		if (!$this->Zip->exists()) {
			throw new NotFoundException(__('Invalid zip'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Zip->delete()) {
			$this->Session->setFlash(__('The zip has been deleted.'));
		} else {
			$this->Session->setFlash(__('The zip could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
