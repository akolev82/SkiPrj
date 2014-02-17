<?php
App::uses('AppModel', 'Model');

class Student extends AppModel {

  public $name = 'Student';
  public $primaryKey = 'StudentID';
  public $displayField = 'FullName';
  
  public $virtualFields = array(
      'FullName' => 'TRIM(SQUEEZE(CONCAT(Student.FirstName, " ", Student.MiddleName, " ", Student.LastName)))',
      'BirthPlaceName' => 'BirthPlace.CityName',
      'SchoolName' => 'School.SchoolName',
      'ZipCode' => 'Zip.ZipCode',
      'CityName' => 'City.CityName',
      'StateName' => 'State.StateName',
      'CountryName' => 'Country.CountryName'
  );

  public function getGenderTypes() {
    return array('M' => 'Male', 'F' => 'Female', 'U' => 'Unknown');
  }
  
  public $validate = array(
      'StudentID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              'message' => 'Invalid value.',
              'required' => true,
              'on' => 'update', // Limit validation to 'create' or 'update' operations
          )
      ),
      'FirstName' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty'),
              'message' => 'Required field name'
          ),
      ),
      'LastName' => array(
          'notEmpty' => array(
              'rule' => array('notEmpty'),
              'message' => 'Required LastName',
          ),
      ),
      'ZipID' => array(
          'naturalNumber' => array(
              'rule' => array('naturalNumber'),
              'message' => 'Invalid Zip.',
              'required' => false,
          		'allowEmpty' => true,
              'on' => 'update'
          ),
      ),
      'CityID' => array(
          'naturalNumber' => array(
              'rule' => array('naturalNumber'),
              'message' => 'Invalid City.',
              'required' => false,
          		'allowEmpty' => true,
              'on' => 'update'
          ),
      ),
      'StateID' => array(
          'naturalNumber' => array(
              'rule' => array('naturalNumber'),
              'message' => 'Invalid State.',
              'required' => false,
          		'allowEmpty' => true,
              'on' => 'update'
          ),
      ),
      'CountryID' => array(
          'naturalNumber' => array(
              'rule' => array('naturalNumber'),
              'message' => 'Invalid Country.',
              'required' => false,
          		'allowEmpty' => true,
              'on' => 'update'
          ),
      ),
      'Gender' => array(
          'inList' => array(
              'rule' => array('inList', array('M', 'F', 'U')),
              'message' => 'Please enter valid gender.',
              'required' => true,
              'on' => 'create',
          ),
      ),
      'BirthDate' => array(
          'datetime' => array(
              'rule' => array('date'),
              'message' => 'Invalid birth date'
          ),
      ),
      'BirthPlace' => array(
          'naturalNumber' => array(
              'rule' => array('naturalNumber'),
          		'allowEmpty' => true,
          ),
      ),
      'SchoolID' => array(
          'naturalNumber' => array(
              'rule' => array('naturalNumber'),
              'message' => 'Invalid school.',
              'required' => true
          ),
      )
      
  );
  
  //The Associations below have been created with all possible keys, those that are not needed can be removed
  public $belongsTo = array(
      'City' => array(
          'className' => 'City',
          'foreignKey' => 'CityID',
          'conditions' => '',
          'fields' => '',
          'order' => ''
      ),
      'State' => array(
          'className' => 'State',
          'foreignKey' => 'StateID',
          'conditions' => '',
          'fields' => '',
          'order' => ''
      ),
      'Country' => array(
          'className' => 'Country',
          'foreignKey' => 'CountryID',
          'conditions' => '',
          'fields' => '',
          'order' => ''
      ),
      'Zip' => array(
          'className' => 'Zip',
          'foreignKey' => 'ZipID',
          'conditions' => '',
          'fields' => '',
          'order' => ''
      ),
      'BirthPlace' => array(
          'className' => 'City',
          'foreignKey' => 'BirthPlace',
          'conditions' => '',
          'fields' => 'CityID',
          'order' => ''
      ),
      'School' => array(
          'className' => 'School',
          'foreignKey' => 'SchoolID',
          'conditions' => '',
          'fields' => 'SchoolID',
          'order' => ''
      )
  );

}
