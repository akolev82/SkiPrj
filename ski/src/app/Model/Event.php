<?php
App::uses('AppModel', 'Model');
/**
 * Event Model
 *
*/
class Event extends AppModel {

  public $name = 'Event';
  public $useTable='events';
  public $primaryKey = 'EventID';
  public $displayField = 'EventName';

  
  public $validate = array(
      'EventID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              'required' => true,
              'on' => 'update', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'SeasonID' => array(
          'numeric' => array(
              'rule' => array('numeric')
          ),
      ),
      'DateBegin' => array(
          'date' => array(
              'rule' => array('date')
          ),
      ),
      'DateEnd' => array(
          'date' => array(
              'rule' => array('date')
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
      'Season' => array(
          'className' => 'Season',
          'foreignKey' => 'SeasonID',
          'conditions' => '',
          'fields' => 'SeasonID',
          'order' => ''
      )
  );
  
}
