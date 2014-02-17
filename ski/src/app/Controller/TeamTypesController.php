<?php
App::uses('AppController', 'Controller');

class TeamTypesController extends AppController {

	public function index() {
		$this->TeamType->recursive = 0;
		$this->set('teamTypes', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->TeamType->exists($id)) {
			throw new NotFoundException(__('Invalid team type'));
		}
		$options = array('conditions' => array('TeamType.' . $this->TeamType->primaryKey => $id));
		$this->set('teamType', $this->TeamType->find('first', $options));
	}
	
	public function admin_index() {
		$this->index();
		$this->render('index');
	}
	
	public function admin_view($id = null) {
		$this->view($id);
		$this->render('view');
	}

	public function admin_add() {
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

	public function admin_edit($id = null) {
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

	public function admin_delete($id = null) {
		$this->TeamType->clear();
		if (!$this->TeamType->exists($id)) {
			throw new NotFoundException(__('Invalid team type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TeamType->delete($id)) {
			$this->Session->setFlash(__('The team type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The team type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

} ?>
