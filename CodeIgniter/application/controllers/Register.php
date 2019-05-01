<?php


class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("/User/UserService");
        $this->load->helper("url_helper");
    }

    public function index($msg = ""){
        $data["title"] = "Register";
        $data["msg"] = $msg;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/leftbar', $data);
        $this->load->view('/pages/register', $data);
        $this->load->view('templates/footer', $data);
    }

    public function checkUserName(){
        if($this->input->method()!="post"){
            show_404();
            return;
        }
        $uid = $this->input->post("name");

        $result = $this->UserService->checkUserName($uid);
        echo $result;
    }

    public function register(){
        if($this->input->method()!="post"){
            show_404();
            return;
        }
        $uid = $this->input->post("name");
        $psw = $this->input->post("psw");
        $email = $this->input->post("email");

        $result = $this->UserService->register($uid, $psw, $email);

        if($result){
            redirect("login/index");
        } else {
            $this->index("Failed to sign up this account!");
        }
    }
}