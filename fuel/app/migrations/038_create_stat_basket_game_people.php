<?php

namespace Fuel\Migrations;

class Create_stat_basket_game_people
{
	public function up()
	{
		\DBUtil::create_table('stat_basket_game_people', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'person_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'game_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'period' => array('type' => 'varchar', 'null' => true, 'constraint' => 10),
			'GP' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'GS' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'MIN' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'FGM' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'FGA' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'TPM' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'TPA' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'FTM' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'FTA' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'ORB' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'DRB' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'RB' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'AST' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'STL' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'BS' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'BD' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'TRN' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'PF' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'TF' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'FD' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'PTS' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('stat_basket_game_people');
	}
}