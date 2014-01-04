<?php
App::uses('AppController', 'Controller');
/**
 * PersonAddresses Controller
 *
 * @property PersonAddress $PersonAddress
 * @property PaginatorComponent $Paginator
 */
class PersonAddressesController extends AppController {

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
		$this->PersonAddress->recursive = 0;
		$this->set('personAddresses', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PersonAddress->exists($id)) {
			throw new NotFoundException(__('Invalid person address'));
		}
		$options = array('conditions' => array('PersonAddress.' . $this->PersonAddress->primaryKey => $id));
		$this->set('personAddress', $this->PersonAddress->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PersonAddress->create();
			if ($this->PersonAddress->save($this->request->data)) {
				$this->Session->setFlash(__('The person address has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The person address could not be saved. Please, try again.'));
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
		if (!$this->PersonAddress->exists($id)) {
			throw new NotFoundException(__('Invalid person address'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PersonAddress->save($this->request->data)) {
				$this->Session->setFlash(__('The person address has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The person address could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PersonAddress.' . $this->PersonAddress->primaryKey => $id));
			$this->request->data = $this->PersonAddress->find('first', $options);
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
		$this->PersonAddress->id = $id;
		if (!$this->PersonAddress->exists()) {
			throw new NotFoundException(__('Invalid person address'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PersonAddress->delete()) {
			$this->Session->setFlash(__('The person address has been deleted.'));
		} else {
			$this->Session->setFlash(__('The person address could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
