<?php

class Model_Invoice extends \Orm\Model {

    protected static $_properties = array(
        'id',
        'customer_id',
        'user_id',
        'date',
        'amount',
        'tax_1',
        'tax_2',
        'tax_3',
        'tax_4',
        'discount_1',
        'discount_2',
        'discount_3',
        'amount_paid',
        'payment_mode',
        'cheque_number',
        'bank_name',
        'bank_branch',
        'bank_city',
        'comment',
        'review_number',
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
    protected static $_belongs_to = array('customer', 'user');
    protected static $_has_many = array(
        'invoices_panels'
    );
    protected static $_table_name = 'invoices';

}
