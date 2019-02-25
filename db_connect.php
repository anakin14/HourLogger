<?php
/**
 * Created by PhpStorm.
 * User: Anakin  Kinsey
 * Date: 2/18/2019
 * Time: 1:44 PM
 */



echo 'test';
//$myPDO = new PDO('mysql:host=ccuresearch.coastal.edu:1433;dbname=askinsey', 'ooioiaskinsey', 'OXPrmka5')or die ('I cannot connect to the database because: ' . mysqli_error($link));

    //$db=mysqli_connect("ccuresearch.coastal.edu:1433", "askinsey", "OXPrmka5") or die ('I cannot connect to the database because: ' . mysqli_error($link));


$servername = "localhost";
$username = "askinsey";
$password = "askinsey";

try {
    $conn = new PDO("mysql:host=$servername;dbname=askinsey", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
    echo "using password $password";
}






