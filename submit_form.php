<?php
/**
 * Created by PhpStorm.
 * User: Anakin  Kinsey
 * Date: 2/25/2019
 * Time: 6:26 PM
 */
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log Hours</title>
    <link rel="stylesheet" href="style.css"/>
    <?php
    //$db=mysqli_connect("ccuresearch.coastal.edu:1433", "askinsey", "OXPrmka5") or die ('I cannot connect to the database because: ' . mysqli_error($link));
    $servername = "localhost";
    $username = "askinsey";
    $password = "askinsey";
    $dbname = "askinsey";

    //$conn = db_connect.php;
    try {
        $conn = new mysqli($servername, $username, $password, $dbname);
        echo "Connected successfully";
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
        echo "using password $password";
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = ($_POST["name"]);
        $hours = ($_POST["hours"]);
        $date = ($_POST["date"]);
        $summary = ($_POST["service_summary"]);
    }

    $sql = "INSERT INTO `askinsey`.`Students` (`Name`, `Hours`, `Date`, `Description`) VALUES ('Anakin Kinsey', '$hours', '$date', '$summary')";

    if($conn->query($sql) === TRUE)
    {
        //echo 'successful';
    }
    else
        //echo 'not successful';
    ?>


</head>

<body>
<nav>
    <div class ="navbar">
        <a href="home.html">Home</a>
        <a href="input_form.php">Hour Logger</a>
        <a href=".html">View Hours</a>
        <a href=".html">Help</a>

    </div>
</nav>


<div align= "center">
    <h1>Hour Logging Details</h1>

    <br>
    Hours Logged: <?php echo $_POST["hours"];?><br>
    Date: <?php echo $_POST["date"];?><br>
    Description: <?php echo $_POST["service_summary"];?>

</div>

</body>
