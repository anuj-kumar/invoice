<?php

class Controller_System_Log extends Controller_Template {

    public function action_index() {
        Response::redirect('/system_log/users');
    }

    public function action_users() {
        $data['users'] = Model_User::find('all');

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