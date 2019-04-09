<?php
    foreach ($users as $user){
        echo "<p>", $user['uid'], ", ", $user['email'], "</p>";
    }