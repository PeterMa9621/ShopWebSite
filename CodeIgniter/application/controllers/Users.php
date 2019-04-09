<?php


class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel");
        $this->load->helper("url_helper");
    }

    public function index(){
        $data['users'] = $this->UserModel->getUser();
        $data['title'] = "See all users";
        $this->load->view('templates/header', $data);
        $this->load->view('pages/users', $data);
        $this->load->view('templates/footer', $data);
    }

    public function login(){
        if($_POST["submit"]=="login"){
            $uid = $_POST["name"];
            $psw = $_POST["psw"];
            echo $uid;
            $user = $this->UserModel->getUserById($uid);
            if(empty($user)){
                echo "<script>alert('Wrong user or password!');history.back()</script>";
                return;
            }
            if($user["psw"] == $psw){
                $data['users'] = $this->UserModel->getUser();
                $data['title'] = "See all users";
                $this->load->view('templates/header', $data);
                $this->load->view('pages/users', $data);
                $this->load->view('templates/footer', $data);
            }
            else{
                echo "<script>alert('Wrong user or password!');history.back()</script>";
                return;
            }
        } else if($_POST["submit"]=="register"){
            $data['users'] = $this->UserModel->getUser();
            $data['title'] = "See all users";
            $this->load->view('templates/header', $data);
            $this->load->view('pages/about', $data);
            $this->load->view('templates/footer', $data);
        }
    }
}