<?php

namespace Fuel\Migrations;

class Create_opponent_season_totals
{
	public function up()
	{
		\DBUtil::create_table('opponent_season_totals', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'season_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'G' => array('type' => 'int', 'null' => true, 'constraint' => 2),
			'MP' => array('type' => 'int', 'null' => true, 'constraint' => 4),
			'FGM' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'FGA' => array('type' => 'int', 'null' => true, 'constraint' => 4),
			'TPM' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'TPA' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'FTM' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'FTA' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'ORB' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'DRB' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'TRB' => array('type' => 'int', 'null' => true, 'constraint' => 4),
			'PF' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'AST' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'TRN' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'BLK' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'STL' => array('type' => 'int', 'null' => true, 'constraint' => 3),
			'PTS' => array('type' => 'int', 'null' => true, 'constraint' => 4),
			'submitted_date' => array('default' => 'current_timestamp()', 'type' => 'timestamp', 'null' => false),
			'updated_date' => array('type' => 'timestamp', 'null' => true),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('opponent_season_totals');
	}
}