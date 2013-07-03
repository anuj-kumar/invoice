<?php

use \Fuel\Core\Response;
use \Fuel\Core\Session;

class Controller_Base extends Controller_Template {

    public static function access($module) {
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
            $time = date('Y-m-d H:i:s');
            $user->last_login_at = $time;
            $user->save();
    }

    protected function logout_user() {
        Session::destroy();
    }

}

?>
