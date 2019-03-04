<!DOCTYPE html>
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
    $validInfo = true;

    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error)
    {
        die("Connection failed: ". $conn->connect_error);
    }



    $hourErr = $dateErr = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["hours"]))
        {
            $hourErr = "Hours are required";
            $validInfo = false;
        }
        elseif(!preg_match("0-999", $_POST["hours"]))
        {
            $hourErr = "Must be valid number above 0!";
            $validInfo = false;
        }
        else {$hours = $_POST["hours"];}

        if(empty($_POST["date"]))
        {
            $dateErr = "Date is required";
            $validInfo = false;
        }
        else {$date = $_POST["date"];}

        $summary = $_POST["service_summary"];

        if($validInfo)
        {
            //echo "valid";
            $sql = "INSERT INTO `askinsey`.`Students` (`Name`, `Hours`, `Date`, `Description`) VALUES ('Anakin Kinsey', '$hours', '$date', '$summary')";

            if($conn->query($sql) == TRUE)
            {
                //echo "Hours Added";
            }
            else
            {echo "Hours not Added";}
        }



    }



    $conn->close();

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
    <h5>Temp User</h5>
</div>
<div align="center">
    <h1>
        Log Hours</h1>
</div>

</div>

<div align="center">
    <d3>Submitting hours for 'insert frat'</d3>
    <div class="LoggingForms">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            Hours Worked:
            <input size = "6" type="number" placeholder="Hours" name="hours">
            <span class="error">* <?php echo $hourErr;?></span><br>
            Select Date:
            <input type="date" name = "date" min="2000-01-02" max="2099-01-02">
            <span class="error">* <?php echo $dateErr;?></span><br>
            Give a short description:
            <!--<input maxlength="100"  type="textarea" placeholder="Summary of Service">-->
            <textarea draggable="false" maxlength="100" rows = "3" cols="30" placeholder="Summary of Service" name="service_summary"></textarea>
            <br>
            <button type="submit">Submit</button><br><br>
            <h5 class="error">* is required</h5>
        </form>
    </div>
</div>

</body>
</html>
</html>