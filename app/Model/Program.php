<?php
App::uses('AppModel', 'Model');
/**
 * Program Model
 *
 * @property Client $Client
 * @property Template $Template
 * @property Exercise $Exercise
 */
class Program extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
        var $displayField = 'name';
	public $validate = array(
		'client_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			//rule 1 - cannot be empty
			'programnameRule-1' => array(
				'rule' => array('notempty'),
				'message' => 'Enter Program Name',
                            ),
                   //rule 2 - must be in alphabet
                        'bodypartRule-2' => array(
                                'rule' => '/[A-Za-z]/',
                                'message' => 'Invalid Name',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Client' => array(
			'className' => 'Client',
			'foreignKey' => 'client_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Template' => array(
			'className' => 'Template',
			'foreignKey' => 'program_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Exercise' => array(
			'className' => 'Exercise',
			'joinTable' => 'exercises_programs',
			'foreignKey' => 'program_id',
			'associationForeignKey' => 'exercise_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
