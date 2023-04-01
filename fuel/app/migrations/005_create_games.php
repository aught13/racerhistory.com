<?php

namespace Fuel\Migrations;

class Create_games
{
	public function up()
	{
		\DBUtil::create_table('games', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'season' => array('type' => 'int', 'null' => true, 'constraint' => 4),
			'game_date' => array('type' => 'date', 'null' => true),
			'game_time' => array('type' => 'time', 'null' => true),
			'game_duration' => array('type' => 'time', 'null' => true),
			'game_type_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'opponent_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'place_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'site_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'hrn' => array('type' => 'int', 'null' => false, 'constraint' => 1),
			'post' => array('default' => '0', 'type' => 'tinyint', 'null' => false, 'constraint' => 1),
			'w' => array('default' => '0', 'type' => 'tinyint', 'null' => false, 'constraint' => 1),
			'l' => array('default' => '0', 'type' => 'tinyint', 'null' => false, 'constraint' => 1),
			'pts_mur' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'pts_opp' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'mur_rk' => array('type' => 'int', 'null' => true, 'constraint' => 2),
			'opp_rk' => array('type' => 'int', 'null' => true, 'constraint' => 2),
			'periods' => array('type' => 'int', 'null' => true, 'constraint' => 1),
			'ot' => array('type' => 'int', 'null' => true, 'constraint' => 2),
			'attendance' => array('type' => 'int', 'null' => true, 'constraint' => 11),
			'game_preview' => array('type' => 'mediumtext', 'null' => true, 'constraint' => 16777215),
			'game_recap' => array('type' => 'mediumtext', 'null' => true, 'constraint' => 16777215),
			'game_notes' => array('type' => 'mediumtext', 'null' => true, 'constraint' => 16777215),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('games');
	}
}