<?php
App::uses('AppController', 'Controller');
/**
 * TeamTypes Controller
 *
 * @property TeamType $TeamType
 * @property PaginatorComponent $Paginator
 */
class TeamTypesController extends AppController {

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
		$this->TeamType->recursive = 0;
		$this->set('teamTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TeamType->exists($id)) {
			throw new NotFoundException(__('Invalid team type'));
		}
		$options = array('conditions' => array('TeamType.' . $this->TeamType->primaryKey => $id));
		$this->set('teamType', $this->TeamType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TeamType->create();
			if ($this->TeamType->save($this->request->data)) {
				$this->Session->setFlash(__('The team type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The team type could not be saved. Please, try again.'));
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
		if (!$this->TeamType->exists($id)) {
			throw new NotFoundException(__('Invalid team type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TeamType->save($this->request->data)) {
				$this->Session->setFlash(__('The team type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The team type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TeamType.' . $this->TeamType->primaryKey => $id));
			$this->request->data = $this->TeamType->find('first', $options);
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
		$this->TeamType->id = $id;
		if (!$this->TeamType->exists()) {
			throw new NotFoundException(__('Invalid team type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TeamType->delete()) {
			$this->Session->setFlash(__('The team type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The team type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
