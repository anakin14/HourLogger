<?php
/**
 * Created by PhpStorm.
 * User: Adrien Pew
 * Date: 4/14/2019
 * Time: 4:33 PM
 */


session_start();
if(!isset($_SESSION["id"])){
    header("location: home.php");
    exit;
}
include ('db_connect.php');
try {
    $sql = "SELECT * FROM Frat;";
    if ($conn->query($sql) == TRUE) {
        $result = $conn->query($sql);
        //echo $result;
    }
}
catch (mysqli_sql_exception $exception)
{
    die($exception ->getMessage());
}
//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table
$result = mysqli_query($sql, "DELETE FROM users WHERE id=$id");

//redirecting to the display page (index.php in our case)
header("Location: admin.php");