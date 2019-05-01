<?php


class UserDAL extends CI_Model
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
        if($query==null){
            return null;
        }
        return $query->row_array();
    }

    public function isUidAvailable($uid){
        $result = $this->getUserById($uid);
        $response = true;
        if(!empty($result)){
            $response = false;
        }
        return $response;
    }

    public function register($uid, $psw, $email){
        if($this->isUidAvailable($uid)){
            $sql = "INSERT INTO users (uid, psw, email) VALUES (?, ?, ?)";
            return $this->db->query($sql, array($uid, $psw, $email));
        } else {
            return false;
        }
    }
}