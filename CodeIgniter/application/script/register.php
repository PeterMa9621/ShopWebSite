<?php
    $this->load->model("UserModel");

    $userName = $_GET["name"];
    $response = "<font color='blue'>The user name is available</font>";

    $result = $this->UserModel->getUserById($userName);

    //echo $result->num_rows;
    if(!empty($result)){
        $response = "<font color='#a52a2a'>The user name has already existed!</font>";
    }

    echo $response;