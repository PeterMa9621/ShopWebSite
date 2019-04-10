<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DataController
{
    private static $user = null;

    public function __construct()
    {

    }

    public function getUser(){
        return self::$user;
    }

    public function setUser($user){
        self::$user = $user;
    }
}