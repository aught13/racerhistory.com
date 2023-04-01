<?php

namespace Fuel\Migrations;

class Create_people
{
	public function up()
	{
		\DBUtil::create_table('people', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'first' => array('type' => 'varchar', 'null' => true, 'constraint' => 30),
			'last' => array('type' => 'varchar', 'null' => true, 'constraint' => 30),
			'full' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'display' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'birth' => array('type' => 'date', 'null' => true),
			'death' => array('type' => 'date', 'null' => true),
			'person_image' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('people');
	}
}