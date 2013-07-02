<?php

/**
 * Description of invoicebase
 *
 * @author anuj
 */
class Controller_Invoicebase extends Controller_Base {

    protected function fill_customer_details($data, $type) {
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
                    'pincode' => $data['pincode'],
                    'phone' => $data['tele'],
                    'email' => $data['email'],
                    'type' => $type,
        ));
//        $customer->outstanding = $data['amount'] - $data['amount_paid'];
        $customer->save();
//        echo $customer->invoice->id;

        return $customer;
    }

    protected function fill_invoice_details($data, $customer_id) {
        $invoice = new Model_Invoice();
        $invoice->customer_id = $customer_id;
        $invoice->user_id = Session::get('user')->id;
        $invoice->amount = $data['amount'];
        $invoice->payment_mode = $data['payment_mode'];
        $invoice->bank_name = Input::post('amount_paid');
        if ($data['payment_mode'] == "Cheque") {
            $invoice->bank_name = Input::post('bank_name');
            $invoice->cheque_number = Input::post('cheque_number');
            $invoice->bank_branch = Input::post('bank_branch');
            $invoice->bank_city = Input::post('bank_city');
        }
        $invoice->save();
        return $invoice;
    }

    protected function fill_panel_details($data, $invoice_id) {
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
