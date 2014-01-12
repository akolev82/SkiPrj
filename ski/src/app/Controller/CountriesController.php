<?php
App::uses('AppController', 'Controller');
/**
 * Countries Controller
 *
 * @property Country $Country
 * @property PaginatorComponent $Paginator
*/
class CountriesController extends AppController {

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
  public function index() {
    $this->Country->recursive = 0;
    $this->set('countries', $this->Paginator->paginate());
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
    if (!$this->Country->exists($id)) {
      throw new NotFoundException(__('Invalid country'));
    }
    $options = array('conditions' => array('Country.' . $this->Country->primaryKey => $id));
    $this->set('country', $this->Country->find('first', $options));
  }
  
  public function admin_view($id = null) {
    $this->view($id);
  }

  public function admin_add() {
    if ($this->request->is('post')) {
      $this->Country->create();
      if ($this->Country->save($this->request->data)) {
        $this->Session->setFlash(__('The country has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The country could not be saved. Please, try again.'));
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
    if (!$this->Country->exists($id)) {
      throw new NotFoundException(__('Invalid country'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Country->save($this->request->data)) {
        $this->Session->setFlash(__('The country has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The country could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('Country.' . $this->Country->primaryKey => $id));
      $this->request->data = $this->Country->find('first', $options);
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
    $this->Country->clear();
    if (!$this->Country->exists($id)) {
      throw new NotFoundException(__('Invalid country'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->Country->delete($id)) {
      $this->Session->setFlash(__('The country has been deleted.'));
    } else {
      $this->Session->setFlash(__('The country could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
  }
  
  protected function internalFind($numargs, $arg_list) {
    $this->set('is_debug', false);
    $conditions = array('Country.CountryName !=' => null, 'Country.CountryName !=' => '');
    $criterias = array(); $selectbox = array(); $empty_caption = 'Please select country'; $is_find = true;
    for ($index = 0; $index < $numargs; $index = $index + 2) {
      $what = $arg_list[$index];
      $value = $arg_list[$index+1];
      if ($what == 'empty') {
        $is_find = false;
        break;
      } else if ($what == 'beginswith') {
        $conditions['Country.CountryName like '] = $value . '%';
      }
      $criterias[] = array('what' => $what, 'value' => $value);
    }
  
    if ($is_find === true) {
      $this->Country->clear();
      $selectbox = $this->Country->find('list', array(
          'conditions' => $conditions,
          'fields' => array('Country.CountryID', 'Country.CountryName'),
          'order' => array('Country.CountryName'),
          'recursive' => 0
      ));
    }
    $this->set(compact('selectbox', 'criterias', 'empty_caption'));
    $this->layout = 'ajax';
  }
  
}
