<?php

namespace Fuel\Migrations;

class Create_users
{
	public function up()
	{
		\DBUtil::create_table('users', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'username' => array('type' => 'varchar', 'null' => false, 'constraint' => 50),
			'password' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'group_id' => array('type' => 'int', 'null' => true, 'constraint' => 11),
			'email' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'last_login' => array('type' => 'varchar', 'null' => false, 'constraint' => 25),
			'previous_login' => array('default' => '0', 'type' => 'varchar', 'null' => false, 'constraint' => 25),
			'login_hash' => array('type' => 'varchar', 'null' => false, 'constraint' => 255),
			'user_id' => array('default' => '0', 'type' => 'int', 'null' => false, 'constraint' => 11),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		));

		\DB::query('CREATE UNIQUE INDEX id ON users(`id`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX id ON users')->execute();

		\DBUtil::drop_table('users');
	}
}