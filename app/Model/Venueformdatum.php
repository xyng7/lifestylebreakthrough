<?php
App::uses('AppModel', 'Model');
/**
 * Venueformdatum Model
 *
 */
class Venueformdatum extends AppModel {
    
    var $displayField = 'venue';
    public $validate = array(
        //first name field
        'venue' => array(
            //rule 1 - cannot be empty
            'Rule-1' => array(
                'rule' => array('notempty'),
                'message' => 'Enter a venue'),
            
            ),
        );

}
