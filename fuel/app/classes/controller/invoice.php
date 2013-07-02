<?php

class Controller_Invoice extends Controller_Invoicebase {

    public $template = 'template_invoice';

    public function action_index() {
        Response::redirect('/invoice/single');
    }

    public function action_single() {
        $data['states'] = Model_State::find('all');
        $panels = Model_Panel::find('all', array(
                    'related' => array('global_panel_prices'),
        ));

        $data['panels'] = $panels;
        $data['invoice_id'] = 1;
        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'Invoice | Single';
        $this->template->data = 'Single Invoice';
        $this->template->content = View::forge('invoice/testing', $data);
    }

    public function action_submit_single() {
        print_r(Input::post());
        $customer = parent::submit_single_details(Input::post(), 'single');
        print_r($customer);
        $invoice = parent::submit_invoice_details(Input::post(), $customer->id);
        parent::submit_panel_details(Input::post(), $invoice->id);
        Response::redirect('/invoice/preview/' . $invoice->id);
    }

    public function action_monthly_single() {
        print_r(Input::post());
        $customer = parent::submit_customer_details(Input::post(), 'monthly');
//        print_r($customer);
        $invoice = parent::submit_monthly_details(Input::post(), $customer->id);
        $invoice = parent::submit_invoice_details(Input::post(), $customer->id);
        parent::submit_panel_details(Input::post(), $invoice->id);
        Response::redirect('/invoice/preview/' . $invoice->id);
//        return $customer->invoice->id;
    }

    public function action_monthly() {
        $data['monthly_customers'] = Model_Monthlycustomer::find('all', array(
                    'related' => array('customer'),
//            'where' => array('t1.type' => 'monthly')
        ));
        $this->template->title = 'Invoice | Monthly';
        $this->template->data = 'Monthly Invoice';
        $this->template->content = View::forge('invoice/monthly', $data);
    }

    public function action_submit_monthly() {
        $this->template->title = 'Invoice | Monthly';
        $this->template->content = 1;
        print_r($_POST);
        $this->submit_monthly_details(Input::post());
    }

    public function action_monthly_new() {
        $data['states'] = Model_State::find('all');
        $data['panels'] = Model_Panel::find('all');
        $data["subnav"] = array('index' => 'active');
        $data['monthly_customer'] = 0;

        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'Invoice | Monthly';
        $this->template->data = 'Monthly Invoice';
        $this->template->content = View::forge('invoice/monthly_new', $data);
    }

    public function action_preview($invoice_id = NULL) {
        $invoice = Model_Invoice::find($invoice_id, array(
                    'related' => array('customer')
        ));

//        $query = DB::query('SELECT * from customers c INNER JOIN invoices i ON c.id = i.customer_id INNER JOIN invoices_panels ip ON i.id = ip.invoice_id');

        $invoice->panels = Model_Panel::find('all', array(
                    'related' => array('invoices_panels'),
                    'where' => array('t1.invoice_id' => $invoice->id)
        ));
        $data['invoice'] = $invoice;
        $data['invoice_id'] = $invoice_id;
        $data['amount_words'] = Controller_Numbertowords::convert_number_to_words($invoice->amount);
        $this->template->title = 'Invoice | Preview';
        return Response::forge(View::forge('invoice/preview', $data));
    }

    public function action_monthly_details($id = 1) {
        $data['states'] = Model_State::find('all');
        $data['panels'] = Model_Panel::find('all', array(
                    'related' => array('global_panel_prices'),
        ));

        $data['monthly_customers'] = Model_Monthlycustomer::find($id, array(
                    'related' => array('customer'),
//            'where' => array('t1.type' => 'monthly')
        ));
        $data['invoice_id'] = 1;
        $this->template->title = 'Invoice | Monthly';
        $this->template->data = 'Monthly Invoice';
        $this->template->content = View::forge('invoice/monthly_details', $data);
    }

    public function action_u_monthly() {
//        print_r($_POST);
        $id = Input::post('customer_id');
//        $customer = Model_Customer::find_by_id($id);
        $customer = $this->submit_monthly_details(Input::post(), $id);
        $val = $customer->save();
        echo $id . " ";
        //print_r($customer_id);
        $this->template->data = 'Monthly Invoice';
        $this->template->title = 'Invoice | Monthly';
        $this->template->content = 1;
    }

    public function action_print($invoice_id = 1) {
        $invoice = Model_Invoice::find($invoice_id, array(
                    'related' => array('customer')
        ));

//        $query = DB::query('SELECT * from customers c INNER JOIN invoices i ON c.id = i.customer_id INNER JOIN invoices_panels ip ON i.id = ip.invoice_id');


        $invoice->panels = Model_Panel::find('all', array(
                    'related' => array('invoices_panels'),
                    'where' => array('t1.invoice_id' => $invoice->id)
        ));
        $data['invoice'] = $invoice;
        $data['invoice_id'] = $invoice_id;
        $this->template->title = 'Invoice | Preview';
        $pdf = \Pdf::factory('tcpdf')->init('P', 'mm', 'A4', true, 'UTF-8', false);
        return Response::forge(View::forge('invoice/print', $data));
    }

    public function action_submit_monthly_new() {
        /*            $name  = explode(' ', Input::post('name'));
          $customer = Model_Customer::forge(array(
          'title' => Input::post('title'),
          'first_name' => $name[0],
          'last_name' => 'name',
          'address_line_1' => Input::post('addr_1'),
          'address_line_2' => Input::post('addr_2'),
          'city' => Input::post('city'),
          'state' => Input::post('state'),
          'pincode' => Input::post('pincode'),
          'phone' => Input::post('phone'),
          'email' => Input::post('email'),
          'type' => 'monthly',
          )); */
//        $customer->monthlycustomer = new Model_Monthlycustomer();
        $customer = parent::fill_customer_details($_POST, 'monthly');
        $customer->monthlycustomer = Model_Monthlycustomer::forge(array(
                    'org_name' => Input::post('org_name'),
                    'org_print_name' => Input::post('org_name'),
                    'org_code' => Input::post('org_code'),
        ));
        if (Upload::is_valid())
            $this->template->content = "Yes";
        $customer->save();
    }

}