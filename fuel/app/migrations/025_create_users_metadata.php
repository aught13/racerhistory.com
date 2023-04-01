<?php

namespace Fuel\Migrations;

class Create_users_metadata
{
	public function up()
	{
		\DBUtil::create_table('users_metadata', array(
			'id' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'parent_id' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 11),
			'key' => array('type' => 'varchar', 'null' => false, 'constraint' => 20),
			'value' => array('type' => 'varchar', 'null' => false, 'constraint' => 100),
			'user_id' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 11),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('users_metadata');
	}
}