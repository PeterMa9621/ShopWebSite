<?php
if(isset($_POST["name"])){
    $name = $_POST["name"];
} else {
    $name = "";
}
?>

<h1 align="center"><?php $title ?></h1>

<form action="/CodeIgniter/index.php/users/index" method="post">
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