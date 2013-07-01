<?php

class Model_Invoices_Panel extends \Orm\Model {

    protected static $_properties = array(
        'invoice_id',
        'panel_id',
        'panel_quantity',
        'panel_price',
        'panel_name'
    );

    protected static $_table_name = 'invoices_panels';

    protected static $_belongs_to = array('invoice', 'panel');

    protected static $_primary_key = array('invoice_id', 'panel_id');
}


?>
