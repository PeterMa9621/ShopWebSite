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

    public function login($uid, $psw){
        $user = $this->getUserById($uid);
        if ($user==null) {
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

    public function update($uid, $data){
        $sql = "UPDATE users SET psw = ?, email = ? WHERE users.uid = '".$uid."'";
        return $this->db->query($sql, $data);
    }
}