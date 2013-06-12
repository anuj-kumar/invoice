<?php

class Controller_Base extends Controller_Template {
    /*protected function action_verify($module) {
        $rights = Model_Access_Right::find($user_id);
        Input::post();
        
    }*/
    
    protected static function dologin($user) {
        Session::set('user', $user);
        //$user->last_login_at =
                echo date('Y-m-d') . time('HH:MM:SS');
//        $user->save();
    }
    
    protected function logout_user() {
        \Fuel\Core\Session::destroy();
    }
}

?>
