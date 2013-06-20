<?php

class Controller_Invoice extends Controller_Base {

    public $template = 'template_invoice';

    public function action_index() {
        Response::redirect('/invoice/single');
    }

    public function action_single() {
        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'Invoice | Single';
        $this->template->content = View::forge('invoice/single', $data);
    }

    public function action_submit_single() {
//        print_r(Fuel\Core\Input::post());
        $time = date('Y-m-d H:i:s');
        $customer = Model_Customer::forge(array(
                    'first_name' => Input::post('f_name'),
                    'last_name' => Input::post('l_name'),
                    'address_line_1' => Input::post('addr_1'),
                    'address_line_2' => Input::post('addr_2'),
                    'address_line_3' => Input::post('addr_3'),
                    'city' => Input::post('city'),
                    'state' => Input::post('state'),
                    'pincode' => Input::post('pin'),
                    'phone' => Input::post('tele'),
                    'email' => Input::post('email'),
                    'type' => 'single',
        ));
        $val = $customer->save();

        print_r($customer);

        if ($val == 1) {
            Response::redirect('/invoice/invoice_content');
        } else {
            Session::set_flash('error', 'Error in Form');
            return Response::forge(View::forge('invoice/single'));
        }
    }

    public function action_monthly() {
        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'Invoice | Monthly';
        $this->template->content = View::forge('invoice/monthly', $data);
    }

    public function action_invoice_content() {
       $data['panels']= Model_Panel::find('all');
       $this->template->title = 'Invoice | Main Content';
       $this->template->content = View::forge('invoice/invoice', $data);
       
    }

}