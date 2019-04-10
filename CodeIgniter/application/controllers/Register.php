<?php


class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel");

    }

    public function index($msg = ""){
        $data["title"] = "Register";
        $data["msg"] = $msg;
        $this->load->view('templates/header', $data);
        $this->load->view('/pages/register', $data);
        $this->load->view('templates/footer', $data);
    }

    public function checkUserName(){
        $uid = $this->input->post("name");
        #$uid = $_GET["name"];
        #echo $uid;
        $result = $this->UserModel->checkUserName($uid);
        echo $result;
    }

    public function register(){
        $uid = $this->input->post("name");
        echo $uid;
        $psw = $this->input->post("psw");
        $email = $this->input->post("email");
        $result = $this->UserModel->register($uid, $psw, $email);
        if($result){
            redirect("/pages/home");
        } else {
            $this->index("Failed to sign up this account!");
        }
    }
}