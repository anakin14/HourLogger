<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log Hours</title>
    <link rel="stylesheet" href="style.css"/>
    <?php
    session_start();
    if(!isset($_SESSION["id"])){
        header("location: home.php");
        exit;
    }

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



    $hourErr = $dateErr = $frat = "";

    //$un = $_SESSION["name"];
    $id = $_SESSION["id"];

    //echo "user $un";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["hours"]))
        {
            $hourErr = "Hours are required";
            $validInfo = false;
        }
        elseif(!is_numeric($_POST["hours"]) || $_POST["hours"] <= 0)
        {
            $hourErr = "Must be > 0";//"Must be valid number above 0!";
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
            $sql = "INSERT INTO `askinsey`.`Students` (`Name`, `Hours`, `Date`, `Description`) VALUES ('$id', '$hours', '$date', '$summary')";

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
        <a href="home.php">Home</a>
        <a href="input_form.php">Hour Logger</a>
        <a href=".html">View Hours</a>
        <a href=".html">Help</a>

    </div>
</nav>
    <a href="logout.php">Logout</a>
</div>
<div align="center">
    <h1>
        Log Hours</h1>
</div>

</div>
<div align="center">
    <d3>Submitting hours for <?php
        //echo $un;

        $sql = "SELECT * FROM `askinsey`.`Users` WHERE id = $id";
        /*
        echo $sql;
        $result = $conn->query($sql);
        echo $result;
        if($result->num_rows > 0) {
            echo "yes";
            while ($row = $result->fetch_assoc()) {
                $frat = $row["frat"];
            }
        }
        echo $frat;
        */

        if($res = $conn->query($sql)){
            echo "yes";
        }

        ?>



    </d3>
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