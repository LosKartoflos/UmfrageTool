<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        require_once('../mysqli_connect.php');

        $query = "SELECT Question, Answer1 FROM frage";

        $response = @mysql_query($dbc, $query);
        ?>
    </body>
</html>
