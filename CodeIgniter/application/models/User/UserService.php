<?php


class UserService extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
    }

    public function login($uid, $psw){
        return $this->UserModel->login($uid, $psw);
    }
}