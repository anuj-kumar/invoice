<?php

/**
 * Description of invoicebase
 *
 * @author anuj
 */
class Controller_Invoicebase extends Controller_Base {

    protected function submit_customer_details($data, $customer) {
        $customer->title = $data['title'];
        $customer->first_name = $data['f_name'];
        $customer->last_name = $data['l_name'];
        $customer->address_line_1 = $data['addr_1'];
        $customer->address_line_2 = $data['addr_2'];
        $customer->address_line_3 = $data['addr_3'];
        $customer->city = $data['city'];
        $customer->state = $data['state'];
        $customer->country = $data['country'];
        $customer->pincode = $data['pincode'];
        $customer->phone = $data['tele'];
        $customer->email = $data['email'];
//        $customer->outstanding = $data['amount'] - $data['amount_paid'];
        $customer->save();
//        echo $customer->invoice->id;

        return $customer;
    }

    protected function submit_single_details($data) {
        $customer = new Model_Customer();
        $customer->type = 'single';
        $this->submit_customer_details($data, $customer);
    }

    protected function submit_monthly_details($data) {
        $customer_id = $data['customer_id'];
        $customer = Model_Customer::find($customer_id);
        $this->submit_customer_details($data, $customer);
        $monthly_customer = Model_Monthlycustomer::find('first', array(
                    'where' => array('customer_id' => $customer_id)
        ));
//        print_r($monthly_customer);
        $monthly_customer->org_name = $data['org_name'];
        $monthly_customer->org_print_name = $data['org_print_name'];
        $monthly_customer->outstanding = $data['amount'] - $data['amount_paid'] + $monthly_customer->outstanding;
        $monthly_customer->save();
        $invoice = $this->submit_invoice_details($data, $customer_id);
        $this->submit_panel_details($data, $invoice->id);
    }

    protected function submit_invoice_details($data, $customer_id) {
        $invoice = new Model_Invoice();
        $invoice->customer_id = $customer_id;
        $invoice->user_id = Session::get('user')->id;
        $invoice->amount = $data['amount'];
        $invoice->payment_mode = $data['payment_mode'];
        $invoice->amount_paid = Input::post('amount_paid');
        if ($data['payment_mode'] == "Cheque") {
            $invoice->bank_name = Input::post('bank_name');
            $invoice->cheque_number = Input::post('cheque_number');
            $invoice->bank_branch = Input::post('bank_branch');
            $invoice->bank_city = Input::post('bank_city');
        }
        $invoice->save();
        return $invoice;
    }

    protected function submit_panel_details($data, $invoice_id) {
        $panels = $data['panel_name'];
        $quantity = $data['panel_qty'];
        $price = $data['panel_price'];
//        print_r($quantity);
        for ($i = 0; $i < sizeof($panels); $i++) {
            $invoice = Model_Invoices_Panel::forge(
                            array(
                                'invoice_id' => $invoice_id,
                                'panel_id' => $panels[$i],
                                'panel_quantity' => $quantity[$i],
                                'panel_price' => $price[$i]
            ));
            $invoice->save();
        }
    }

   
}

?>
