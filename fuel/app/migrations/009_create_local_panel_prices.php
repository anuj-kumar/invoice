<?php

namespace Fuel\Migrations;

class Create_local_panel_prices
{
	public function up()
	{
		\DBUtil::create_table('local_panel_prices', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true, 'primary key' => true),
			'monthly_customer_id' => array('constraint' => 11, 'type' => 'int'),
			'vol_low' => array('constraint' => 5, 'type' => 'int'),
			'vol_high' => array('constraint' => 5, 'type' => 'int'),
			'panel_id' => array('constraint' => 11, 'type' => 'int'),
			'price' => array('constraint' => '8,2', 'type' => 'float'),
			'created_at' => array('type' => 'datetime'),
			'updated_at' => array('type' => 'datetime'),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('local_panel_prices');
	}
}