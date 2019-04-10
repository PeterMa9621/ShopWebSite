<?php $this->load->helper("url_helper") ?>


<script type="text/javascript" src="<?php echo base_url();?>scripts/register/checkPsw.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>scripts/register/searchUserName.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>scripts/register/signUp.js"></script>
<h4><?php echo $msg; ?></h4>

<form id="form" action="/CodeIgniter/register/register" method="post">
    UserName:
    <input type="text" id="name" name="name"
           onkeyup="searchName(this.value)">
    <p><span id="name_result"></span></p>
    Password:
    <input type="text" id="psw" name="psw"
           onkeyup="checkPassword(this.value)">
    <p><span id="psw_result"></span></p>
    Email:
    <input type="text" id="email" name="email">
    <p><span id="email_result"></span></p>
    <button type="button" id="register" onclick="signUp()">Sign up</button>
</form>