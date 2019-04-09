<?php


class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel");
    }

    public function index(){
        $data['title'] = "Login System";
        $this->load->view('templates/header', $data);
        $this->load->view('/pages/login', $data);
        $this->load->view('templates/footer', $data);
    }
}