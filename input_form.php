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

    //$conn = db_connect.php;
    try {
        $conn = new PDO("mysql:host=$servername;dbname=askinsey", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
        echo "using password $password";
    }

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
<div align="center">
    <h1>Log Hours</h1>
</div>

<div align="center">
    <d3>Submitting hours for 'insert frat'</d3>
    <div class="LoggingForms">
        <form action="/submit_form.php">
            Hours Worked:
            <input size = "6" type="number" placeholder="Hours" name="hoursLogged"><br>
            Select Date:
            <input type="date" name = "date" min="2000-01-02" max="2099-01-02"><br>
            Give a short description:
            <!--<input maxlength="100"  type="textarea" placeholder="Summary of Service">-->
            <textarea draggable="false" maxlength="100" rows = "3" cols="30" placeholder="Summary of Service" name="serviceSummary"></textarea><br>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>

</body>
</html>
</html>