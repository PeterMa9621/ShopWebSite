<div align="center">
    <?php
    $home_url = base_url();
    echo '<a href="', $home_url, '">Home</a> ';

    $users_url = base_url() . "users/index";
    echo '<a href="', $users_url, '">Users</a> ';

    $login_url = base_url() . "login/index";
    if($this->session->userdata('user')!=null)
        echo '<a href="', $login_url, '">Logout</a> ';
    else
        echo '<a href="', $login_url, '">Login</a> ';
    ?>
</div>
<!-- The variable title comes from $data['title'] -->
<h1 align="center">
    <?php
    if(isset($title)){
        echo $title;
    }
    ?>
</h1>