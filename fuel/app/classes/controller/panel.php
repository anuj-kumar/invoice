<?php

class Controller_Panel extends Controller_Base {

    public function action_index() {
        $data['panels'] = Model_Panel::find('all');
        $data["subnav"] = array('index' => 'active');
        $data['monthly_customer'] = 0;
        $this->template->title = 'Panels &raquo; Global';
        $this->template->content = View::forge('panel/pricing', $data);
    }

    public function action_submit_global() {
        print_r(Input::post('vol_low'));
        print_r(Input::post('vol_low.0'));
        $i = 0;
        foreach (Input::post('panel') as $row):
            for ($j = 0; $j < 8; $j++) {
                $panel_price = new Model_Global_Panel_Price();
                $panel_price->vol_low = Input::post('vol_low.' . $i);
                $panel_price->vol_high = Input::post('vol_high.' . $i);
                $panel_price->price = $row[$j];
                $panel_price->panel_id = $j + 1;
                $panel_price->save();
            }
            $i++;
        endforeach;
    }

    public function action_local_price($monthly_customer_id = NULL) {
        if ($monthly_customer_id == NULL) {

            $this->template->title = 'Local &raquo; Panels';
            $this->template->content = "Error Enter a  Customer Id";
        } else {
            $data['panels'] = Model_Panel::find('all');
            $data['monthly_customer_id'] = $monthly_customer_id;
            $data['monthly_customer'] = Model_Monthlycustomer::find($monthly_customer_id);
    
            $this->template->title = 'Local &raquo; Panels';
            $this->template->content = View::forge('panel/pricing', $data);
        }
    }

    public function action_submit_local() {
//        print_r($_POST);
        $i = 0;
        $monthly_customer_id = Input::post('monthly_customer_id');
        foreach (Input::post('panel') as $row):
            for ($j = 0; $j < 8; $j++) {
                $panel_price = new Model_local_Panel_Price();
                $panel_price->monthly_customer_id = $monthly_customer_id;
                $panel_price->vol_low = Input::post('vol_low.' . $i);
                $panel_price->vol_high = Input::post('vol_high.' . $i);
                $panel_price->price = $row[$j];
                $panel_price->panel_id = $j + 1;
                $panel_price->save();
            }
            $i++;
        endforeach;

        $this->template->title = 'Panels &raquo; Global';
        $this->template->content = "Entry created successfully";
    }

    public function action_view($customer_id = NULL) {
        if($customer_id==NULL)
        {
            $panels = Model_Panel::find('all', array(
            'related' => array('global_panel_prices'),
            
        ));
        }
    else { 
            $panels = Model_Panel::find('all', array(
            'related' => array('local_panel_prices'),
            
        ));
        
    }
        
        $data['panels'] = $panels;
        $data['customer_id'] = $customer_id;
        $this->template->title = 'Invoice | Main Content';
        $this->template->content = View::forge('panel/view', $data);
    }
}