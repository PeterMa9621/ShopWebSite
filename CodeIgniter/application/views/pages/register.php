<?php $this->load->helper("url_helper") ?>

<script type="text/javascript" src="<?php echo base_url();?>scripts/register/checkPsw.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>scripts/register/searchUserName.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>scripts/register/signUp.js"></script>
<h4><?php echo $msg; ?></h4>

<div align="center">
    <form id="form" action="/CodeIgniter/register/register" method="post">
        <table>
            <tr>
                <td>
                    <label>UserName:</label>
                    <input type="text" id="name" name="name"
                           onkeyup="searchName(this.value)">
                    <label id="name_result"></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Password:</label>
                    <input type="text" id="psw" name="psw"
                           onkeyup="checkPassword(this.value)">
                    <label id="psw_result"></label>
                </td>
            </tr>
            <tr>
                <td>
                    <label>Email:</label>
                    <input type="text" id="email" name="email">
                    <label id="email_result"></label>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="button" id="register" hidden="hidden" onclick="signUp()">Sign up</button>
                </td>
            </tr>
        </table>
    </form>
</div>