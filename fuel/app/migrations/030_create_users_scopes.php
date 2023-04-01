<?php

namespace Fuel\Migrations;

class Create_users_scopes
{
	public function up()
	{
		\DBUtil::create_table('users_scopes', array(
			'id' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'scope' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 64),
			'name' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 64),
			'description' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 255),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('users_scopes');
	}
}