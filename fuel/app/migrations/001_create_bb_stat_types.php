<?php

namespace Fuel\Migrations;

class Create_bb_stat_types
{
	public function up()
	{
		\DBUtil::create_table('bb_stat_types', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'stat_type_name' => array('type' => 'varchar', 'null' => false, 'constraint' => 162),
			'stat_type_description' => array('type' => 'varchar', 'null' => false, 'constraint' => 240),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('bb_stat_types');
	}
}