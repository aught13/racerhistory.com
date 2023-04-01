<?php
class Model_Users_Provider extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'id',
		'parent_id',
		'provider',
		'uid',
		'secret',
		'access_token',
		'expires',
		'refresh_token',
		'user_id',
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
		$val->add_field('parent_id', 'Parent Id', 'required|valid_string[numeric]');
		$val->add_field('provider', 'Provider', 'required|max_length[50]');
		$val->add_field('uid', 'Uid', 'required|max_length[255]');
		$val->add_field('secret', 'Secret', 'required|max_length[255]');
		$val->add_field('access_token', 'Access Token', 'required|max_length[255]');
		$val->add_field('expires', 'Expires', 'required|valid_string[numeric]');
		$val->add_field('refresh_token', 'Refresh Token', 'required|max_length[255]');
		$val->add_field('user_id', 'User Id', 'required|valid_string[numeric]');

		return $val;
	}

}
