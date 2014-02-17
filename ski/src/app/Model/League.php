<?php
App::uses('AppModel', 'Model');

class League extends AppModel {
  
  public $name = 'League';
  public $useTable='leagues';
  public $primaryKey = 'LeagueID';
  public $displayField = 'LeagueName';
  
  public $virtualFields = array(
  		
  );

  public $validate = array(
      'LeagueID' => array(
          'numeric' => array(
              'rule' => array('numeric'),
              'message' => 'Missing primary ID.',
              'required' => true,
              'on' => 'update', // Limit validation to 'create' or 'update' operations
          ),
      ),
      'LeagueName' => array(
          'Required league name' => array(
              'rule' => array('notEmpty')
          ),
      ),
  		'PersonContactID' => array(
  				'Invalid contact' => array(
  						'rule' => array('numeric'),
  						'message' => 'Invalid value for person contact.',
  						'allowEmpty' => true
  				)
  		),
  		'ThemeID' => array(
  				'Invalid theme ID' => array(
  						'rule' => array('numeric'),
  						'message' => 'Invalid value for theme identifier.',
  						'allowEmpty' => true
  				)
  		),
  		'subdomain' => array(
  				'Invalid theme ID' => array(
  						'rule' => array('alphaNumeric'),
  						'message' => 'Invalid value for subdomain.',
  						'allowEmpty' => true
  				)
  		)
  );
  
  //The Associations below have been created with all possible keys, those that are not needed can be removed
  public $belongsTo = array(
  		'Theme' => array(
  				'className' => 'Theme',
  				'foreignKey' => 'ThemeID',
  				'conditions' => '',
  				'fields' => 'ThemeID',
  				'order' => ''
  		),
  		'Coach' => array(
  				'className' => 'Coach',
  				'foreignKey' => 'CoachID',
  				'conditions' => '',
  				'fields' => 'PersonContactID',
  				'order' => ''
  		)
  );
}
