<?php
App::uses('AppController', 'Controller');

class TeamMembersController extends AppController {

	public function index() {
		$this->TeamMember->recursive = 0;
		$this->set('teamMembers', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->TeamMember->exists($id)) {
			throw new NotFoundException(__('Invalid team member'));
		}
		$options = array('conditions' => array('TeamMember.' . $this->TeamMember->primaryKey => $id));
		$this->set('teamMember', $this->TeamMember->find('first', $options));
	}
	
	public function admin_index() {
		$this->index();
		$this->render('index');
	}
	
	public function admin_view($id = null) {
		$this->view($id);
		$this->render('view');
	}
	
	protected function setVariables() {
		$teams = $this->TeamMember->Team->find('list');
		$students = $this->TeamMember->Student->find('list');
		$this->set(compact('teams', 'students'));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->TeamMember->create();
			if ($this->TeamMember->save($this->request->data)) {
				$this->Session->setFlash(__('The team member has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The team member could not be saved. Please, try again.'));
			}
		}
		$this->setVariables();
	}

	public function admin_edit($id = null) {
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
		$this->setVariables();
	}

	public function admin_delete($id = null) {
		$this->TeamMember->clear();
		if (!$this->TeamMember->exists($id)) {
			throw new NotFoundException(__('Invalid team member'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TeamMember->delete($id)) {
			$this->Session->setFlash(__('The team member has been deleted.'));
		} else {
			$this->Session->setFlash(__('The team member could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

} ?>
