<?php
class User extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("User_Model", "user_model");

    }

    public function index(){

        print_r( $this->user_model->add("bb", "beibi", "798386353@qq.com"));
    }

    public function login(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $attributes = array('class' => 'form-signin', 'id' => 'loginForm');

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');


        if ($this->form_validation->run() === FALSE)
        {

            $this->load->view('user/login', $attributes);

        }
        else
        {
            $username = $this->input->post('username');
            $password_f = $this->input->post('password');
           // $password = $this->system_security->hash_password($username,$password_f);
            if($this->user_model->login($username,$password_f)['rs'] === "success"){
                $this->load->view('user/success');
            }
            else $this->load->view('user/error');
        }
    }
}
