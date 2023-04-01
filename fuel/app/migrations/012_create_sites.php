<?php

namespace Fuel\Migrations;

class Create_sites
{
	public function up()
	{
		\DBUtil::create_table('sites', array(
			'id' => array('type' => 'int', 'null' => false, 'auto_increment' => true, 'constraint' => 11, 'unsigned' => true),
			'place_id' => array('type' => 'int', 'null' => false, 'constraint' => 11, 'unsigned' => true),
			'site_name' => array('type' => 'varchar', 'null' => false, 'constraint' => 162),
			'capacity' => array('type' => 'int', 'null' => true, 'constraint' => 11),
			'site_image' => array('type' => 'varchar', 'null' => true, 'constraint' => 162),
			'site_info' => array('type' => 'mediumtext', 'null' => true, 'constraint' => 16777215),
			'created_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
			'updated_at' => array('constraint' => '11', 'null' => false, 'type' => 'int'),
		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('sites');
	}
}