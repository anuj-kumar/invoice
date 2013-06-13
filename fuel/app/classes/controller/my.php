<?php

class Controller_My extends Controller_Base {

    public function action_index() {
        $data["subnav"] = array('index' => 'active');
        $this->template->title = 'My &raquo; Index';
        $rights = Model_Access_Right::find('all', array('related' => array('user')));
        $data['rights'] = $rights;
        $this->template->content = View::forge('my/index', $data);
    }

    public function action_login() {
        $this->template->title = 'My &raquo; Login';
        echo Session::get('user_id');
        if(!Session::get('user_id'))
            $this->template->content = View::forge('my/login');
        else
            \Fuel\Core\Response::redirect ('my/index');
    }

    public function action_verify() {
        $this->template->title = 'My &raquo; Login';
        if (!Input::post()) {
            \Fuel\Core\Response::redirect('my/login');
        }
        $name = Input::post('name');
        $password = Input::post('password');
        $user = Model_User::find_by_name($name);

        if (!$user) {
            $data['error'] = 'Invalid username';
        } else {
            if ($user->password !== $password) {
                $data['error'] = 'Invalid password';
            }
            else {
                $data['user'] = $user;
                View::set_global('current_user', $user);

                parent::dologin($user);
            }
        }
        print_r($user);
        $this->template->content = View::forge('my/verify', $data);
    }
    
    public function action_logout() {
        $this->template->title = 'My &raquo; Login';
//        print_r($_SESSION);
        parent::logout_user();
        Session::set_flash('success', 'You have successfully logged out!');
        $this->template->content = View::forge('my/logout');
    }

}
