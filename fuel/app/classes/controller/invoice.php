<?php

class Controller_Invoice extends Controller_Base {

        public function action_index() {
                Response::redirect('invoice/single');
        }

    
    public function action_sinlge() {
        $data= 1;
        $this->template->content = View::forge('invoice/single', $data);
        
    }

    public function action_monthly() {
    }

}
