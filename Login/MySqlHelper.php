<?php


class MySqlHelper
{
    /** @var MySqlHelper $instance */
    private static $instance;

    private $connection;

    private function __construct(){

    }

    private function __clone()
    {
        // TODO: Implement __clone() method.
    }

    public static function getInstance($dbName){
        // Get instance of the database first
        if(MySqlHelper::$instance == null){
            MySqlHelper::$instance = new MySqlHelper();
        }
        // Then select a db
        MySqlHelper::$instance->selectDB($dbName);
        return MySqlHelper::$instance;
    }
    /**
     * @return mysqli
     */
    public function getConnection()
    {
        if($this->connection == null){
            $mysql_conf = array(
                'host'    => '127.0.0.1:3306',
                'db_user' => 'root',
                'db_pwd'  => ''
            );

            $mysqli = @new mysqli($mysql_conf['host'], $mysql_conf['db_user'], $mysql_conf['db_pwd']);

            // Check if connect the database successfully
            if ($mysqli->connect_errno) {
                die("could not connect to the database:\n" . $mysqli->connect_error);
            }
            $this->connection = $mysqli;
        }
        return $this->connection;
    }

    public function selectDB($dbName){
        $mysqli = $this->getConnection();
        $select_db = $mysqli->select_db($dbName);
        if (!$select_db) {
            die("could not connect to the db:\n" .  $mysqli->error);
        }
    }

    public function executeSql($sqlQuery){
        $mysqli = $this->getConnection();
        $result = $mysqli->query($sqlQuery);
        if (!$result) {
            die("sql error:\n" . $mysqli->error);
        }
        return $result;
    }
}