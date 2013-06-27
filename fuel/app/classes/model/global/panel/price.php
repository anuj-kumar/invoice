
<?php

class Model_Global_Panel_Price extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'vol_low',
		'vol_high',
		'panel_id',
		'price',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);
    
    protected static $_belongs_to = array('panel');
	protected static $_table_name = 'global_panel_prices';

}
