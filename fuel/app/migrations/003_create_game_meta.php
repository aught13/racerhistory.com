<?php

namespace Fuel\Migrations;

class Create_game_meta
{
	public function up()
	{
		\DBUtil::create_table('game_meta', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'game_id' => array('type' => 'int', 'null' => true, 'constraint' => 11, 'unsigned' => true),
			'key' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'value' => array('type' => 'mediumtext', 'null' => true, 'constraint' => 16777215),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('game_meta');
	}
}