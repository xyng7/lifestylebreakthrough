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
            'programnameRule-2' => array(
                'rule' => '/[A-Za-z]/',
                'message' => 'Invalid Name',
            ),
        ),
        'start_date' => array(
            //rule 1 - cannot be empty
            'start_date' => array(
                'rule' => array('notempty'),
                'message' => 'Pick a date',
            ),
            'startBeforeEnd' => array(
                'rule' => array('startBeforeEnd', 'end_date'),
                'message' => 'The start date must be before the end date.'
            ),
            'pastDate' => array(
                'rule' => array('pastDate', 'start_date'),
                'message' => 'The start date is invalid'
            ),
        ),
        'end_date' => array(
            //rule 1 - cannot be empty
            'end_date' => array(
                'rule' => array('notempty'),
                'message' => 'Pick a date',
            ),
                'pastDate' => array(
                'rule' => array('pastDate', 'end_date'),
                'message' => 'The end date is invalid'
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

    function startBeforeEnd($field = array(), $compare_field = null) {
        foreach ($field as $key => $value) {
            $v1 = $value;
            $v2 = $this->data['Program'][$compare_field];
            if ($v1 > $v2) {
                return FALSE;
            } else {
                continue;
            }
        }
        return TRUE;
    }

    function pastDate($field = array()) {
        foreach ($field as $key => $value) {
            $v3 = $value;
            if (strtotime($v3) > strtotime(date('Y-m-d')) || strtotime($v3) == strtotime(date('Y-m-d'))) {
                return TRUE;
            }
            return False;
        }
    }

}

