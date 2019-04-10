<table align="center" border="1">
    <tr>
        <td>UserName</td>
        <td>Email</td>
        <td>Operation</td>
    </tr>
<?php
    foreach ($users as $user){
        $uid = $user['uid'];
        $email = $user['email'];
        echo "<form action='/CodeIgniter/index.php/users/operateUser'><tr>";
        echo "<td><span id='uid'>", $uid, "</span></td><td>", $email, "</td>";
        echo "<td><button type='submit' value='detail' onclick='operate()'>View Detail</button>  ",
                "<button type='submit' value='modify' onclick='operate()'>Modify</button>  ",
                "<button type='submit' value='delete' onclick='operate()'>Delete</button></td>";
        echo "</tr></form>";
    }
?>
</table>
