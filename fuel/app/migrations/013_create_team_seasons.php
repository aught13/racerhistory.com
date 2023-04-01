<?php

namespace Fuel\Migrations;

class Create_team_seasons
{
	public function up()
	{
		\DBUtil::create_table('team_seasons', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'team_id' => array('type' => 'int', 'null' => false, 'constraint' => 11, 'unsigned' => true),
			'season_id' => array('type' => 'int', 'null' => false, 'constraint' => 11, 'unsigned' => true),
			'semester' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'league_finish' => array('type' => 'varchar', 'null' => true, 'constraint' => 240),
			'league_torunament_finish' => array('type' => 'varchar', 'null' => true, 'constraint' => 240),
			'last_post_game' => array('type' => 'varchar', 'null' => true, 'constraint' => 240),
			'team_season_notes' => array('type' => 'varchar', 'null' => true, 'constraint' => 240),
			'team_season_image' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'team_season_preview' => array('type' => 'mediumtext', 'null' => true, 'constraint' => 16777215),
			'team_season_recap' => array('type' => 'mediumtext', 'null' => true, 'constraint' => 16777215),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('team_seasons');
	}
}