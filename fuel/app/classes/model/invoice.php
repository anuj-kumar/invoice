
<?php

class Model_Invoice extends \Orm\Model {

    protected static $_properties = array(
        'id',
        'costumer_id',
        'content',
        'date',
        'timestamp',
        'amount',
        'tax_1',
        'tax_2',
        'tax_3',
        'tax_4',
        'discount_1',
        'discount_2',
        'discount_3',
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
    protected static $_belongs_to = array('customers',
        array(
            'key_from' => 'costumer_id',
            'key_to' => 'id',
    ));
    protected static $_many_many = array(
        'panels' => array(
            'table_through' => 'invoices_panels',
            'order_by' => array(
                'invoices_panels.invoices_id' => 'ASC'
            ),
        )
    );
    protected static $_table_name = 'invoices';

}
