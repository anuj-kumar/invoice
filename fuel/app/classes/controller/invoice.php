<?php

class Controller_Invoice extends Controller_Invoicebase {

    public $template = 'template_invoice';

    public function action_index() {
        Response::redirect('/invoice/single');
    }

    public function action_monthly_new() {
        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'Invoice | Monthly';
        $this->template->data = 'Monthly Invoice';
        $this->template->content = View::forge('invoice/monthly_new', $data);
    }

    public function action_single() {
        $data['panels'] = Model_Panel::find('all');
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
        $customer = parent::fill_customer_details(Input::post(), 'single');
        print_r($customer);
//        echo $customer->id;
        $invoice = parent::fill_invoice_details(Input::post(), $customer->id);
        parent::fill_panel_details(Input::post(), $invoice->id);
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
//        $this->submit_customer_details($_POST, 'monthly');
        print_r($_POST);
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

    public function action_content($invoice_id = NULL) {
        $panels = Model_Panel::find('all', array(
                    'related' => array('global_panel_prices'),
        ));

        $data['panels'] = $panels;
        $data['invoice_id'] = $invoice_id;
        $this->template->title = 'Invoice | Main Content';
        $this->template->data = 'Panel Details';
        $this->template->content = View::forge('invoice/invoice', $data);
    }

    public function submit_content() {
        $this->template->title = 'Invoice | Main Content';
        $this->template->content = print_r(Input::post());
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
        $this->template->title = 'Invoice | Preview';
        return Response::forge(View::forge('invoice/preview', $data));
    }

    public function action_payment() {
        if (Input::post() == NULL) {
            Response::redirect('invoice/single');
        }
        $this->submit_content(Input::post());

        $data['panels'] = Model_Panel::find('all');
        $data['invoice_id'] = Input::post('invoice_id');
        $this->template->title = 'Invoice | Payment';
        $this->template->data = 'Payment Details';
        $this->template->content = View::forge('invoice/payment', $data);
    }

    public function action_submit_payment() {
        $invoice = Model_Invoice::find($invoice_id);
        $invoice->paid_amount = Input::post('paid_amount');
        $payment_mode = Input::post('payment_mode');
        $invoice->save();

        $customer = Model_Monthlycustomer::find($invoice->customer_id);
        $customer->outstanding = $customer->outstanding + $invoice->amount - $invoice->amount_paid;
        $customer->save();

//        print_r($invoice->customer_id);
        $this->template->title = 'Invoice | Payment';
        $this->template->content = 1;
    }

    public function action_monthly_details($id = 1) {
        $data['monthly_customers'] = Model_Monthlycustomer::find($id, array(
                    'related' => array('customer'),
//            'where' => array('t1.type' => 'monthly')
        ));
        $this->template->title = 'Invoice | Monthly';
        $this->template->data = 'Monthly Invoice';
        $this->template->content = View::forge('invoice/monthly_details', $data);
    }

    public function action_u_monthly() {
//        print_r($_POST);
        $id = Input::post('customer_id');
        $customer_id = Model_Customer::find_by_id($id);
        $customer_id = $this->fill_customer_details($_POST, 'monthly');
        $val = $customer_id->save();
        echo $id . " ";
        //print_r($customer_id);
        $this->template->data = 'Monthly Invoice';
        $this->template->title = 'Invoice | Monthly';
        $this->template->content = 1;
    }

    public function action_print($invoice_id = 1) {
        $customer = Model_Customer::find('first', array(
                    'related' => array('invoices',
                    ),
                    'where' => array('t1.id' => $invoice_id),
        ));

        $data['customer'] = $customer;
        foreach ($customer->invoices as $invoice):

//        $query = DB::query('SELECT * from customers c INNER JOIN invoices i ON c.id = i.customer_id INNER JOIN invoices_panels ip ON i.id = ip.invoice_id');
//        $result = $query->as_object()->execute();
//            print_r($customer->last_name);
            $invoice->panels = Model_Panel::find('all', array(
                        'related' => array('invoices_panels'),
                        'where' => array('t1.invoice_id' => $invoice->id)
            ));
            $data['invoice'] = $invoice;
        endforeach;
        $this->template->title = 'Invoice | Preview';

        $pdf = \Pdf::factory('tcpdf')->init('P', 'mm', 'A4', true, 'UTF-8', false);
        return Response::forge(View::forge('invoice/pdf', $data));
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
        $customer = $this->fill_customer_details($_POST, 'monthly');
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