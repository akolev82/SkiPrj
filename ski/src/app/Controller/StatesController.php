<?php
App::uses('AppController', 'Controller');
/**
 * States Controller
 *
 * @property State $State
 * @property PaginatorComponent $Paginator
*/
class StatesController extends AppController {

  /**
   * Components
   *
   * @var array
   */
  public $components = array('Paginator');
  
  protected function setVirtualFields() {
    $this->State->virtualFields = array(
        'CountryName' => 'Country.CountryName'
    );
  }

  /**
   * index method
   *
   * @return void
  */
  public function index() {
    $this->State->recursive = 0;
    $this->setVirtualFields();
    $this->set('states', $this->Paginator->paginate());
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
    if (!$this->State->exists($id)) {
      throw new NotFoundException(__('Invalid state'));
    }
    $this->setVirtualFields();
    $options = array('conditions' => array('State.' . $this->State->primaryKey => $id));
    $this->set('state', $this->State->find('first', $options));
  }
  
  public function admin_view($id = null) {
    $this->view($id);
    $this->render('view');
  }
  
  protected function refreshForeignKeys() {
    $countries = array(); //$this->State->Country->find('list');
    $this->set(compact('countries'));
  }

  /**
   * add method
   *
   * @return void
   */
  public function admin_add() {
    if ($this->request->is('post')) {
      $this->State->create();
      if ($this->State->save($this->request->data)) {
        $this->Session->setFlash(__('The state has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The state could not be saved. Please, try again.'));
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
    if (!$this->State->exists($id)) {
      throw new NotFoundException(__('Invalid state'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->State->save($this->request->data)) {
        $this->Session->setFlash(__('The state has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The state could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('State.' . $this->State->primaryKey => $id));
      $this->request->data = $this->State->find('first', $options);
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
    $this->State->clear();
    if (!$this->State->exists($id)) {
      throw new NotFoundException(__('Invalid state'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->State->delete($id)) {
      $this->Session->setFlash(__('The state has been deleted.'));
    } else {
      $this->Session->setFlash(__('The state could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
  }
  
  protected function internalFind($numargs, $arg_list) {
    $this->set('is_debug', false);
    $this->layout = 'ajax';
    $conditions = array('State.StateName !=' => null, 'State.StateName !=' => '');
    $criterias = array(); $selectbox = array(); $empty_caption = 'Please select state'; $is_find = true;
    for ($index = 0; $index < $numargs; $index = $index + 2) {
      $what = $arg_list[$index];
      $value = $arg_list[$index+1];
      if ($what == 'empty') {
        $is_find = false;
        break;
      } else if ($what == 'country') {
        $conditions['State.CountryID = '] = $value;
      } else if ($what == 'beginswith') {
        $conditions['State.StateName like '] = $value . '%';
      }
      $criterias[] = array('what' => $what, 'value' => $value);
    }
  
    if ($is_find === true) {
      $this->State->clear();
      $selectbox = $this->State->find('list', array(
          'conditions' => $conditions, 
          'fields' => array('State.StateID', 'State.StateName'),
          'order' => array('State.StateName'),
          'recursive' => 0
      ));
    }
    $this->set(compact('selectbox', 'criterias', 'empty_caption'));
  }
  
}
