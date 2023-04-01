<?php

namespace Fuel\Migrations;

class Create_users_permissions
{
	public function up()
	{
		\DBUtil::create_table('users_permissions', array(
			'id' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'area' => array('type' => 'varchar', 'null' => false, 'constraint' => 25),
			'permission' => array('type' => 'varchar', 'null' => false, 'constraint' => 25),
			'description' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'actions' => array('type' => 'text', 'null' => true),
			'user_id' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 11),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('users_permissions');
	}
}