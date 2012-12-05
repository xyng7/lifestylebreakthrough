<?php
App::uses('AppModel', 'Model');
/**
 * Template Model
 *
 * @property Exercise $Exercise
 */
class Template extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
        
        public $validate = array(
       
        'name' => array(
            //rule 1 - cannot be empty
            'Rule-1' => array(
                'rule' => array('notempty'),
                'message' => 'Enter Template Name'),
        
            ),
        );

       
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Exercise' => array(
			'className' => 'Exercise',
			'joinTable' => 'exercises_templates',
			'foreignKey' => 'template_id',
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
