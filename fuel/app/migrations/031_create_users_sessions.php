<?php

namespace Fuel\Migrations;

class Create_users_sessions
{
	public function up()
	{
		\DBUtil::create_table('users_sessions', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'client_id' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 32),
			'redirect_uri' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 255),
			'type_id' => array('type' => 'varchar', 'null' => false, 'constraint' => 64),
			'type' => array('default' => 'user', 'type' => 'enum', 'null' => false, 'constraint' => '"user","auto"'),
			'code' => array('type' => 'text', 'null' => false),
			'access_token' => array('default' => '', 'type' => 'varchar', 'null' => false, 'constraint' => 50),
			'stage' => array('default' => 'request', 'type' => 'enum', 'null' => false, 'constraint' => '"request","granted"'),
			'first_requested' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'last_updated' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'limited_access' => array('default' => '0', 'type' => 'tinyint', 'null' => false, 'constraint' => 1),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users_sessions');
	}
}