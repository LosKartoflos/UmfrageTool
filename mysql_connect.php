<?php
$servername = "localhost";
$username = "root";
$password = "schnitzel";
$dbname = "umfragetool";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

/*
DEFINE('DB_USER', 'Tester');
DEFINE('DB_PASSWORD', 'test');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'umfragetool');

 $dbc = @mysql_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
  OR dies('Could not Connect to MySQL: ' .  mysql_connect_error()); */
?>