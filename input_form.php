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

    //$conn = db_connect.php;
    try {
        $conn = new mysqli($servername, $username, $password, $dbname);
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
    <h1>
        Log Hours</h1>
</div>

<div><h1><?php
        /*
        $sql = "SELECT Name, ID, age, grade FROM Test";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        echo "id: " . $row["ID"]. " - Name: " . $row["Name"]. " " . $row["grade"]. "<br>";
        }
        } else {
        echo "0 results";
        }
        $conn->close();
        */
        ?></h1>

</div>

<div align="center">
    <d3>Submitting hours for 'insert frat'</d3>
    <div class="LoggingForms">
        <form action="submit_form.php" method="post">
            Hours Worked:
            <input size = "6" type="number" placeholder="Hours" name="hours"><br>
            Select Date:
            <input type="date" name = "date" min="2000-01-02" max="2099-01-02"><br>
            Give a short description:
            <!--<input maxlength="100"  type="textarea" placeholder="Summary of Service">-->
            <textarea draggable="false" maxlength="100" rows = "3" cols="30" placeholder="Summary of Service" name="service_summary"></textarea><br>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>

</body>
</html>
</html>