<?php
App::uses ( 'AppController', 'Controller' );

class TeamsController extends AppController {
	
	public function index() {
		$this->Team->recursive = 0;
		$this->set ( 'teams', $this->Paginator->paginate () );
	}
	
	public function view($id = null) {
		if (! $this->Team->exists ( $id )) {
			throw new NotFoundException ( __ ( 'Invalid team' ) );
		}
		$options = array (
				'conditions' => array (
						'Team.' . $this->Team->primaryKey => $id 
				) 
		);
		$this->set('team', $this->Team->find('first', $options));
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
		$teamTypes = $this->Team->TeamType->find('list');
		$coaches = $this->Team->Coach->find('list');
		$this->set(compact('teamTypes', 'coaches'));
	}
	
	public function admin_add() {
		if ($this->request->is ( 'post' )) {
			$this->Team->create ();
			if ($this->Team->save ( $this->request->data )) {
				$this->Session->setFlash ( __ ( 'The team has been saved.' ) );
				return $this->redirect ( array (
						'action' => 'index' 
				) );
			} else {
				$this->Session->setFlash ( __ ( 'The team could not be saved. Please, try again.' ) );
			}
		}
		$this->setVariables();
	}
	
	public function admin_edit($id = null) {
		if (! $this->Team->exists ( $id )) {
			throw new NotFoundException (__( 'Invalid team' ));
		}
		if ($this->request->is(array('post', 'put') )) {
			if ($this->Team->save($this->request->data )) {
				$this->Session->setFlash(__( 'The team has been saved.' ));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__( 'The team could not be saved. Please, try again.' ));
			}
		} else {
			$options = array (
					'conditions' => array('Team.' . $this->Team->primaryKey => $id) 
			);
			$this->request->data = $this->Team->find('first', $options);
		}
		$this->setVariables();
	}
	
	public function admin_delete($id = null) {
		$this->Team->clear();
		if (! $this->Team->exists($id)) {
			throw new NotFoundException ( __ ( 'Invalid team' ) );
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Team->delete($id)) {
			$this->Session->setFlash(__( 'The team has been deleted.'));
		} else {
			$this->Session->setFlash(__('The team could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
