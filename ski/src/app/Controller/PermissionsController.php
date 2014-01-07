<?php
App::uses('AppController', 'Controller');
/**
 * Permissions Controller
 *
 * @property Permission $Permission
 * @property PaginatorComponent $Paginator
 */
class PermissionsController extends AppController {

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
	public function admin_index() {
		$this->Permission->recursive = 0;
		$this->Permission->virtualFields = array(
		    'DomainName' => 'Domain.DomainName'
		);
		$this->set('permissions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Permission->exists($id)) {
			throw new NotFoundException(__('Invalid permission'));
		}
		$options = array('conditions' => array('Permission.' . $this->Permission->primaryKey => $id));
		$this->Permission->virtualFields = array(
		    'DomainName' => 'Domain.DomainName'
		);
		$this->set('permission', $this->Permission->find('first', $options));
	}
	
	protected function refreshDomains() {
	  $domains = $this->Permission->Domain->find('list');
	  $this->set(compact('domains'));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Permission->create();
			if ($this->Permission->save($this->request->data)) {
				$this->Session->setFlash(__('The permission has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The permission could not be saved. Please, try again.'));
			}
		}
		$this->refreshDomains();
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Permission->exists($id)) {
			throw new NotFoundException(__('Invalid permission'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Permission->save($this->request->data)) {
				$this->Session->setFlash(__('The permission has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The permission could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Permission.' . $this->Permission->primaryKey => $id));
			$this->request->data = $this->Permission->find('first', $options);
		}
		$this->refreshDomains();
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Permission->clear();
		if (!$this->Permission->exists($id)) {
			throw new NotFoundException(__('Invalid permission'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Permission->delete($id)) {
			$this->Session->setFlash(__('The permission has been deleted.'));
		} else {
			$this->Session->setFlash(__('The permission could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
}
