
<?php

class Model_Access_Right extends \Orm\Model {

    protected static $_properties = array(
        'id',
        'user_id',
        'invoice_single',
        'invoice_monthly',
        'invoice_monthly_new',
        'invoice_monthly_details',
        'panel_global',
        'panel_local',
        'archive_single',
        'archive_monthly',
        'user_list',
        'user_create',
        'system_log',
        'created_at',
        'updated_at'
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
    protected static $_belongs_to = array(
        'user' => array(
            'key_from' => 'user_id',
            'key_to' => 'id',
            'cascade_save' => true,
            'cascade_delete' => true,
        )
    );

    protected static $_table_name = 'access_rights';

}
