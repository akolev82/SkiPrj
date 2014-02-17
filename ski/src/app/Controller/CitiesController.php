<?php
App::uses('AppController', 'Controller');


class CitiesController extends AppController {

  /**
   * Components
   *
   * @var array
   */
  public $components = array('Paginator');
  
  protected function setVirtualFields() {
    $this->City->virtualFields = array(
        'CountryName' => 'Country.CountryName',
        'StateName' => 'State.StateName'
    );
  }

  /**
   * index method
   *
   * @return void
  */
  public function index() {
    $this->City->recursive = 0;
    $this->setVirtualFields();
    $this->set('cities', $this->Paginator->paginate());
  }
  
  public function admin_index() {
    $this->index();
    $this->render('index');
  }

  public function view($id = null) {
    if (!$this->City->exists($id)) {
      throw new NotFoundException(__('Invalid city'));
    }
    $this->setVirtualFields();
    $options = array('conditions' => array('City.' . $this->City->primaryKey => $id));
    $this->set('city', $this->City->find('first', $options));
  }

  public function admin_view($id = null) {
    $this->view($id);
    $this->render('view');
  }
  
  protected function refreshForeignKeys() {
    $countries = array(); //$this->City->Country->find('list');
    $states = array(); //$this->City->State->find('list');
    $this->set(compact('countries', 'states'));
  }

  /**
   * add method
   *
   * @return void
   */
  public function admin_add() {
    if ($this->request->is('post')) {
      $this->City->create();
      if ($this->City->save($this->request->data)) {
        $this->Session->setFlash(__('The city has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The city could not be saved. Please, try again.'));
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
    if (!$this->City->exists($id)) {
      throw new NotFoundException(__('Invalid city'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->City->save($this->request->data)) {
        $this->Session->setFlash(__('The city has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The city could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('City.' . $this->City->primaryKey => $id));
      $this->request->data = $this->City->find('first', $options);
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
    $this->City->clear();
    if (!$this->City->exists($id)) {
      throw new NotFoundException(__('Invalid city'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->City->delete($id)) {
      $this->Session->setFlash(__('The city has been deleted.'));
    } else {
      $this->Session->setFlash(__('The city could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
  }
  
  protected function internalFind($numargs, $arg_list, $options) {
    $this->layout = 'ajax';
    $this->set('is_debug', false);
    $conditions = array('City.CityName !=' => null, 'City.CityName !=' => '');
    $criterias = array(); $selectbox = array(); $empty_caption = 'Please select city'; $is_find = true;
    for ($index = 0; $index < $numargs; $index = $index + 2) {
      $what = $arg_list[$index];
      $value = $arg_list[$index+1];
      if ($what == 'empty') {
        $is_find = false;
        break;
      } else if ($what == 'country') {
        $conditions['City.CountryID = '] = $value;
      } else if ($what == 'state') {
        $conditions['City.StateID = '] = $value;
      } else if ($what == 'beginswith') {
        $conditions['City.CityName like '] = $value . '%';
      } else if ($what == 'all') {
        break;
      }
      $criterias[] = array('what' => $what, 'value' => $value);
    }
    
    if ($is_find === true) {
      $fields = array('City.CityID', 'City.CityName');
      $order_by = array('City.CityName' => 'asc');
      $empty = 'Please choose city.';
      $this->City->clear();
      $options = am(compact('fields', 'order_by', 'conditions', 'criterias', 'empty'), $options);
      
      $this->Ajax->paginateCombo($this->City, $options);
    }
    return true;
  }
  
}
