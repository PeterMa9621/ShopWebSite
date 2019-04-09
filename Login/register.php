<?php
    include("MySqlHelper.php");
    $userName = $_GET["name"];
    $response = "<font color='blue'>The user name is available</font>";

    $dbName = "shop";
    $mySqlHelper = MySqlHelper::getInstance($dbName);

    $mysqli = $mySqlHelper->getConnection();

    $sql = 'select * from users where uid = ?;';
    $statement = $mysqli->prepare($sql);

    $statement->bind_param("s", $userName);

    $statement->execute();

    $result = $statement -> get_result();

    //echo $result->num_rows;
    if($result!=false && $result->num_rows > 0){
        $response = "<font color='#a52a2a'>The user name has already existed!</font>";
    }

    echo $response;