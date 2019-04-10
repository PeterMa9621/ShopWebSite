<?php
if(isset($_POST["name"])){
    $name = $_POST["name"];
} else {
    $name = "";
}
?>

<h1 align="center"><?php $title ?></h1>
<table border="1" align="center">
    <form action="/CodeIgniter/index.php/login/login" method="post">
        <tr>
            <td align="center">
                UserName: <label><input type="text" name="name"
                                        value=<?php echo $name ?>></label><br>
            </td>
        <tr>
            <td align="center">
                Password: <label><input type="text" name="psw"></label><br>
            </td>
        </tr>
            <td align="center">
                <input type="submit" name="submit" value="login">
            </td>
        </tr>
    </form>
    <form action="/CodeIgniter/index.php/register/index" method="get">
        <tr>
            <td align="center">
                <input type="submit" value="Register">
            </td>
        </tr>
    </form>
    <form action="/CodeIgniter/index.php/pages/view" method="get">
        <tr>
            <td align="center">
                <input type="submit" value="Home">
            </td>
        </tr>

    </form>
</table>



