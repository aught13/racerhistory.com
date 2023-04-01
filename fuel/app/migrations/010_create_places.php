<?php

namespace Fuel\Migrations;

class Create_places
{
	public function up()
	{
		\DBUtil::create_table('places', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'place_name' => array('type' => 'varchar', 'null' => false, 'constraint' => 162),
			'place_state' => array('type' => 'varchar', 'null' => false, 'constraint' => 162),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('places');
	}
}