<?php
App::uses('AppController', 'Controller');
/**
 * People Controller
 *
 * @property Person $Person
 * @property PaginatorComponent $Paginator
*/
class PeopleController extends AppController {

  /**
   * Components
   *
   * @var array
   */
  public $components = array('Paginator');
  public $uses = array('Person', 'City');
  
  protected function beforeEditing() {
    $cities = $this->Person->City->find('list');
    $this->set(compact('cities'));
  }
  
  protected function beforeView() {
    $this->Person->recursion = 0;
    $this->Person->virtualFields = array(
        'BirthPlaceName' => 'City.CityName'
    );
  }

  /**
   * index method
   *
   * @return void
  */
  public function index() {
    $this->beforeView();
    $this->set('people', $this->Paginator->paginate());
  }

  /**
   * view method
   *
   * @throws NotFoundException
   * @param string $id
   * @return void
   */
  public function view($id = null) {
    $this->beforeView();
    if (!$this->Person->exists($id)) {
      throw new NotFoundException(__('Invalid person'));
    }
    $options = array('conditions' => array('Person.' . $this->Person->primaryKey => $id));
    $this->set('person', $this->Person->find('first', $options));
  }

  public function admin_index() {
    $this->beforeView();
    $this->set('people', $this->Paginator->paginate());
  }

  public function admin_view($id = null) {
    $this->beforeView();
    if (!$this->Person->exists($id)) {
      throw new NotFoundException(__('Invalid person'));
    }
    $options = array('conditions' => array('Person.' . $this->Person->primaryKey => $id));
    $this->set('person', $this->Person->find('first', $options));
    
    $this->loadModel('Student');
    $this->loadModel('Staff');

    $this->Student->recursive = 10;
    $this->set('students', $this->Student->find('all', array('conditions' => array('Student.' . $this->Person->primaryKey => $id))));
    $this->set('staffs', $this->Staff->find('list', array('conditions' => array('Staff.' . $this->Person->primaryKey => $id))));
  }

  public function admin_add() {
    if ($this->request->is('post')) {
      $this->Person->create();
      if ($this->Person->save($this->request->data)) {
        $this->Session->setFlash(__('The person has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The person could not be saved. Please, try again.'));
      }
    }
    $this->beforeEditing();
  }

  public function admin_edit($id = null) {
    if (!$this->Person->exists($id)) {
      throw new NotFoundException(__('Invalid person'));
    }
    if ($this->request->is(array('post', 'put'))) {
      if ($this->Person->save($this->request->data)) {
        $this->Session->setFlash(__('The person has been saved.'));
        return $this->redirect(array('action' => 'index'));
      } else {
        $this->Session->setFlash(__('The person could not be saved. Please, try again.'));
      }
    } else {
      $options = array('conditions' => array('Person.' . $this->Person->primaryKey => $id));
      $this->request->data = $this->Person->find('first', $options);
    }
    $this->beforeEditing();
  }

  public function admin_delete($id = null) {
    $this->Person->clear();
    if (!$this->Person->exists($id)) {
      throw new NotFoundException(__('Invalid person'));
    }
    $this->request->onlyAllow('post', 'delete');
    if ($this->Person->delete($id)) {
      $this->Session->setFlash(__('The person has been deleted.'));
    } else {
      $this->Session->setFlash(__('The person could not be deleted. Please, try again.'));
    }
    return $this->redirect(array('action' => 'index'));
  }
} ?>
