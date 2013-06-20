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
    
    public function action_submit_single() {
//        print_r(Fuel\Core\Input::post());
        $customer = Model_Customer::forge(array(
            'first_name' => Input::post('first_name'),
            'last_name' => Input::post('last_name'),
            'address_line_1' => Input::post('addr_1'),
            'address_line_2' => Input::post('addr_2'),
            'address_line_3' => Input::post('addr_3'),
            'city_id' => Input::post('city'),
            'state_id' => Input::post('state'),
            
        ));
        
        $this->template->title = 'Invoice | Single';
        $data = new stdClass();
        $this->template->content = View::forge('invoice/single', $data);
        
    }
    public function action_monthly() {
        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'Invoice | Monthly';
        $this->template->content = View::forge('invoice/monthly', $data);
    }
}