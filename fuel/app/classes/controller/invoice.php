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
        $this->template->content = View::forge('invoice/single', $data);
    }

    public function action_submit_single() {
        print_r(Input::post());
        $customer = parent::submit_single_details(Input::post(), 'single');
        print_r($customer);
        $invoice = parent::submit_invoice_details(Input::post(), $customer->id);
        parent::submit_panel_details(Input::post(), $invoice->id);
        Response::redirect('/invoice/preview/' . $invoice->id);
    }

    /*    public function action_monthly_single() {
      print_r(Input::post());
      $customer = parent::submit_customer_details(Input::post(), 'monthly');
      //        print_r($customer);
      $invoice = parent::submit_monthly_details(Input::post(), $customer->id);
      $invoice = parent::submit_invoice_details(Input::post(), $customer->id);
      parent::submit_panel_details(Input::post(), $invoice->id);
      Response::redirect('/invoice/preview/' . $invoice->id);
      //        return $customer->invoice->id;
      } */

    public function action_monthly() {
        $data['monthly_customers'] = Model_Monthlycustomer::find('all', array(
                    'related' => array('customer'),
//            'where' => array('t1.type' => 'monthly')
        ));
        $this->template->title = 'Invoice | Monthly';
        $this->template->data = 'Monthly Invoice';
        $this->template->content = View::forge('invoice/monthly', $data);
    }

    public function action_preview($invoice_id = NULL) {
        $invoice = Model_Invoice::find($invoice_id, array(
                    'related' => array('customer')
        ));

        $invoice->panels = Model_Panel::find('all', array(
                    'related' => array('invoices_panels'),
                    'where' => array('t1.invoice_id' => $invoice->id)
        ));
        $data['invoice'] = $invoice;
        $data['invoice_id'] = $invoice_id;
        $str = Controller_Numbertowords::convert_number_to_words($invoice->amount);
        $data['amount_words'] = ucwords($str);

        $this->template->title = 'Invoice | Preview';
        return Response::forge(View::forge('invoice/preview', $data));
    }

    public function action_preview_monthly($invoice_id = NULL) {
        $invoice = Model_Invoice::find($invoice_id, array(
                    'related' => array('customer')
        ));

        $monthly_customer = Model_Monthlycustomer::find('first', array(
                    'where' => array('customer_id' => $invoice->customer->id)
        ));
        $invoice->panels = Model_Panel::find('all', array(
                    'related' => array('invoices_panels'),
                    'where' => array('t1.invoice_id' => $invoice->id)
        ));
        //print_r($monthly_customer);
        $data['monthly_customer'] = $monthly_customer;
        $data['invoice'] = $invoice;
        $data['invoice_id'] = $invoice_id;
        $str = Controller_Numbertowords::convert_number_to_words($invoice->amount);
        $data['amount_words'] = ucwords($str);

        $this->template->title = 'Invoice | Preview';

        return Response::forge(View::forge('invoice/preview_monthly', $data));
    }

    public function action_monthly_details($id = 1) {
        $data['states'] = Model_State::find('all');

        $monthly_customer = Model_Monthlycustomer::find($id, array(
                    'related' => array('customer'),
//            'where' => array('t1.type' => 'monthly')
        ));
        $data['panels'] = Model_Panel::find('all', array(
                    'related' => array('local_panel_prices'),
                    'where' => array('t1.monthly_customer_id' => $monthly_customer->id),
        ));
        $data['monthly_customers'] = $monthly_customer;
        $data['invoice_id'] = 1;
        $this->template->title = 'Invoice | Monthly';
        $this->template->data = 'Monthly Invoice';
        $this->template->content = View::forge('invoice/monthly_details', $data);
    }

    public function action_submit_monthly() {
        $this->template->title = 'Invoice | Monthly';
        $this->template->content = 1;
        $invoice_id = $this->submit_monthly_details(Input::post());
        Response::redirect('/invoice/preview_monthly/' . $invoice_id);
    }

    public function action_u_monthly() {
        $id = Input::post('customer_id');
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
        $str = Controller_Numbertowords::convert_number_to_words($invoice->amount);
        $data['amount_words'] = ucwords($str);
        $data['invoice_id'] = $invoice_id;
        $this->template->title = 'Invoice | Preview';
        $pdf = \Pdf::factory('tcpdf')->init('P', 'mm', 'A4', true, 'UTF-8', false);
        return Response::forge(View::forge('invoice/print', $data));
    }

    public function action_print_monthly($invoice_id = 1) {
        $invoice = Model_Invoice::find($invoice_id, array(
                    'related' => array('customer')
        ));

        $monthly_customer = Model_Monthlycustomer::find('first', array(
                    'where' => array('customer_id' => $invoice->customer->id)
        ));
        $invoice->panels = Model_Panel::find('all', array(
                    'related' => array('invoices_panels'),
                    'where' => array('t1.invoice_id' => $invoice->id)
        ));
        //print_r($monthly_customer);
        $data['monthly_customer'] = $monthly_customer;
        $data['invoice'] = $invoice;
        $data['invoice_id'] = $invoice_id;
        $str = Controller_Numbertowords::convert_number_to_words($invoice->amount);
        $data['amount_words'] = ucwords($str);

        $this->template->title = 'Invoice | Preview';
        $pdf = \Pdf::factory('tcpdf')->init('P', 'mm', 'A4', true, 'UTF-8', false);
        return Response::forge(View::forge('invoice/print_monthly', $data));
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

    public function action_submit_monthly_new() {
        $customer = new Model_Customer();
        $customer->type = 'monthly';
        $state=Input::post('state');
        $org_code=parent::find_code($state);
        $customer->monthlycustomer = Model_Monthlycustomer::forge(array(
                    //'customer_id' => $customer->id,
                    'org_name' => Input::post('org_name'),
                    'org_print_name' => Input::post('org_name'),
                    'org_code' => $org_code,
                    'duedate' => Input::post('due_date'),
                    'outstanding' => 0,
        ));
        print_r($customer);
        $customer = parent::submit_customer_details($_POST, $customer);
        
        $customer ->save();
        parent::submit_panel_pricing(Input::post(), $customer->monthlycustomer->id);
        Response::redirect('invoice/monthly');
    }

}