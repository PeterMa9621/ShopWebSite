<html>
<head>
    <title>
        <?php
            if(isset($title)){
                echo $title;
            }
        ?>
    </title>
</head>
<body>

<!-- The variable title comes from $data['title'] -->
<h1 align="center">
    <?php
        if(isset($title)){
            echo $title;
        }
    ?>
</h1>