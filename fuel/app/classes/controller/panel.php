<?php

class Controller_Panel extends Controller_Base {

    public function action_index() {
        $data['panels'] = Model_Panel::find('all');
        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'Panels &raquo; Global';
        $this->template->content = View::forge('panel/global', $data);
    }

}