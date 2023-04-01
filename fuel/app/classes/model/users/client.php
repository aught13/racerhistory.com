<?php
class Model_Users_Client extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'id',
		'name',
		'client_id',
		'client_secret',
		'redirect_uri',
		'auto_approve',
		'autonomous',
		'status',
		'suspended',
		'notes',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('id', 'Id', 'required|valid_string[numeric]');
		$val->add_field('name', 'Name', 'required|max_length[32]');
		$val->add_field('client_id', 'Client Id', 'required|max_length[32]');
		$val->add_field('client_secret', 'Client Secret', 'required|max_length[32]');
		$val->add_field('redirect_uri', 'Redirect Uri', 'required|max_length[255]');
		$val->add_field('auto_approve', 'Auto Approve', 'required|valid_string[numeric]');
		$val->add_field('autonomous', 'Autonomous', 'required|valid_string[numeric]');
		$val->add_field('status', 'Status', 'required|max_length[development,pending,approved,rejected]');
		$val->add_field('suspended', 'Suspended', 'required|valid_string[numeric]');
		$val->add_field('notes', 'Notes', 'required|max_length[255]');

		return $val;
	}

}
