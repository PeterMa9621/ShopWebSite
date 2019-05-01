
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
</style>

<div align="center">
    <table>
        <tr>
            <form action="<?php echo base_url()?>users/index" method="get">
                <td>
                    <input type="text" name="uid" id="uid">
                </td>
                <td>
                    <input type="submit">
                </td>
            </form>
        </tr>
        <tr>
            <th>Title</th>
            <th>UserName</th>
            <th>Date</th>
        </tr>
    <?php
        foreach ($posts as $post){
            $uid = $post['uid'];
            $email = $post['email'];
            echo "<form id='form'>\n\t<tr>\n\t\t";
            echo "<td id='uid'>", $uid, "</span></td>\n\t\t<td id='email'>", $email, "</td>\n\t\t";
            echo "<td><button type='button' value='detail' onclick='operate(this, \"detail\")'>View Detail</button>  ",
                    "<button type='button' value='delete' onclick='operate(this, \"delete\")'>Delete</button></td>\n\t";
            echo "</tr>\n</form>\n";
        }
    ?>
    </table>
</div>