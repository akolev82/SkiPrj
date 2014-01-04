<?php
App::uses('AppController', 'Controller');
/**
 * LeagueMembers Controller
 *
 * @property LeagueMember $LeagueMember
 * @property PaginatorComponent $Paginator
 */
class LeagueMembersController extends AppController {

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
		$this->LeagueMember->recursive = 0;
		$this->set('leagueMembers', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->LeagueMember->exists($id)) {
			throw new NotFoundException(__('Invalid league member'));
		}
		$options = array('conditions' => array('LeagueMember.' . $this->LeagueMember->primaryKey => $id));
		$this->set('leagueMember', $this->LeagueMember->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->LeagueMember->create();
			if ($this->LeagueMember->save($this->request->data)) {
				$this->Session->setFlash(__('The league member has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The league member could not be saved. Please, try again.'));
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
		if (!$this->LeagueMember->exists($id)) {
			throw new NotFoundException(__('Invalid league member'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->LeagueMember->save($this->request->data)) {
				$this->Session->setFlash(__('The league member has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The league member could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('LeagueMember.' . $this->LeagueMember->primaryKey => $id));
			$this->request->data = $this->LeagueMember->find('first', $options);
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
		$this->LeagueMember->id = $id;
		if (!$this->LeagueMember->exists()) {
			throw new NotFoundException(__('Invalid league member'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->LeagueMember->delete()) {
			$this->Session->setFlash(__('The league member has been deleted.'));
		} else {
			$this->Session->setFlash(__('The league member could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
