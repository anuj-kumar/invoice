
<?php

class Model_Monthly_Customer extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'customer_id',
		'contract_file',
		'contract_discount',
		'outstanding',
		'duedate',
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
        'customer'
    );
	protected static $_table_name = 'monthly_customers';

}
