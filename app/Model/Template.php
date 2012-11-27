<?php
App::uses('AppModel', 'Model');
/**
 * Template Model
 *
 * @property Program $Program
 */
class Template extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'program_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'template_name' => array(
			//rule 1 - cannot be empty
			'templateRule-1' => array(
				'rule' => array('notempty'),
				'message' => 'Enter Template Name',
                            ),
                   //rule 2 - must be in alphabet
                        'templateRule-2' => array(
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
		'Program' => array(
			'className' => 'Program',
			'foreignKey' => 'program_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
