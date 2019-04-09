<html lang="en">
    <?php
        global $name;

        include_once('MySqlHelper.php');

        $dbName = "shop";
        $mysqlHelper = MySqlHelper::getInstance($dbName);

        $mysqli = $mysqlHelper->getConnection();


        // Convert to UTF-8
        //$mysqli->query("set names 'utf8';");

        if(isset($_POST["name"])){
            $name = $_POST["name"];
        }
        /*
        $sql = "select * from users;";
        $result = $mysqlHelper->executeSql($sql);

        while ($row = $result->fetch_assoc()) {
            var_dump($row);
            $user = $row['uid'];
        }
        echo "<br>Current User is ", $user;
        $result->free();
        $mysqli->close();
        */

        ?>
    <body>
        <h1 align="center">Login System</h1>

        <form action="index.php" method="post">
            UserName: <label><input type="text" name="name"
                                value=<?php echo $name ?>></label><br>
            <?php if($name!=null && $name!="peter"){echo "Error!<br>";} ?>
            Password: <label><input type="text" name="email"></label><br>
            <input type="submit">
        </form>

        <form action="register.html" method="get">
            <input type="submit" value="Register">
        </form>

        <form action="/CodeIgniter/index.php/pages/view" method="get">
            <input type="submit" value="Home">
        </form>
    </body>
</html>
