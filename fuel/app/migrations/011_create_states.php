<?php

namespace Fuel\Migrations;

class Create_states
{
	public function up()
	{
		\DBUtil::create_table('states', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'primary key' => true),
			'name' => array('constraint' => 30, 'type' => 'varchar'),
			'created_at' => array('type' => 'datetime'),
			'updated_at' => array('type' => 'datetime'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('states');
	}
}