<?php

class Controller_ArchiveBase extends Controller_Template {

    public static function get_view_results($offset, $limit, $sort, $order) {

        $query = Input::get('q');

        if (isset($query)) {
            Session::set('query', $query);
        } else {
            $query = Session::get('query');
        }

        return Model_Invoice::find('all', array(
                    'where' => array(
                        array('content', 'like', '%' . $query . '%'),
                        'or' => array(
                            array('t1.first_name', 'like', '%' . $query . '%'),
                            'or' => array(
                                array('t1.last_name', 'like', '%' . $query . '%'),
                            )
                        )
                    ),
                    'order_by' => array(
                        (($sort == 'first_name' || $sort == 'last_name' || $sort == 'type') ? 't1.' . $sort : $sort) => $order
                    ),
                    'related' => array('customer'),
                    'rows_limit' => $limit,
                    'rows_offset' => $offset
                        )
        );
    }

}

?>
