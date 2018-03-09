<?php
$servername = "192.168.56.12";
$username = "devops";
$password = "redhat";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Ooops, there has been a problem while connecting to the DB" . $conn->connect_error);
}
echo "Awesome ! connected to the database";
?>
