<?php

namespace Fuel\Migrations;

class Create_invoices
{
	public function up()
	{
		\DBUtil::create_table('invoices', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'primary key' => true),
			'content' => array('constraint' => 50, 'type' => 'varchar'),
			'date' => array('type' => 'date'),
			'timestamp' => array('type' => 'datetime'),
			'amount' => array('type' => 'float'),
			'tax_1' => array('constraint' => '3,2', 'type' => 'float'),
			'tax_2' => array('constraint' => '3,2', 'type' => 'float'),
			'tax_3' => array('constraint' => '3,2', 'type' => 'float'),
			'tax_4' => array('constraint' => '3,2', 'type' => 'float'),
			'discount_1' => array('constraint' => '2,2', 'type' => 'float'),
			'discount_2' => array('constraint' => '2,2', 'type' => 'float'),
			'discount_3' => array('constraint' => '2,2', 'type' => 'float'),
			'comment' => array('type' => 'text'),
			'review_number' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('type' => 'datetime'),
			'updated_at' => array('type' => 'datetime'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('invoices');
	}
}