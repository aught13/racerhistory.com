<?php

namespace Fuel\Migrations;

class Create_users_roles
{
	public function up()
	{
		\DBUtil::create_table('users_roles', array(
			'id' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'name' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'filter' => array('default' => '', 'type' => 'enum', 'null' => false, 'constraint' => '"","A","D","R"'),
			'user_id' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 11),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('users_roles');
	}
}