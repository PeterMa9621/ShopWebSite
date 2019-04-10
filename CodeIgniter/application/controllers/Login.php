<?php


class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel");
        $this->load->helper("url_helper");
    }

    public function index(){
        if($this->session->userdata('user')!=null){
            $this->session->set_userdata('user', null);
            redirect();
            return;
        }
        $data['title'] = "Login System";
        $this->load->view('templates/header', $data);
        $this->load->view('/pages/login', $data);
        $this->load->view('templates/footer', $data);
    }

    public function login(){
        if(!isset($_POST["submit"])){
            show_404();
            return;
        }

        if($_POST["submit"]=="login") {
            $uid = $_POST["name"];
            $psw = $_POST["psw"];

            $succeed = $this->UserModel->login($uid, $psw);
            if (!$succeed) {
                echo "<script>history.back();alert('Wrong user or password!')</script>";
            } else {
                redirect("/pages/view");
                /*
                $data['title'] = "Home";
                $this->load->view('templates/header', $data);
                $this->load->view('pages/home', $data);
                $this->load->view('templates/footer', $data);
                */
            }
        }

    }
}