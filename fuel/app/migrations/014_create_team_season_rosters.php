<?php

namespace Fuel\Migrations;

class Create_team_season_rosters
{
	public function up()
	{
		\DBUtil::create_table('team_season_rosters', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'team_season_id' => array('type' => 'int', 'null' => false, 'constraint' => 11, 'unsigned' => true),
			'person_id' => array('type' => 'int', 'null' => false, 'constraint' => 11, 'unsigned' => true),
			'roster_year' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'roster_number' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'roster_position' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'roster_height' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'roster_weight' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('team_season_rosters');
	}
}