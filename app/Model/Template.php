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
	public $hasAndBelongsToMany = array(
		'Exercise' => array(
			'className' => 'Exercise',
			'joinTable' => 'exercises_templates',
			'foreignKey' => 'template_id',
			'associationForeignKey' => 'template_id',
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
