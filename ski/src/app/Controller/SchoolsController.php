<?php
App::uses('AppController', 'Controller');

class SchoolsController extends AppController {

	public function index() {
		$this->School->recursive = 0;
		$this->set('schools', $this->Paginator->paginate());
	}

	public function view($id = null) {
		if (!$this->School->exists($id)) {
			throw new NotFoundException(__('Invalid school'));
		}
		$options = array('conditions' => array('School.' . $this->School->primaryKey => $id));
		$this->set('school', $this->School->find('first', $options));
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
		$principal = $this->School->Principal->find('list');
		$this->set(compact('principal'));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->School->create();
			if ($this->School->save($this->request->data)) {
				$this->Session->setFlash(__('The school has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The school could not be saved. Please, try again.'));
			}
		}
		$this->setVariables();
	}

	public function admin_edit($id = null) {
		if (!$this->School->exists($id)) {
			throw new NotFoundException(__('Invalid school'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->School->save($this->request->data)) {
				$this->Session->setFlash(__('The school has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The school could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('School.' . $this->School->primaryKey => $id));
			$this->request->data = $this->School->find('first', $options);
		}
		$this->setVariables();
	}

	public function admin_delete($id = null) {
		$this->School->clear();
		if (!$this->School->exists($id)) {
			throw new NotFoundException(__('Invalid school'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->School->delete($id)) {
			$this->Session->setFlash(__('The school has been deleted.'));
		} else {
			$this->Session->setFlash(__('The school could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	protected function internalFind($numargs, $arg_list, $options) {
		$this->layout = 'ajax';
		$this->set('is_debug', false);
		$conditions = array('School.SchoolName !=' => null, 'School.SchoolName !=' => '');
		$criterias = array(); $selectbox = array(); $empty_caption = 'Please select School'; $is_find = true;
		for ($index = 0; $index < $numargs; $index = $index + 2) {
			$what = $arg_list[$index];
			$value = $arg_list[$index+1];
			if ($what == 'empty') {
				$is_find = false;
				break;
			} else if ($what == 'country') {
				$conditions['School.CountryID = '] = $value;
			} else if ($what == 'state') {
				$conditions['School.StateID = '] = $value;
			} else if ($what == 'city') {
				$conditions['School.CityID = '] = $value;
			} else if ($what == 'zip') {
				$conditions['School.ZipID = '] = $value;
			} else if ($what == 'beginswith') {
				$conditions['School.SchoolName like '] = $value . '%';
			} else if ($what == 'all') {
				break;
			}
			$criterias[] = array('what' => $what, 'value' => $value);
		}
	
		if ($is_find === true) {
			$this->School->recursive = 0;
			$fields = array('School.SchoolID', 'School.SchoolName');
			$order_by = array('School.SchoolName' => 'asc');
			$empty = 'Please choose school.';
			$this->School->clear();
			$options = am(compact('fields', 'order_by', 'conditions', 'criterias', 'empty'), $options);
	
			$this->Ajax->paginateCombo($this->School, $options);
		}
		return true;
	}

} ?>
