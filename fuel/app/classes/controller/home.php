<?php

class Controller_My extends Controller_Base {

    public function action_index() {
        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'My &raquo; Index';
        $rights = Model_Access_Right::find('all', array('related' => array('user')));
        $data['rights'] = $rights;
        $this->template->content = View::forge('my/index', $data);
    }
}