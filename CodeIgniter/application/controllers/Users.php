<?php


class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("/User/UserService");
        $this->load->helper("url_helper");
    }

    public function index($msg = ""){
        if($this->UserService->isLogin()){
            show_error("You have not logged in!");
            return;
        }

        $uid = $this->input->get("uid");

        $data['users'] = $this->UserService->getUsers($uid);

        $data['msg'] = $msg;
        $data['title'] = "All users";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/leftbar', $data);
        $this->load->view('pages/users', $data);
        $this->load->view('templates/footer', $data);
    }

    public function delete(){
        if($this->input->method()!="post"){
            show_404();
            return;
        }
        $uid = $this->input->post('uid');

        $this->UserService->deleteUser($uid);

        redirect("/users/index");
    }

    public function detail(){
        if($this->input->method()!="post"){
            show_404();
            return;
        }

        $uid = $this->input->post('uid');
        $user = $this->UserService->getUser($uid);
        $data['user'] = $user;
        $data['title'] = 'View User Detail';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/leftbar', $data);
        $this->load->view('pages/user_detail', $data);
        $this->load->view('templates/footer', $data);
    }

    public function modify(){
        if($this->input->method()!="post"){
            show_404();
            return;
        }

        $uid = $this->input->post('uid');
        $psw = $this->input->post('psw');
        $email = $this->input->post('email');

        echo $this->UserService->modifyUser($uid, $psw, $email);
    }
}