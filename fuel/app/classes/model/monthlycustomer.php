
<?php

class Model_Monthlycustomer extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'customer_id',
        'org_name',
        'org_print_name',
        'org_code',
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
    protected static $_belongs_to = array('customer',
            array(
                'key_from' => 'customer_id',
                'model_to' => 'Model_Customer',
                'key_to' => 'id',
            ));
	protected static $_table_name = 'monthly_customers';

}
