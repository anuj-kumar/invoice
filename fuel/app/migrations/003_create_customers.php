<?php

namespace Fuel\Migrations;

class Create_customers
{
	public function up()
	{
		\DBUtil::create_table('customers', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'primery key' => true),
			'name' => array('constraint' => 50, 'type' => 'varchar'),
			'address_line_1' => array('constraint' => 50, 'type' => 'varchar'),
			'address_line_2' => array('constraint' => 50, 'type' => 'varchar'),
			'address_line_3' => array('constraint' => 50, 'type' => 'varchar'),
			'city_id' => array('constraint' => 11, 'type' => 'int'),
			'state_id' => array('constraint' => 11, 'type' => 'int'),
			'pincode' => array('constraint' => 6, 'type' => 'int'),
			'phone' => array('constraint' => 11, 'type' => 'int'),
			'email' => array('constraint' => 50, 'type' => 'varchar'),
			'created_at' => array('type' => 'datetime'),
			'updated_at' => array('type' => 'datetime'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('customers');
	}
}