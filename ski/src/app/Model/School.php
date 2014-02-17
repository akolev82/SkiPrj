<?php
App::uses ( 'AppModel', 'Model' );

class School extends AppModel {
	public $name = 'School';
	public $primaryKey = 'SchoolID';
	public $displayField = 'SchoolName';
	
	public $virtualFields = array(
		'PrincipalFullName' => 'TRIM(SQUEEZE(CONCAT(Principal.FirstName, " ", Principal.MiddleName, " ", Principal.LastName)))',
	);
	
	public function __construct($id = false, $table = null, $ds = null) {
		parent::__construct($id, $table, $ds);
		$curName = 'Principal';
		$this->Principal->virtualFields['FullName'] = 'TRIM(SQUEEZE(CONCAT(' . $curName . '.FirstName, " ", ' . $curName . '.MiddleName, " ", ' . $curName . '.LastName)))';
	}
	
	public $validate = array (
			'SchoolID' => array (
					'naturalNumber' => array (
							'rule' => array (
									'naturalNumber' 
							),
							'message' => 'Required school ID.',
							'required' => true,
							'on' => 'update' 
					) 
			),
			'SchoolName' => array (
					'notEmpty' => array (
							'rule' => array (
									'notEmpty' 
							),
							'message' => 'Required school name.' 
					) 
			),
			'Active' => array (
					'naturalNumber' => array (
							'rule' => array (
									'naturalNumber' 
							),
							'message' => 'Required active value',
							'allowEmpty' => true,
							'required' => false 
					) 
			),
			'PrincipalID' => array (
					'naturalNumber' => array (
							'rule' => array (
									'naturalNumber' 
							),
							'on' => 'create' 
					) 
			),
			'ZipID' => array (
					'naturalNumber' => array (
							'rule' => array (
									'naturalNumber' 
							),
							'message' => 'Invalid Zip.',
							'required' => false,
							'allowEmpty' => true,
							'on' => 'update' 
					) 
			),
			'CityID' => array (
					'naturalNumber' => array (
							'rule' => array (
									'naturalNumber' 
							),
							'message' => 'Invalid Zip.',
							'required' => false,
							'allowEmpty' => true,
							'on' => 'update' 
					) 
			),
			'StateID' => array (
					'naturalNumber' => array (
							'rule' => array (
									'naturalNumber' 
							),
							'message' => 'Invalid Zip.',
							'required' => false,
							'allowEmpty' => true,
							'on' => 'update' 
					) 
			),
			'CountryID' => array (
					'naturalNumber' => array (
							'rule' => array (
									'naturalNumber' 
							),
							'message' => 'Invalid Zip.',
							'required' => false,
							'allowEmpty' => true,
							'on' => 'update' 
					) 
			) 
	);
	
	// The Associations below have been created with all possible keys, those that are not needed can be removed
	public $belongsTo = array (
			'City' => array (
					'className' => 'City',
					'foreignKey' => 'CityID',
					'conditions' => '',
					'fields' => 'CityID',
					'order' => '' 
			),
			'State' => array (
					'className' => 'State',
					'foreignKey' => 'StateID',
					'conditions' => '',
					'fields' => 'StateID',
					'order' => '' 
			),
			'Country' => array (
					'className' => 'Country',
					'foreignKey' => 'CountryID',
					'conditions' => '',
					'fields' => 'CountryID',
					'order' => '' 
			),
			'Zip' => array (
					'className' => 'Zip',
					'foreignKey' => 'ZipID',
					'conditions' => '',
					'fields' => 'ZipID',
					'order' => '' 
			),
			'Principal' => array (
					'className' => 'Coach',
					'foreignKey' => 'PrincipalID',
					'conditions' => '',
					'fields' => 'CoachID',
					'order' => '' 
			) 
	);
}
