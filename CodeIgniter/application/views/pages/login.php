<?php
if(isset($_POST["name"])){
    $name = $_POST["name"];
} else {
    $name = "";
}
?>

<h1 align="center"><?php $title ?></h1>
<div align="center">
    <table align="center">
        <form action="<?php echo base_url()?>login/login" method="post">
            <tr>
                <td>
                    <label>UserName:</label><input type="text" name="name"
                                            value=<?php echo $name ?>>
                </td>
            <tr>
                <td>
                    <label>Password:</label><input type="text" name="psw">
                </td>
            </tr>
                <td align="center">
                    <input type="submit" name="submit" value="login">
                </td>
            </tr>
        </form>
        <form action="<?php echo base_url()?>register/index" method="get">
            <tr>
                <td align="center">
                    <input type="submit" value="Register">
                </td>
            </tr>
        </form>
        <form action="<?php echo base_url()?>" method="get">
            <tr>
                <td align="center">
                    <input type="submit" value="Home">
                </td>
            </tr>

        </form>
    </table>
</div>



