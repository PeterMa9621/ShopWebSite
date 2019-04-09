<?php


class UserModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getUser(){
        $query = $this->db->get('users');
        return $query->result_array();
    }
}