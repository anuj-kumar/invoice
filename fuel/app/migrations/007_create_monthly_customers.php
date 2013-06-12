<?php

namespace Fuel\Migrations;

class Create_monthly_customers
{
	public function up()
	{
		\DBUtil::create_table('monthly_customers', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'primary key' => true),
			'customer_id' => array('constraint' => 11, 'type' => 'int'),
			'contract_file' => array('constraint' => 50, 'type' => 'varchar'),
			'contract_discount' => array('constraint' => '2,2', 'type' => 'decimal'),
			'outstanding' => array('constraint' => '8,2', 'type' => 'decimal'),
			'duedate' => array('type' => 'date'),
			'created_at' => array('type' => 'datetime'),
			'updated_at' => array('type' => 'datetime'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('monthly_customers');
	}
}