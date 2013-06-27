<?php

class Controller_Panel extends Controller_Base {

    public function action_index() {
        $data['panels'] = Model_Panel::find('all');
        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'Panels &raquo; Global';
        $this->template->content = View::forge('panel/global', $data);
    }

    public function action_submit() {
        print_r(Input::post('vol_low'));
        print_r(Input::post('vol_low.0'));
        $i = 0;
        foreach (Input::post('panel') as $row):
            for($j=0; $j<9; $j++) {
                $panel_price = new Model_Global_Panel_Price();
                $panel_price->vol_low = Input::post('vol_low.' . $i);
                $panel_price->vol_high = Input::post('vol_high.' . $i);
                $panel_price->price = $row[$j];
                $panel_price->panel_id = $j+1;
                $panel_price->save();
            }
            $i++;
        endforeach;
    }

}