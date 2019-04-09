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

    public function getUserById($uid){
        $query = $this->db->get_where("users", array('uid' => $uid));
        return $query->row_array();
    }
}