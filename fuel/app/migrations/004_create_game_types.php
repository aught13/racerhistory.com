<?php

namespace Fuel\Migrations;

class Create_game_types
{
	public function up()
	{
		\DBUtil::create_table('game_types', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'game_type_name' => array('type' => 'varchar', 'null' => false, 'constraint' => 162),
			'post' => array('default' => '0', 'type' => 'tinyint', 'null' => false, 'constraint' => 1),
			'conf' => array('default' => '0', 'type' => 'tinyint', 'null' => false, 'constraint' => 1),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('game_types');
	}
}