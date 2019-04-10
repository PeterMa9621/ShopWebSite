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
        if($this->session->userdata('user')==null){
            show_error("You have not logged in!");
            return;
        }

        $data['users'] = $this->UserModel->getUser();
        $data['title'] = "See all users";
        $this->load->view('templates/header', $data);
        $this->load->view('pages/users', $data);
        $this->load->view('templates/footer', $data);
    }

    public function operateUser(){
        $submit = $this->input->post('submit');
        if($submit=='delete'){
            $uid = $this->input->post('name');
            $this->UserModel->delete($uid);

        }
        $this->index();
    }
}