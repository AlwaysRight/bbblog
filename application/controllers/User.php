<?php
class User extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_model", "user_model");

    }

    public function index(){

       // print_r( $this->user_model->add("bb", "beibi", "798386353@qq.com"));
    }

    public function login()
    {

        $this->load->view('user/login');
    }

    public function checkLogin()
    {
        $username = $this->input->post('username');
        var_dump($username);
        $password_f = $this->input->post('password');
        if ($this->user_model->login($username, $password_f)['rs'] === "success") {
            $this->load->view('user/success');
        } else $this->load->view('user/error');
    }

}
