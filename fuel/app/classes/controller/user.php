<?php

/**
 * Description of user
 *
 * @author anuj
 */
class Controller_User extends Controller_Base {

    public function action_create() {
        $this->template->title = 'Create User';
        $this->template->content = View::forge('user/create');
    }

    public function action_submit() {
        if (!empty($_POST)) {
            $user = new Model_User();
            $user->name = Input::post('name');
            $user->password = Input::post('password');
  $access_right = new Model_Access_Right();
            //$user->access_right = $this->change_permissions(Input::post(), $access_right);
        $user->access_right->invoice_single = Input::post('invoice_single');
        $user->access_right->invoice_monthly = Input::post('invoice_monthly');
        $user->access_right->invoice_monthly_new = Input::post('invoice_monthly_new');
        $user->access_right->invoice_monthly_details = Input::post('invoice_monthly_details');
        $user->access_right->panel_global = Input::post('panel_global');
        $user->access_right->panel_local = Input::post('panel_local');
        $user->access_right->archive_single = Input::post('archive_single');
        $user->access_right->archive_monthly = Input::post('archive_monthly');
        $user->access_right->user_list = Input::post('user_list');
        $user->access_right->user_create = Input::post('user_create');
            print_r($user);
            $user->save();
            Response::redirect('user/list');
        } else {
            Response::redirect('user/create');
        }
    }

    public function action_list() {
        $offset = Input::get('o');
        $limit = 10;
        $data['users'] = Model_User::find('all', array(
                    'related' => 'access_right',
                    'rows_limit' => $limit,
                    'rows_offset' => $offset,
        ));

        $uri = Input::uri();
        $count = count($data['users']);

        $data['prev'] = $uri . ((isset($offset) && $offset > $limit) ? '?o=' . ($offset - $limit) : NULL);
        $data['next'] = $uri . '?o=';
        $data['next'] .= (isset($offset) ? ($offset + $offset < $count ? $limit : 0) : $limit);

        $data["subnav"] = array('users' => 'active');
        $this->template->title = 'System log | Users';
        $this->template->content = View::forge('user/list', $data);
    }

    public function action_modify() {
        $access_right = Model_Access_Right::find('first', array(
                    'where' => array('user_id' => Input::post('user_id'))
        ));
        if (!$access_right)
            die('User ID not found!');
        print_r(Input::post());
        print_r($access_right);

        $access_right->invoice_single = Input::post('invoice_single');
        $access_right->invoice_monthly = Input::post('invoice_monthly');
        $access_right->invoice_monthly_new = Input::post('invoice_monthly_new');
        $access_right->invoice_monthly_details = Input::post('invoice_monthly_details');
        $access_right->panel_global = Input::post('panel_global');
        $access_right->panel_local = Input::post('panel_local');
        $access_right->archive_single = Input::post('archive_single');
        $access_right->archive_monthly = Input::post('archive_monthly');
        $access_right->user_list = Input::post('user_list');
        $access_right->user_create = Input::post('user_create');
        print_r($access_right);
        $res = $access_right->save();
        if ($res) {
            Session::set_flash('Permissions changed successfully!');
            Response::redirect('user/list');
        }
    }

/*    private function change_permissions($data, $access_right) {
        echo $data['invoice_single'];
        $access_right->invoice_single = (empty($data['invoice_single']) ? 0 : 1);
        $access_right->invoice_monthly = (isset($data['invoice_monthly']) ? 1 : 0);
        $access_right->invoice_monthly_new = isset($data['invoice_monthly_new']) ? 1 : 0;
        $access_right->invoice_monthly_details = isset($data['invoice_monthly_details']) ? 1 : 0;
        $access_right->panel_global = isset($data['panel_global']) ? 1 : 0;
        $access_right->panel_local = isset($data['panel_local']) ? 1 : 0;
        $access_right->archive_single = isset($data['archive_single']) ? 1 : 0;
        $access_right->archive_monthly = isset($data['archive_monthly']) ? 1 : 0;
        $access_right->user_list = isset($data['user_list']) ? 1 : 0;
        $access_right->user_create = isset($data['user_create']) ? 1 : 0;
        return $access_right;
    }
*/
}

?>
