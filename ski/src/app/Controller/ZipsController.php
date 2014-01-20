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
    $this->set('zips', $this->Paginator->paginate('Zip'));
  }
  
  public function admin_index() {
    $this->index();
    $this->render('index');
  }

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
    $countries = array(); //$this->Zip->Country->find('list');
    $states = array(); //$this->Zip->State->find('list');
    $cities = array(); //$this->Zip->State->find('list');
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
  
  protected function internalFind($numargs, $arg_list) {
    $this->set('is_debug', false);
    $conditions = array('Zip.ZipCode !=' => null, 'Zip.ZipCode !=' => '');
    $criterias = array(); $selectbox = array(); $empty_caption = 'Please select zip'; $is_find = true;
    for ($index = 0; $index < $numargs; $index = $index + 2) {
      $what = $arg_list[$index];
      $value = $arg_list[$index+1];
      if ($what == 'empty') {
        $is_find = false;
        break;
      } else if ($what == 'country') {
        $conditions['Zip.CountryID = '] = $value;
      } else if ($what == 'state') {
        $conditions['Zip.StateID = '] = $value;
      } else if ($what == 'city') {
        $conditions['Zip.CityID = '] = $value;
      } else if ($what == 'beginswith') {
        $conditions['Zip.ZipCode like '] = $value . '%';
      }
      $criterias[] = array('what' => $what, 'value' => $value);
    }
    
    if ($is_find === true) {
      $fields = array('Zip.ZipID', 'Zip.ZipCode');
      $order_by = array('Zip.ZipCode');
      $empty = 'Please choose zip.';
      $this->Zip->clear();
      $options = compact('fields', 'order_by', 'conditions', 'criterias', 'empty');
      $this->Ajax->paginateCombo($this->Zip, $options);
    }
    return true;
  }
  
}
