<?php

class Controller_System_Log extends Controller_Template {

    public function action_invoices() {
        $data["subnav"] = array('invoices' => 'active');
        $this->template->title = 'System log &raquo; Invoices';
        $this->template->content = View::forge('system/log/invoices', $data);
    }

}
