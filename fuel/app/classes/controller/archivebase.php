<?php

class Controller_ArchiveBase extends Controller_Template {

    public static function get_view_results($type, $offset, $limit, $sort, $order) {

        $query = Input::get('q');

        if (isset($query)) {
            Session::set('query', $query);
        } else {
            $query = Session::get('query');
        }

        if ($sort == 'first_name' || $sort == 'last_name' || $sort == 'type') {
            $sort = 't1.' . $sort;
        } else if ($sort == 'user') {
            $sort = 't2.name';
        }
        if ($type == "single") {
            $invoices = Model_Invoice::find('all', array(
                        'where' => array(
                            array('t1.type', 'like', '%' . $type . '%'),
                            array(
                                array('fp_number', 'like', '%' . $query . '%'),
                                'or' => array(
                                    array('t1.first_name', 'like', '%' . $query . '%'),
                                    'or' => array(
                                        array('t1.last_name', 'like', '%' . $query . '%'),
                                    )
                                )
                            )
                        ),
                        'order_by' => array(
                            $sort => $order
                        ),
                        'related' => array('customer', 'user'),
                        'rows_limit' => $limit,
                        'rows_offset' => $offset
                            )
            );
        } else if ($type == "monthly") {
            $invoices = Model_Invoice::find('all', array(
                        'where' => array(
                            array('t1.type', 'like', '%' . $type . '%'),
                            array(
                                array('fp_number', 'like', '%' . $query . '%'),
                                'or' => array(
                                    array('t1.first_name', 'like', '%' . $query . '%'),
                                    'or' => array(
                                        array('t1.last_name', 'like', '%' . $query . '%'),
                                    )
                                )
                            )
                        ),
                        'order_by' => array(
                            $sort => $order
                        ),
                        'related' => array('monthlycustomer', 'user'),
                        'rows_limit' => $limit,
                        'rows_offset' => $offset
                            )
            );
        }
        return $invoices;
    }

}

?>
