<?php

class Controller_System_Log extends Controller_Template {

    public function action_users() {
        $offset = Input::get('o');
        $limit = 10;
        $data['users'] = Model_User::find('all', array(
                    'related' => 'access_right',
                    'rows_limit' => $limit,
                    'rows_offset' => $offset,
        ));

        $uri = Input::uri();
        $count = count($data['users']);

        $data['prev'] = $uri . ((isset($offset) && $offset > $limit) ? '?o=' . ($offset - $limit) : NULL);
        $data['next'] = $uri . '?o=';
        $data['next'] .= (isset($offset) ? ($offset + $offset < $count ? $limit : 0) : $limit);

        $data["subnav"] = array('users' => 'active');
        $this->template->title = 'System log | Users';
        $this->template->content = View::forge('system/log/users', $data);
    }

    public function action_invoices() {
        $data["subnav"] = array('invoices' => 'active');
        $this->template->title = 'System log &raquo; Invoices';
        $this->template->content = View::forge('system/log/invoices', $data);
    }

}
