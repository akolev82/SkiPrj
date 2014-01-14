<?php
App::uses('AppController', 'Controller');
/**
 * Seasons Controller
 *
 * @property Season $Season
 * @property PaginatorComponent $Paginator
*/
class SeasonsController extends AppController {

  /**
   * Components
   *
   * @var array
   */
  public $components = array('Paginator');

  public function index() {
    $this->Season->recursive = 0;
    $this->set('seasons', $this->Paginator->paginate());
  }

  public function admin_index() {
    $this->index();
  }

  /**
   * view method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */

  public function view($id = null) {
    if (!$this->Season->exists($id)) {
      throw new NotFoundException(__('Invalid season'));
    }
    $options = array('conditions' => array('Season.' . $this->Season->primaryKey => $id));
    $this->set('season', $this->Season->find('first', $options));
  }

  public function admin_view($id = null) {
    $this->view($id);
  }

  /**
   * add method
   *
   * @return void
   */
  public function admin_add() {
    if ($this->request->is('post')) {
      $this->Season->create();
      if ($this->Season->save($this->request->data)) {
        $this->Session->setFlash(__('The season has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The season could not be saved. Please, try again.'));
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
  public function admin_edit($id = null) {
    if (!$this->Season->exists($id)) {
      throw new NotFoundException(__('Invalid season'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Season->save($this->request->data)) {
        $this->Session->setFlash(__('The season has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The season could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('Season.' . $this->Season->primaryKey => $id));
      $this->request->data = $this->Season->find('first', $options);
    }
  }

  /**
   * delete method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function admin_delete($id = null) {
    $this->Season->clear();
    if (!$this->Season->exists($id)) {
      throw new NotFoundException(__('Invalid season'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->Season->delete($id)) {
      $this->Session->setFlash(__('The season has been deleted.'));
    } else {
      $this->Session->setFlash(__('The season could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
  }
}
