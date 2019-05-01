<?php


class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("/User/UserModel");
        $this->load->helper("url_helper");
        $this->load->model("/User/UserService");
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
        if($this->input->method()!="post"){
            show_404();
            return;
        }

        $uid = $_POST["name"];
        $psw = $_POST["psw"];

        $succeed = $this->UserService->login($uid, $psw);
        if (!$succeed) {
            echo "<script>alert('Wrong user or password!');history.back()</script>";
        } else {
            //echo "<script>window.location.href=\"\"</script>";
            redirect("/pages/view");
        }
    }
}