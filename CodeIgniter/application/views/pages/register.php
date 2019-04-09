<?php $this->load->helper("url_helper") ?>


<script src="<?php echo base_url(); ?>application/script/checkPsw.js"></script>
<form>
    UserName:
    <input type="text" id="name"
           onkeyup="searchName(this.value)">
    <p><span id="name_result"></span></p>
    Password:
    <input type="text" id="psw"
           onkeyup="checkPassword(this.value)">
    <p><span id="psw_result"></span></p>
</form>

