<?php
class Model_Users_Role_Permission extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'id',
		'role_id',
		'perms_id',
		'actions',
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
		$val->add_field('role_id', 'Role Id', 'required|valid_string[numeric]');
		$val->add_field('perms_id', 'Perms Id', 'required|valid_string[numeric]');
		$val->add_field('actions', 'Actions', 'required|max_length[]');

		return $val;
	}

}
