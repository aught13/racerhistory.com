<?php

namespace Fuel\Migrations;

class Create_seasons
{
	public function up()
	{
		\DBUtil::create_table('seasons', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'start' => array('type' => 'year', 'null' => false),
			'end' => array('type' => 'year', 'null' => false),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('seasons');
	}
}