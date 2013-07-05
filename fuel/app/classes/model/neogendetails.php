
<?php

class Model_Neogendetails extends \Orm\Model {

    protected static $_properties = array(
        'id',
        'invoice_no_single',
        'invoice_no_monthly',
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'city',
        'state',
        'country',
        'phone_number',
        'fax_number',
        'email',
        'website',
        'pan',
        'billing_period',
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
    protected static $_table_name = 'neogen_details';

}
