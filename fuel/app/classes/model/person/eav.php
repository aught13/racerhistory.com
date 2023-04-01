<?php
class Model_Person_Eav extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'id',
		'parent_id',
		'key',
		'value',
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
		$val->add_field('key', 'Key', 'required|max_length[20]');
		$val->add_field('value', 'Value', 'required|max_length[162]');

		return $val;
	}

}
