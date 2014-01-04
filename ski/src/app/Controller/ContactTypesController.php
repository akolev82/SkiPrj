<?php
App::uses('AppController', 'Controller');
/**
 * ContactTypes Controller
 *
 * @property ContactType $ContactType
 * @property PaginatorComponent $Paginator
 */
class ContactTypesController extends AppController {

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
		$this->ContactType->recursive = 0;
		$this->set('contactTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ContactType->exists($id)) {
			throw new NotFoundException(__('Invalid contact type'));
		}
		$options = array('conditions' => array('ContactType.' . $this->ContactType->primaryKey => $id));
		$this->set('contactType', $this->ContactType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ContactType->create();
			if ($this->ContactType->save($this->request->data)) {
				$this->Session->setFlash(__('The contact type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact type could not be saved. Please, try again.'));
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
		if (!$this->ContactType->exists($id)) {
			throw new NotFoundException(__('Invalid contact type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ContactType->save($this->request->data)) {
				$this->Session->setFlash(__('The contact type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ContactType.' . $this->ContactType->primaryKey => $id));
			$this->request->data = $this->ContactType->find('first', $options);
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
		$this->ContactType->id = $id;
		if (!$this->ContactType->exists()) {
			throw new NotFoundException(__('Invalid contact type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ContactType->delete()) {
			$this->Session->setFlash(__('The contact type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The contact type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
