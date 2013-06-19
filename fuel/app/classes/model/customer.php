
<?php

class Model_Customer extends \Orm\Model {

    protected static $_properties = array(
        'id',
        'first_name',
        'last_name',
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'city_id',
        'state_id',
        'pincode',
        'phone',
        'email',
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
        array(
            'city' => array(
                'key_from' => 'id',
                'key_to' => 'city_id',
                'cascade_save' => true,
                'cascade_delete' => false,
            )
        ),
        array(
            'state' => array(
                'key_from' => 'id',
                'key_to' => 'state_id',
                'cascade_save' => true,
                'cascade_delete' => false,
            )
        )
    );
    protected static $_has_many = array(
        'invoices', array(
            'key_from' => 'id',
            'key_to' => 'customer_id',
        )
    );
    protected static $_table_name = 'customers';

}
