<?php
$servername = "localhost";
$username = "salmaa";
$password = "salmaa";
$dbname = "airlines";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>