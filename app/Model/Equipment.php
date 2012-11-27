<?php

App::uses('AppModel', 'Model');

/**
 * Equipment Model
 *
 * @property Exercise $Exercise
 */
class Equipment extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    var $displayField = 'equipment';
    public $useTable = 'equipments';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'equipment' => array(
            //rule 1 - cannot be empty
            'equipmentRule-1' => array(
                'rule' => array('notempty'),
                'message' => 'Enter Equipment Name',
            ),
            //rule 2 - must be in alphabet
            'equipmentRule-2' => array(
                'rule' => '/[A-Za-z]/',
                'message' => 'Invalid Name',
            ),
            //is unique
            'unique' => array(
                'rule' => array('isUnique'),
                'message' => 'Equipment must be unique'),
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
            'joinTable' => 'equipments_exercises',
            'foreignKey' => 'equipment_id',
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
