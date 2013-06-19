
<?php

class Model_City extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'name',
		'state_id',
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
    protected static $_has_one = array(
        'customer' => array(
            'key_from' => 'id',
            'key_to' => 'city_id',
            'cascade_delete' => false,
        )
    );
    
    protected static $_belongs_to = array(
        'state' => array(
            'key_from' => 'state_id',
            'key_to' => 'id'
        )
    );
    
    protected static $_table_name = 'cities';

}
