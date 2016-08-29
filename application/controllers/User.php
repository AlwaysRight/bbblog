<?php
class User extends CI_Controller{
    public function index(){
        $this->load->model("User_Model", "usermodel");
        print_r( $this->usermodel->add("bb", "beibi", "798386353@qq.com"));
    }

    public function login(){

    }
}
