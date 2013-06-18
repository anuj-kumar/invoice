<?php

class Controller_Home extends Controller_Base {

    public function action_index() {
        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'Invoice | Single';
        $this->template->content = View::forge('invoice/single', $data);
    }
}