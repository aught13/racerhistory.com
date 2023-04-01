<?php

namespace Fuel\Migrations;

class Create_teams
{
	public function up()
	{
		\DBUtil::create_table('teams', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'team_name' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'team_description' => array('type' => 'varchar', 'null' => true, 'constraint' => 240),
			'abbr' => array('type' => 'varchar', 'null' => false, 'constraint' => 5),
			'gender' => array('type' => 'varchar', 'null' => false, 'constraint' => 1),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('teams');
	}
}