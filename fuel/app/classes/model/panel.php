
<?php

class Model_Panel extends \Orm\Model {

    protected static $_properties = array(
        'id',
        'name',
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
    protected static $_has_many = array('global_panel_prices', 'local_panel_prices');
    protected static $_many_many = array(
        'disorders' => array(
            'table_through' => 'panels_disorders',
            /*'order_by' => array(
                'panels_disorders.status' => 'ASC'
            ),*/
        )
    );
    protected static $_table_name = 'panels';

}
