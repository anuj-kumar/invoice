<?php

class Controller_Invoice extends Controller_Base {

    public $template= 'template_invoice';

    public function action_index() {
        Response::redirect('/invoice/single');
    }
    
    public function action_single() {
        $data['panels'] = Model_Panel::find('all');
        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'Invoice | Single';
        $this->template->content = View::forge('invoice/single', $data);
    }
    public function action_monthly() {
        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'Invoice | Monthly';
        $this->template->content = View::forge('invoice/monthly', $data);
    }
}