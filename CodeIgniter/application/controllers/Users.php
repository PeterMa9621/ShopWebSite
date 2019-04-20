<?php


class Users extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("UserModel");
        $this->load->helper("url_helper");
    }

    public function index($msg = ""){
        if($this->session->userdata('user')==null){
            show_error("You have not logged in!");
            return;
        }

        $data['msg'] = $msg;
        $data['users'] = $this->UserModel->getUser();
        $data['title'] = "All users";
        $this->load->view('templates/header', $data);
        $this->load->view('pages/users', $data);
        $this->load->view('templates/footer', $data);
    }

    public function delete(){
        if($this->input->method()!="post"){
            show_404();
            return;
        }

        $submit = $this->input->post('submitType');
        $uid = $this->input->post('uid');
        if($submit=="delete"){
            $this->UserModel->delete($uid);
        }
        redirect("/users/index");
    }

    public function detail(){
        if($this->input->method()!="post"){
            show_404();
            return;
        }

        $submit = $this->input->post('submit');

        $uid = $this->input->post('uid');
        $user = $this->UserModel->getUserById($uid);
        $data['user'] = $user;
        $data['title'] = 'View User Detail';

        if($submit=="detail"){
            $this->load->view('templates/header', $data);
            $this->load->view('pages/user_detail', $data);
            $this->load->view('templates/footer', $data);
        } else {
            show_404();
        }
    }

    public function modify(){
        if($this->input->method()!="post"){
            show_404();
            return;
        }

        $uid = $this->input->post('uid');
        $psw = $this->input->post('psw');
        $email = $this->input->post('email');

        $modifiedData = array($psw, $email);
        $succeed = $this->UserModel->update($uid, $modifiedData);
        if($succeed){
            echo "Modified successfully!";
            return;
        }
        echo "Failed to modify this user!";
    }
}