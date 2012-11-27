<?php

App::uses('AppModel', 'Model');

/**
 * Category Model
 *
 * @property Exercise $Exercise
 */
class Category extends AppModel {

    var $displayField = 'category';
    public $validate = array(
        'category' => array(
            //rule 1 - cannot be empty
            'categoryRule-1' => array(
                'rule' => array('notempty'),
                'message' => 'Enter Category',
            ),
            //rule 2 - must be in alphabet
            'categoryRule-2' => array(
                'rule' => '/[A-Za-z]/',
                'message' => 'Invalid Name',
            ),
            //is unique
            'unique' => array(
                'rule' => array('isUnique'),
                'message' => 'Category must be unique'),
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
            'joinTable' => 'categories_exercises',
            'foreignKey' => 'category_id',
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
