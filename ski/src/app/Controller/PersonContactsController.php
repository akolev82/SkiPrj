<?php
App::uses('AppController', 'Controller');
/**
 * PersonContacts Controller
 *
 * @property PersonContact $PersonContact
 * @property PaginatorComponent $Paginator
 */
class PersonContactsController extends AppController {

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
		$this->PersonContact->recursive = 0;
		$this->set('personContacts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PersonContact->exists($id)) {
			throw new NotFoundException(__('Invalid person contact'));
		}
		$options = array('conditions' => array('PersonContact.' . $this->PersonContact->primaryKey => $id));
		$this->set('personContact', $this->PersonContact->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PersonContact->create();
			if ($this->PersonContact->save($this->request->data)) {
				$this->Session->setFlash(__('The person contact has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The person contact could not be saved. Please, try again.'));
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
		if (!$this->PersonContact->exists($id)) {
			throw new NotFoundException(__('Invalid person contact'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PersonContact->save($this->request->data)) {
				$this->Session->setFlash(__('The person contact has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The person contact could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PersonContact.' . $this->PersonContact->primaryKey => $id));
			$this->request->data = $this->PersonContact->find('first', $options);
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
		$this->PersonContact->id = $id;
		if (!$this->PersonContact->exists()) {
			throw new NotFoundException(__('Invalid person contact'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PersonContact->delete()) {
			$this->Session->setFlash(__('The person contact has been deleted.'));
		} else {
			$this->Session->setFlash(__('The person contact could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
