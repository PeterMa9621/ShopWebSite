<?php


class UserService extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('/User/UserModel');
        $this->load->library('EventLog');
    }

    public function login($uid, $psw){
        if($uid==null or $psw==null) {
            $this->EventLog->log("In UserService->login, uid or psw is null!");
            return false;
        }

        return $this->UserModel->login($uid, $psw);
    }

    public function checkUserName($uid){
        if($uid==null)
            return json_encode(false);
        $result = $this->UserModel->isUidAvailable($uid);
        return json_encode($result);
    }

    public function register($uid, $psw, $email){
        if($uid==null or $psw==null or $email==null)
            return false;
        return $this->UserModel->register($uid, $psw, $email);
    }

    public function isLogin(){
        return $this->session->userdata('user')==null;
    }

    public function getUsers($uid){
        if($uid==null){
            return $this->UserModel->getUsers();
        } else {
            return $this->searchUser($uid);
        }
    }

    public function getUser($uid){
        if($uid==null)
            return null;
        return $this->UserModel->getUserById($uid);
    }

    public function searchUser($uid){
        if($uid==null)
            return null;
        return $this->UserModel->search($uid);
    }

    public function deleteUser($uid){
        if($uid==null)
            return false;
        return $this->UserModel->delete($uid);
    }

    public function modifyUser($uid, $psw, $email){
        if($uid==null or $psw==null or $email==null)
            return "Failed to modify this user!";
        $modifiedData = array($psw, $email);
        $succeed = $this->UserModel->update($uid, $modifiedData);
        if($succeed){
            return "Modified successfully!";
        }
        return "Failed to modify this user!";
    }
}