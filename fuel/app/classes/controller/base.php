<?php

use \Fuel\Core\Response;
use \Fuel\Core\Session;

class Controller_Base extends Controller_Template {

    protected function access($module) {
        $user = Session::get('user');
        if ($user) {
            $right = Model_Access_Right::find('first', array(
                        'where' => array('user_id' => $user->id),
                            )
            );
            //print_r($right);
            //echo $right->print_invoice;
            return $right[$module];
        }
    }

    protected static function do_login($user) {
        Session::set('user', $user);
        //$user->last_login_at =
       // echo date('Y-m-d') . time('HH:MM:SS');
//        $user->save();
    }

    protected function logout_user() {
        Session::destroy();
    }

}

?>
