<script type="text/javascript" src="<?php echo base_url();?>scripts/users/operation.js"></script>

<?php
    $this->load->helper('form');
    $uid = $user['uid'];
    $psw = $user['psw'];
    $email = $user['email'];

    echo '<div align="center">';

    echo '<table>';
    echo '<form>';
    echo '<tr><td><label>UserName:</label><input type="text" id="uid" readonly="readonly" value="', $uid , '"></td></tr>';
    echo '<tr><td><label>Password:</label><input type="text" id="psw" value="', $psw , '"></td></tr>';
    echo '<tr><td><label>Email:</label><input type="text" id="email" value="', $email , '"></td></tr>';
    echo '<tr><td><font id="font" color="blue"><span id="message"></span></font></td></tr>';
    echo '<tr><td><input type="button" value="Modify" onclick="modify()"></td></tr>';
    echo '</form>';
    echo '</table>';


    echo '</div>';

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
