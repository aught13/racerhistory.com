<?php

namespace Fuel\Migrations;

class Create_users_sessionscopes
{
	public function up()
	{
		\DBUtil::create_table('users_sessionscopes', array(
			'id' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'session_id' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'access_token' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 50),
			'scope' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 64),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('users_sessionscopes');
	}
}