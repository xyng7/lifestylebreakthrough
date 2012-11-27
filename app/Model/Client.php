<?php

App::uses('AppModel', 'Model');

/**
 * Client Model
 *
 * @property User $User
 */
class Client extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    var $displayField = 'first_name';
    public $validate = array(
        //first name field
        'first_name' => array(
            //rule 1 - cannot be empty
            'firstnameRule-1' => array(
                'rule' => array('notempty'),
                'message' => 'Enter First Name'),
            //rule 2 - must be in alphabet
            'firstnameRule-2' => array(
                'rule' => '/[A-Za-z]/',
                'message' => 'Invalid Name',
            ),
        ),
        //last name field
        'last_name' => array(
            //rule 1 - cannot be empty
            'lastnameRule-1' => array(
                'rule' => array('notempty'),
                'message' => 'Enter Last Name'),
            //rule 2 - must be in alphabet
            'lastnameRule-2' => array(
                'rule' => '/[A-Za-z]/',
                'message' => 'Invalid Name',
            ),
        ),
        //email field
        'email' => array(
            //rule 1 - cannot be empty
            'emailRule-1' => array(
                'rule' => array('notempty'),
                'message' => 'Enter Email'
            ),
            //rule 2 - must be in format
            'emailRule-2' => array(
                'rule' => 'email',
                'message' => 'Invalid Email',
            ),
            'unique' => array(
                'rule' => array('isUnique'),
                'message' => 'Email must be unique')
        ),
        //dob field
        'dob' => array(
            'rule' => 'date',
        ),
                //phone field
        'phone' => array(
            //rule 1 - cannot be empty
            'phoneRule-1' => array(
                'rule' => array('notempty'),
                'message' => 'Enter Phone Number'
            ),
            //rule 2 - must be 10 digit start with '02,03,04,07,08' 
            'phoneRule-2' => array(
                'rule' => '/^(?:\+?61|0)[2-478](?:[ -]?[0-9]){8}$/',
                'message' => '10-digit required starting with either 02 to 04 and 07 to 08, e.g. 0212345678',
                'last' => true, // Stop validation after this rule
            ),
        ),
        //mobile phone
        'mobile' => array(
            //rule 1 - cannot be empty
            'mobileRule-1' => array(
                'rule' => array('notempty'),
                'message' => 'Enter Phone Number'
            ),
            //rule 2 - must be 10 digit start with '04' 
            'mobileRule-2' => array(
                'rule' => '/^(?:\+?61|0)4\)?(?:[ -]?[0-9]){7}[0-9]$/',
                'message' => '10-digit required starting with 04, e.g. 0412345678',
                'last' => true,
            ),
        ),
        //address field
        'address' => array(
            //rule 1 - cannot be empty
            'addressRule-1' => array(
                'rule' => array('notempty'),
                'message' => 'Enter Address'
            ),
            //rule 2 - must be in alphanumeric
            'addressRule-2' => array(
                'rule' => '[\w\s]',
                'message' => "Invalid Address"
            ),
        ),
        //suburb field
        'suburb' => array(
            //rule 1 - cannot be empty
            'suburbRule-1' => array(
                'rule' => array('notempty'),
                'message' => 'Enter Suburb'
            ),
            //rule 2 - must be alphabet
            'suburbRule-2' => array(
                'rule' => '/[A-Za-z]/',
                'message' => 'Invaid Suburb'
               // 'last' => true,
            ),
        ),
        //postal field
        'postal' => array(
            //rule 1 - cannot be empty
            'postalRule-1' => array(
                'rule' => array('notempty'),
                'message' => 'Enter Postal'
            ),
            //rule 2 - must be 4 digit
            'postalRule-2' => array(
                'rule' => '/^[0-9]{4}$/i',
                'message' => '4-digit Required'
               // 'last' => true,
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
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    public $hasMany = array(
		'Program' => array(
			'className' => 'Program',
			'foreignKey' => 'client_id',
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

}
