<?php

// ViewModel and DataModel
// No factory pattern, cannot do unit tests
// Unit tests
// Functional testing - ViewModel
// Bootstrap - css layout - Facebook
// How to implement an interface in php - Generic
// No logging : try file logging and window event logging
// window event: 事件查看器
// No main layout - leftbar implementation
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
        if($user['psw'] == $psw){
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


    public function search($uid){
        $this->db->like("uid", $uid);
        return $this->db->get("users")->result_array();
    }
}