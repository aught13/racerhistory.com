<?php
class Model_Users_Session extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'id',
		'client_id',
		'redirect_uri',
		'type_id',
		'type',
		'code',
		'access_token',
		'stage',
		'first_requested',
		'last_updated',
		'limited_access',
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
		$val->add_field('client_id', 'Client Id', 'required|max_length[32]');
		$val->add_field('redirect_uri', 'Redirect Uri', 'required|max_length[255]');
		$val->add_field('type_id', 'Type Id', 'required|max_length[64]');
		$val->add_field('type', 'Type', 'required|max_length[user,auto]');
		$val->add_field('code', 'Code', 'required|max_length[]');
		$val->add_field('access_token', 'Access Token', 'required|max_length[50]');
		$val->add_field('stage', 'Stage', 'required|max_length[request,granted]');
		$val->add_field('first_requested', 'First Requested', 'required|valid_string[numeric]');
		$val->add_field('last_updated', 'Last Updated', 'required|valid_string[numeric]');
		$val->add_field('limited_access', 'Limited Access', 'required|valid_string[numeric]');

		return $val;
	}

}
