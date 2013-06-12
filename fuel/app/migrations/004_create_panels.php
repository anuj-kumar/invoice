<?php

namespace Fuel\Migrations;

class Create_panels
{
	public function up()
	{
		\DBUtil::create_table('panels', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'primery key' => true),
			'name' => array('constraint' => 20, 'type' => 'varchar'),
			'created_at' => array('type' => 'datetime'),
			'updated_at' => array('type' => 'datetime'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('panels');
	}
}