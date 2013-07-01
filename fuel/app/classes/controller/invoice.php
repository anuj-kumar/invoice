<?php

class Controller_Invoice extends Controller_Base {

    public $template = 'template_invoice';

    public function action_index() {
        Response::redirect('/invoice/single');
    }

    public function action_single() {
        $data['panels'] = Model_Panel::find('all');
        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'Invoice | Single';
        $this->template->data = 'Single Invoice';
        $this->template->content = View::forge('invoice/single', $data);
    }

    private function fill_customer_details($data, $type) {
        $customer = Model_Customer::forge(array(
                    'type' => $type,
                    'title' => $data['title'],
                    'first_name' => $data['f_name'],
                    'last_name' => $data['l_name'],
                    'address_line_1' => $data['addr_1'],
                    'address_line_2' => $data['addr_2'],
                    'address_line_3' => $data['addr_3'],
                    'city' => $data['city'],
                    'state' => $data['state'],
                    'pincode' => $data['pin'],
                    'phone' => $data['tele'],
                    'email' => $data['email'],
                    'type' => $type,
        ));
        return $customer;
    }

    public function action_submit_single() {
        $customer = $this->submit_customer_details($_POST, 'single');
        $customer->invoice = new Model_Invoice();
        $customer->invoice->user_id = Session::get('user')->id;
        $val = $customer->save();

//        print_r($customer);

        if ($val == 1) {
            Response::redirect('/invoice/content/' . $customer->invoice->id);
        } else {
            Session::set_flash('error', 'Error in Form');
            return Response::forge(View::forge('invoice/single'));
        }
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

    public function action_preview($invoice_id = NULL) {
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
        return Response::forge(View::forge('invoice/preview', $data));
        
    }

    public function action_submit_content() {
        $this->template->title = 'Invoice | Main Content';
        $this->template->content = print_r(Input::post());
        $panels = Input::post('panel_name');
        $quantity = Input::post('panel_qty');
//        print_r($quantity);
        for ($i = 0; $i < sizeof($panels); $i++) {
//            echo "HEllo";
            $invoice = Model_Invoices_Panels::forge(
                            array(
                                'invoice_id' => Input::post('invoice_id'),
                                'panel_id' => $panels[$i],
                                'panel_quantity' => $quantity[$i]
            ));
            $invoice->save();
        }
    }

    public function action_payment() {
        $data['panels'] = Model_Panel::find('all');
        $this->template->title = 'Invoice | Payment';
         $this->template->data = 'Payment Details';
        $this->template->content = View::forge('invoice/payment', $data);
    }

    public function action_submit_payment() {
//        print_r($_POST);
        $this->template->title = 'Invoice | Monthly';
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

    public function action_print($id = 1) {
        $data['invoice'] = Model_Invoice::find($id, array(
                    'related' => array('customer'),
        ));

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