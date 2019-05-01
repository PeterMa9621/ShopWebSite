<?php


class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url_helper");
    }

    public function view($page = 'home'){
        if(!file_exists(APPPATH. '/views/pages/' . $page . '.php')){
            show_404();
        } else {
            $data['title'] = ucfirst($page);
            $data['user'] = $this->session->userdata('user');

            $this->load->view('templates/header', $data);
            $this->load->view('templates/leftbar', $data);
            $this->load->view('/pages/' . $page, $data);
            $this->load->view('templates/footer', $data);
        }
    }
}