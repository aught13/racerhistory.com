<?php

namespace Fuel\Migrations;

class Create_opponents
{
	public function up()
	{
		\DBUtil::create_table('opponents', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'opponent_name' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'opponent_mascot' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'opponent_current' => array('type' => 'int', 'null' => true, 'constraint' => 15, 'unsigned' => true),
			'opponent_short' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'opponent_abbr' => array('type' => 'varchar', 'null' => true, 'constraint' => 6),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('opponents');
	}
}