<?php
/**
 * PostcodeFixture
 *
 */
class PostcodeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'Pcode' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 4, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Locality' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'State' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 4, 'key' => 'primary', 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Comments' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'DeliveryOffice' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'PresortIndicator' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'ParcelZone' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'BSPnumber' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'BSPname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'Category' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 45, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('Pcode', 'Locality', 'State'), 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'Pcode' => 'Lo',
			'Locality' => 'Lorem ipsum dolor sit amet',
			'State' => 'Lo',
			'Comments' => 'Lorem ipsum dolor sit amet',
			'DeliveryOffice' => 'Lorem ipsum dolor sit amet',
			'PresortIndicator' => 'Lorem ipsum dolor sit amet',
			'ParcelZone' => 'Lorem ipsum dolor sit amet',
			'BSPnumber' => 'Lorem ipsum dolor sit amet',
			'BSPname' => 'Lorem ipsum dolor sit amet',
			'Category' => 'Lorem ipsum dolor sit amet'
		),
	);

}
