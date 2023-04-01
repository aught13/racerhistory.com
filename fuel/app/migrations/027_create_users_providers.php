<?php

namespace Fuel\Migrations;

class Create_users_providers
{
	public function up()
	{
		\DBUtil::create_table('users_providers', array(
			'id' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'parent_id' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 11),
			'provider' => array('type' => 'varchar', 'null' => false, 'constraint' => 50),
			'uid' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'secret' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'access_token' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'expires' => array('default' => '0', 'type' => 'int', 'null' => true, 'constraint' => 12),
			'refresh_token' => array('type' => 'varchar', 'null' => true, 'constraint' => 255),
			'user_id' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 11),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		));
	}

	public function down()
	{
		\DBUtil::drop_table('users_providers');
	}
}