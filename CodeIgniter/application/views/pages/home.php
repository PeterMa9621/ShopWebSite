<?php
    $this->load->helper('url_helper');

    if(isset($user['uid'])){
        echo "<h1 align='center'>Welcome, ", $user['uid'], "</h1>";
    }

?>

<div align="center">
    <p> <a href="<?php echo base_url();?>users/index">View Users</a>
        <?php
            $login_url = base_url() . "login/index";
            if($this->session->userdata('user')==null){
                echo '<a href="', $login_url, '">Login</a>';
            } else {
                echo '<a href="', $login_url, '">Logout</a>';
            }
        ?>

        <a href="<?php echo base_url();?>register/index">Register</a>
    </p>
</div>