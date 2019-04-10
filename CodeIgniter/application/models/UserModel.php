<?php


class UserModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library("DataController");
    }

    public function getUser(){
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function getUserById($uid){
        $query = $this->db->get_where("users", array('uid' => $uid));
        return $query->row_array();
    }

    public function checkUserName($uid){
        $result = $this->getUserById($uid);
        $response = "";
        if(!empty($result)){
            $response = "<font color='#a52a2a'>The user name has already existed!</font>";
        }
        return $response;
    }

    public function register($uid, $psw, $email){
        $sql = "INSERT INTO users (uid, psw, email) VALUES (?, ?, ?)";
        return $this->db->query($sql, array($uid, $psw, $email));
    }

    public function login($uid, $psw){
        $user = $this->getUserById($uid);
        if (empty($user)) {
            return false;
        }
        if($user["psw"] == $psw){
            $this->session->set_userdata("user", $user);
            return true;
        }
        return false;
    }

    public function delete($uid){
        $sql = "DELETE FROM users WHERE users.uid = ?";
        return $this->db->query($sql, array($uid));
    }
}