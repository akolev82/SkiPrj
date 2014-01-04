<?php
App::uses('AppController', 'Controller');
/**
 * TeamMembers Controller
 *
 * @property TeamMember $TeamMember
 * @property PaginatorComponent $Paginator
 */
class TeamMembersController extends AppController {

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
		$this->TeamMember->recursive = 0;
		$this->set('teamMembers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TeamMember->exists($id)) {
			throw new NotFoundException(__('Invalid team member'));
		}
		$options = array('conditions' => array('TeamMember.' . $this->TeamMember->primaryKey => $id));
		$this->set('teamMember', $this->TeamMember->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TeamMember->create();
			if ($this->TeamMember->save($this->request->data)) {
				$this->Session->setFlash(__('The team member has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The team member could not be saved. Please, try again.'));
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
		if (!$this->TeamMember->exists($id)) {
			throw new NotFoundException(__('Invalid team member'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TeamMember->save($this->request->data)) {
				$this->Session->setFlash(__('The team member has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The team member could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TeamMember.' . $this->TeamMember->primaryKey => $id));
			$this->request->data = $this->TeamMember->find('first', $options);
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
		$this->TeamMember->id = $id;
		if (!$this->TeamMember->exists()) {
			throw new NotFoundException(__('Invalid team member'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TeamMember->delete()) {
			$this->Session->setFlash(__('The team member has been deleted.'));
		} else {
			$this->Session->setFlash(__('The team member could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
