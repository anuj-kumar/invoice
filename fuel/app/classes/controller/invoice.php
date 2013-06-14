<?php

class Controller_Invoice extends Controller_Base {

    public function action_index() {
        Response::redirect('index.php/invoice/single');
    }
    public function action_single() {
        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'Invoice | Single';
        $this->template->content = View::forge('invoice/single', $data);
    }
}