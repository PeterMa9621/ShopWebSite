
<script type="text/javascript" src="<?php echo base_url();?>scripts/users/operation.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>scripts/jquery-3.3.1.min.js"></script>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
</style>

<?php
    if(isset($msg)){
        if($msg=="succeed"){
            echo "Modify successfully!";
        } else if($msg=="error") {
            echo "Failed to modify!";
        }
    }
?>

<div align="center">
    <table>
        <tr>
            <th>UserName</th>
            <th>Email</th>
            <th>Operation</th>
        </tr>
    <?php
        foreach ($users as $user){
            $uid = $user['uid'];
            $email = $user['email'];
            echo "<form id='form'>\n\t<tr>\n\t\t";
            echo "<td id='uid'>", $uid, "</span></td>\n\t\t<td id='email'>", $email, "</td>\n\t\t";
            echo "<td><button type='button' value='detail' onclick='operate(this, \"detail\")'>View Detail</button>  ",
                    "<button type='button' value='delete' onclick='operate(this, \"delete\")'>Delete</button></td>\n\t";
            echo "</tr>\n</form>\n";
        }
    ?>
    </table>
</div>