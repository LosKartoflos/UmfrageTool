<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>getQuestion</title>
    </head>
    <body>
        <?php
        require_once('mysql_connect.php');
        $sql = "SELECT id, question, answer_1, answer_2, answer_3, answer_4 FROM frage";
        $result = mysqli_query($conn, $sql);
        echo $result;
/*
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "id: " . $row["id"] . " - Name: " . $row["firstname"] . " " . $row["lastname"] . "<br>";
            }
        } else {
            echo "0 results";
        }*/


        $conn->close();
        ?>
    </body>
</html>
