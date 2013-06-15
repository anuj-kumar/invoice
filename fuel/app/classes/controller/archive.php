<?php

class Controller_Archive extends Controller_Template {

        public function action_index() {
        $data['invoices'] = Model_Invoice::find('all');
        $data["subnav"] = array('view' => 'active');
        $this->template->title = 'Archive &raquo; View';
        $this->template->content = View::forge('archive/view', $data);
    }

    
    public function action_view($sort = NULL) {
        $data['invoices'] = Model_Invoice::find('all', array(
                    'order_by' => $sort, 'rows_limit' => 10,
                        )
        );
        $data["subnav"] = array('view' => 'active');
        $this->template->title = 'Archive &raquo; View';
        $this->template->content = View::forge('archive/view', $data);
    }

    public function action_search() {
        $data["subnav"] = array('search' => 'active');
        $query = Input::get('q');
        $this->template->title = 'Archive &raquo; Search';
        $this->template->content = View::forge('archive/search', $data);
    }

}
