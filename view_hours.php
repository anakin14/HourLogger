<?php
/**
 * Created by PhpStorm.
 * User: Anakin  Kinsey
 * Date: 2/25/2019
 * Time: 6:26 PM
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
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Hours</title>
    <link rel="stylesheet" href="style.css"/>
    <?php
    include ("db_connect.php");
    $id = $_SESSION["id"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = ($_POST["name"]);
        $hours = ($_POST["hours"]);
        $date = ($_POST["date"]);
        $summary = ($_POST["service_summary"]);
    }
    ?>

</head>

<body>
<?php
    include ('menu.php');
?>


<div class="main-content" align="center">
    <h3>Which Frat's Hours</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-container" method="post">
        <select name="frat" id="frat">
            <?php
            while ($row = $result->fetch_assoc()) {

                $fratList = $row["frat"];
                echo "<option>$fratList</option>";

            }
            ?>
        </select>
        <button type="submit" class="btn">Submit</button>
    </form>
<br>



<table width='80%' border="1">
    <tr bgcolor="teal">
        <td>id</td>
        <td>hours</td>
        <td>date</td>
        <td>description</td>
    </tr>
<?php

        try {

                if ($conn->query($sql) == TRUE) {
                    $result = $conn->query($sql);

                    while ($res = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>".$res['id']."</td>";
                        echo "<td>".$res['date']."</td>";
                        echo "<td>".$res['hours']."</td>";
                        echo "<td>".$res['description']."</td>";
                        echo "<td><a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";

                    }
                } else {
                    echo "Not connected";
                }

        } catch (mysqli_sql_exception $exception) {
            die($exception->getMessage());
        }

?>
</table>
</div>

</body>

