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


}