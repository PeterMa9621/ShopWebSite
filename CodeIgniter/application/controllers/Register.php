<?php


class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel");
        $this->load->helper("url_helper");
    }

    public function index($msg = ""){
        $data["title"] = "Register";
        $data["msg"] = $msg;
        $this->load->view('templates/header', $data);
        $this->load->view('/pages/register', $data);
        $this->load->view('templates/footer', $data);
    }

    public function checkUserName(){
        if($this->input->method()!="post"){
            show_404();
            return;
        }
        $uid = $this->input->post("name");

        #$uid = $_GET["name"];
        #echo $uid;
        $result = $this->UserModel->isUidAvailable($uid);
        echo json_encode($result);
    }

    public function register(){
        if($this->input->method()!="post"){
            show_404();
            return;
        }
        $uid = $this->input->post("name");

        $psw = $this->input->post("psw");
        $email = $this->input->post("email");
        $result = $this->UserModel->register($uid, $psw, $email);
        if($result){
            redirect("login/index");
        } else {
            $this->index("Failed to sign up this account!");
        }
    }
}