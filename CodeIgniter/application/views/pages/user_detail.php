<script type="text/javascript" src="<?php echo base_url();?>scripts/users/operation.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>scripts/jquery-3.3.1.min.js"></script>
<?php
    $this->load->helper('form');
    $uid = $user['uid'];
    $psw = $user['psw'];
    $email = $user['email'];
    if($canModify){
        echo '<form method="post" action="/CodeIgniter/index.php/users/modify">';
        echo '<input type="text" readonly="readonly" id="uid" value="', $uid, '">';
        echo '<input type="text" id="psw" value="', $psw, '">';
        echo '<input type="text" id="email" value="', $email, '">';
        echo '<p><span id="message"></span></p>';
        echo '<p><input type="button" value="Modify" onclick="modify()"></p>';
        echo '</form>';
    } else {
        echo $uid, ", ", $psw, ", ", $email;
    }
    /*
    $data=array(
        'name' =>'url',
        'id' =>'url',
        'value' =>'www.mysite.com'
    );
    $variable=form_textarea($data);
    echo $variable;
    $data=array(
        'name' => 'url',
        'id' => 'url',
        'value' => 'www.mysite.com',
        'maxlength' => '100',
        'size' => '50',
        'style' => 'yellow'
    );
    $variable=form_input($data);
    echo $variable;
    */
