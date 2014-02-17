<?php
App::uses('AppController', 'Controller');

class LeaguesController extends AppController {
	
	protected function setVirtualFields() {
		$this->League->virtualFields['CoachFullName'] = 'TRIM(SQUEEZE(CONCAT(Coach.FirstName, " ", Coach.MiddleName, " ", Coach.LastName)))';
		$this->League->virtualFields['ThemeName'] = 'Theme.ThemeName';
	}
	
	public function index() {
		$this->League->recursive = 0;
		$this->setVirtualFields();
		$this->set('leagues', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->League->exists($id)) {
			throw new NotFoundException(__('Invalid league'));
		}
		$this->setVirtualFields();
		$options = array('conditions' => array('League.' . $this->League->primaryKey => $id));
		$this->set('league', $this->League->find('first', $options));
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
		$themes = $this->League->Theme->find('list');
		$people = $this->League->Coach->find('list');
		$this->set(compact('themes', 'people'));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->League->create();
			if ($this->League->save($this->request->data)) {
				$this->Session->setFlash(__('The league has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The league could not be saved. Please, try again.'));
			}
		}
		$this->setVariables();
	}

	public function admin_edit($id = null) {
		if (!$this->League->exists($id)) {
			throw new NotFoundException(__('Invalid league'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->League->save($this->request->data)) {
				$this->Session->setFlash(__('The league has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The league could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('League.' . $this->League->primaryKey => $id));
			$this->request->data = $this->League->find('first', $options);
		}
		$this->setVariables();
	}
	
	public function admin_delete($id = null) {
		$this->League->clear();
		if (!$this->League->exists($id)) {
			throw new NotFoundException(__('Invalid league'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->League->delete($id)) {
			$this->Session->setFlash(__('The league has been deleted.'));
		} else {
			$this->Session->setFlash(__('The league could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

}
