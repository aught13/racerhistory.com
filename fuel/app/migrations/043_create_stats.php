<?php

namespace Fuel\Migrations;

class Create_stats
{
	public function up()
	{
		\DBUtil::create_table('stats', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'sport_id' => array('type' => 'int', 'null' => false, 'constraint' => 11, 'unsigned' => true),
			'stat_name' => array('type' => 'varchar', 'null' => false, 'constraint' => 162),
			'stat_table' => array('type' => 'varchar', 'null' => false, 'constraint' => 162),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('stats');
	}
}