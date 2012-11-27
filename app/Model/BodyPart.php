<?php
App::uses('AppModel', 'Model');
/**
 * BodyPart Model
 *
 * @property Exercise $Exercise
 */
class BodyPart extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
var $displayField = 'body_part';
    public $validate = array(
		'body_part' => array(
 //rule 1 - cannot be empty
			'bodypartRule-1' => array(
				'rule' => array('notempty'),
				'message' => 'Enter Body Part',
                            ),
                   //rule 2 - must be in alphabet
                        'bodypartRule-2' => array(
                                'rule' => '/[A-Za-z]/',
                                'message' => 'Invalid Name',
			),

                        //is unique
                        'unique' => array(
                                'rule' => array('isUnique'),
                                'message' => 'Body part must be unique'),
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
			'joinTable' => 'body_parts_exercises',
			'foreignKey' => 'body_part_id',
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
