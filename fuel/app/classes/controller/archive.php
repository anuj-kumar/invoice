<?php

class Controller_Archive extends Controller_Template {

    public function action_index() {
        $data['invoices'] = Model_Invoice::find('all');
        $data["subnav"] = array('view' => 'active');
        $this->template->title = 'Archive &raquo; View';
        $this->template->content = View::forge('archive/view', $data);
    }

    public function action_view($sort = NULL) {

        $offset = Fuel\Core\Input::get('o');
        $limit = 10;
        $data['invoices'] = Model_Invoice::find('all', array(
                    'order_by' => $sort == 'name' ? 't1.' . $sort : $sort,
                    'related' => array('customer'),
                    'rows_limit' => $limit,
                    'rows_offset' => $offset
                        )
        );
//        $data["subnav"] = array('view' => 'active');
        $uri = Input::uri();
//        echo $offset - $limit;
        $data['prev'] = $uri . ((isset($offset) && $offset > $limit) ? '?o=' . ($offset - $limit) : NULL);
        $data['next'] = $uri . '?o=';
        $data['next'] .= (isset($offset) ? $offset : 0) + $limit ;
        $this->template->title = 'Archive &raquo; View';
        $this->template->content = View::forge('archive/view', $data);
    }

    public function action_search() {

        $data["subnav"] = array('search' => 'active');
        $query = Input::get('q');

        /* $invoices = Fuel\Core\DB::query("SELECT * FROM invoices i LEFT JOIN customers c
         * ON i.customer_id = c.id
         * WHERE c.name like '%" . $query . "%'")->as_object()->execute();
         */

        $data['invoices'] = Model_Invoice::find('all', array(
                    'related' => array('customer'),
                    'where' => array(
                        array('content', 'like', '%' . $query . '%'),
                        'or' => array(
                            array('t1.name', 'like', '%' . $query . '%'),
                        )
                    )
                        )
        );

        $data['query'] = $query;
        $this->template->title = 'Archive &raquo; Search';
        $this->template->content = View::forge('archive/view', $data);
    }

}
