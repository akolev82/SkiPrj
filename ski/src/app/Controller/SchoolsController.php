<?php
App::uses('AppController', 'Controller');
/**
 * Schools Controller
 *
 * @property School $School
 * @property PaginatorComponent $Paginator
*/
class SchoolsController extends AppController {
  public $components = array('Paginator');
  protected function setVirtualFields() {
    $this->School->virtualFields = array(
        // 'CountryName' => 'Country.CountryName',
        // 'StateName' => 'State.StateName',
        //'CityName' => 'City.CityName',
        'AddressName' => 'Address.AddressName',
        'AddressStreetAddress' => 'Address.StreetAddress',
        'AddressCityID' => 'Address.CityID',
    );
  }

  public function index() {
    $this->set("title_for_layout","Schools");
    $this->School->recursive = 0;
    $this->setVirtualFields();
    $joins = array();
    //'AddressCityName' => 'Address.City.CityName'
    $joins[] =  array(
        'table' => 'addresses',
        'alias' => 'Address',
        'type' => 'LEFT',
        'conditions' => array(
            'Address.AddressID = School.PrimaryAddressID'
        )
    );
    $joins[] =  array(
        'table' => 'cities',
        'alias' => 'City',
        'type' => 'LEFT',
        'conditions' => array(
            'City.CityID = Address.CityID'
        )
    );
    $this->paginate = array(
        'recursive' => -1,
        'joins' => $joins
    );
    $fields = array('School.SchoolID', 'School.SchoolName', 'School.Active', 'Address.StreetAddress as StreetAddress', 'City.CityName');
    $this->set('schools', $this->Paginator->paginate('School', array(), $fields));
  }

  public function admin_index() {
    $this->index();
    $this->render('index');
  }

  public function view($id = null) {
    if (!$this->School->exists($id)) {
      throw new NotFoundException(__('Invalid school'));
    }
    $this->setVirtualFields();
    $options = array('conditions' => array('School.' . $this->School->primaryKey => $id));
    $this->set('school', $this->School->find('first', $options));
  }
  
  public function admin_view($id = null) {
    $this->view($id);
    $this->render('view');
  }

  protected function refreshForeignKeys() {

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
    $this->refreshForeignKeys();
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
}
