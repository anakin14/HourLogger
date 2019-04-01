<?php


$servername = "localhost";
$username = "askinsey";
$password = "askinsey";
$dbname = "askinsey";

//$conn = db_connect.php;

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>