<?php

class Controller_Archive extends Controller_Template {

    public function action_view($sort = NULL) {
        $data['invoices'] = Model_Invoice::find('all', array(
                    'order_by' => $sort,
                        )
        );
        $data["subnav"] = array('view' => 'active');
        $this->template->title = 'Archive &raquo; View';
        $this->template->content = View::forge('archive/view', $data);
    }

    public function action_search() {
        $data["subnav"] = array('search' => 'active');
        $query = Input::get('q');
        $invoices = Fuel\Core\DB::query("SELECT * FROM invoices i LEFT JOIN customers c
            ON i.customer_id = c.id
            WHERE c.name like '%" . $query . "%'")->as_object()->execute();
        $data['invoices'] = $invoices;
        /* = Model_Invoice::find('all', array(
          'where' => array(
          //array('content', 'like', '%' . $query . '%'),
          array('date', 'like', '%' . $query . '%'),
          )
          )
          ); */
//        print_r($data['invoices']);
        
        $data['query'] = $query;
        $this->template->title = 'Archive &raquo; Search';
        $this->template->content = View::forge('archive/view', $data);
    }

}
