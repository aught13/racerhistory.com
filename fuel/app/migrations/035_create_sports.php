<?php

namespace Fuel\Migrations;

class Create_sports
{
	public function up()
	{
		\DBUtil::create_table('sports', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'sport_name' => array('type' => 'varchar', 'null' => false, 'constraint' => 162),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));

		\DB::query('CREATE UNIQUE INDEX name ON sports(`sport_name`)')->execute();
	}

	public function down()
	{
		\DB::query('DROP INDEX name ON sports')->execute();

		\DBUtil::drop_table('sports');
	}
}