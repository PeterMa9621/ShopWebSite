<?php


class UnitTest extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->library('unit_test');
        $this->load->model('/User/UserModel');
    }

    public function test(){
        $result = $this->UserModel->getUsers();
        $this->unit->run($result, 'is_array', 'UserModel->getUsers()');

        $this->UserModel->delete('test01');

        $result = $this->UserModel->isUidAvailable('test01');
        $this->unit->run($result, 'true', 'UserModel->isUidAvailable(uid)');

        $result = $this->UserModel->register('test01', '123456', 'test@a.com');
        $this->unit->run($result, true, 'UserModel->register(uid, psw, email)');

        $result = $this->UserModel->login('test01', '123456');
        $this->unit->run($result, true, 'UserModel->login(uid, psw)');

        $result = $this->UserModel->getUserById('test01');
        $this->unit->run($result, 'is_array', 'UserModel->getUserById(uid) is an array');
        $this->unit->run($result['uid'], 'test01', 'UserModel->getUserById(uid) checks the equivalent of uid');
        $this->unit->run($result['psw'], '123456', 'UserModel->getUserById(uid) checks the equivalent of psw');
        $this->unit->run($result['email'], 'test@a.com', 'UserModel->getUserById(uid) checks the equivalent of email');

        $result = $this->UserModel->update('test01', array('123', 'b@a.com'));
        $this->unit->run($result, true, 'UserModel->update(uid, array())');

        $result = $this->UserModel->getUserById('test01');
        $this->unit->run($result, 'is_array', 'UserModel->getUserById(uid) is an array');
        $this->unit->run($result['uid'], 'test01', 'UserModel->getUserById(uid) checks the equivalent of uid');
        $this->unit->run($result['psw'], '123', 'UserModel->getUserById(uid) checks the equivalent of psw');
        $this->unit->run($result['email'], 'b@a.com', 'UserModel->getUserById(uid) checks the equivalent of email');

        $result = $this->UserModel->search('test01');
        $this->unit->run($result[0]['uid'], 'test01', 'UserModel->search(uid)');

        $this->UserModel->logout();

        $result = $this->UserModel->delete('test01');
        $this->unit->run($result, true, 'UserModel->delete(uid)');

        $result = $this->UserModel->isUidAvailable('test01');
        $this->unit->run($result, 'false', 'UserModel->isUidAvailable(uid)');

        echo $this->unit->report();
    }
}