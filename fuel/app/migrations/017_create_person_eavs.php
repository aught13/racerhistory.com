<?php

namespace Fuel\Migrations;

class Create_person_eavs
{
	public function up()
	{
		\DBUtil::create_table('person_eavs', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11),
			'parent_id' => array('type' => 'int', 'null' => false, 'constraint' => 11),
			'key' => array('type' => 'varchar', 'null' => false, 'constraint' => 20),
			'value' => array('type' => 'varchar', 'null' => false, 'constraint' => 162),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('person_eavs');
	}
}