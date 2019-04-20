<?php
if(isset($_POST["name"])){
    $name = $_POST["name"];
} else {
    $name = "";
}
?>
<script type="text/javascript" src="<?php echo base_url();?>scripts/login/loginDetection.js"></script>

<h1 align="center"><?php $title ?></h1>
<div align="center">
    <table align="center">
        <form action="<?php echo base_url()?>login/login" method="post" id="form">
            <tr>
                <td>
                    <label>UserName:</label><input type="text" name="name" id="name"
                                            value=<?php echo $name ?>>
                </td>
            </tr>
            <tr>
                <td><label id="uid_result"></label></td>
            </tr>
            <tr>
                <td>
                    <label>Password:</label><input type="text" name="psw" id="psw">
                </td>
            </tr>
            <tr>
                <td><label id="psw_result"></label></td>
            </tr>
            <tr>
                <td>
                    <label id="result_msg"></label>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <input type="button" value="Login" onclick="loginDetection()">
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



