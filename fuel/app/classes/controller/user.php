<?php

/**
 * Description of user
 *
 * @author anuj
 */
class Controller_User extends Controller_Base {

    public function action_index() {
        
    }

    public function action_create() {
        $user = new Model_User();
        $user->name = Input::post('name');
        $user->password = Input::post('password');
        $user->access_right = new Model_Access_Right();
        $user->access_right->print_invoice = Input::post('print_invoice');
        $user->access_right->view_archive = Input::post('view_archive');
        $user->access_right->add_panel = Input::post('add_panel');
        $user->access_right->add_monthly_customer = Input::post('add_monthly_customer');
        $user->save();
    }
    
    public function action_modify() {
        $access_right = Model_Access_Right::find('first', array(
            'where' => array('user_id' => Input::post('user_id'))
        ));
        if(!$access_right) die('User ID not found!');
//        print_r($_POST);
        $access_right->print_invoice = Input::post('print_invoice');
        $access_right->view_archive = Input::post('view_archive');
        $access_right->add_panel = Input::post('add_panel');
        $access_right->add_monthly_customer = Input::post('add_monthly_customer');
        $res = $access_right->save();
        if($res) {
            Session::set_flash('Permissions changed successfully!');
            Response::redirect('system_log/users');
        }
    }

}
?>
