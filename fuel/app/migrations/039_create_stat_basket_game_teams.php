<?php

namespace Fuel\Migrations;

class Create_stat_basket_game_teams
{
	public function up()
	{
		\DBUtil::create_table('stat_basket_game_teams', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'game_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'ORB' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'DRB' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'RB' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'TRN' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'TF' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'PTS' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('stat_basket_game_teams');
	}
}