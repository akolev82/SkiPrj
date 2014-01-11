<?php
App::uses('AppController', 'Controller');
/**
 * Zips Controller
 *
 * @property Zip $Zip
 * @property PaginatorComponent $Paginator
*/
class ZipsController extends AppController {

  /**
   * Components
   *
   * @var array
   */
  public $components = array('Paginator');
  
  protected function setVirtualFields() {
    $this->Zip->virtualFields = array(
        'CountryName' => 'Country.CountryName',
        'StateName' => 'State.StateName',
        'CityName' => 'City.CityName'
    );
  }

  /**
   * index method
   *
   * @return void
  */
  public function index() {
    $this->Zip->recursive = 0;
    $this->setVirtualFields();
    $this->set('zips', $this->Paginator->paginate());
  }
  
  public function admin_index() {
    $this->index();
    $this->render('index');
  }

  /**
   * view method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function view($id = null) {
    if (!$this->Zip->exists($id)) {
      throw new NotFoundException(__('Invalid zip'));
    }
    $this->setVirtualFields();
    $options = array('conditions' => array('Zip.' . $this->Zip->primaryKey => $id));
    $this->set('zip', $this->Zip->find('first', $options));
  }
  
  public function admin_view($id = null) {
    $this->view($id);
    $this->render('view');
  }
  
  protected function refreshForeignKeys() {
    $countries = $this->Zip->Country->find('list');
    $states = $this->Zip->State->find('list');
    $cities = $this->Zip->State->find('list');
    $this->set(compact('countries', 'states', 'cities'));
  }

  /**
   * add method
   *
   * @return void
   */
  public function admin_add() {
    if ($this->request->is('post')) {
      $this->Zip->create();
      if ($this->Zip->save($this->request->data)) {
        $this->Session->setFlash(__('The zip has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The zip could not be saved. Please, try again.'));
      }
    }
    $this->refreshForeignKeys();
  }
  
  

  /**
   * edit method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function admin_edit($id = null) {
    if (!$this->Zip->exists($id)) {
      throw new NotFoundException(__('Invalid zip'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Zip->save($this->request->data)) {
        $this->Session->setFlash(__('The zip has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The zip could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('Zip.' . $this->Zip->primaryKey => $id));
      $this->request->data = $this->Zip->find('first', $options);
    }
    $this->refreshForeignKeys();
  }

  /**
   * delete method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function admin_delete($id = null) {
    $this->Zip->clear();
    if (!$this->Zip->exists($id)) {
      throw new NotFoundException(__('Invalid zip'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->Zip->delete($id)) {
      $this->Session->setFlash(__('The zip has been deleted.'));
    } else {
      $this->Session->setFlash(__('The zip could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
  }
}
