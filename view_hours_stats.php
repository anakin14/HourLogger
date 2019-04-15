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
    <h3>Which Frats Hours</h3>
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




<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $frat = $_POST["frat"];
        $sql = "SELECT * FROM Students WHERE frat = '$frat';";
        $result = $conn->query($sql);
        if($result->num_rows > 0) {
            echo "<table width='80%' border=\"1\">";
            echo "<tr bgcolor=\"teal\">";
            echo "<td>id</td>";
            echo "<td>hours</td>";
            echo "<td>date</td>";
            echo "<td>description</td>";
            echo "</tr>";
            /*
            while ($res = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>".$res['id']."</td>";
                echo "<td>".$res['date']."</td>";
                echo "<td>".$res['hours']."</td>";
                echo "<td>".$res['description']."</td>";
                echo "<td><a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";

            }
            */

            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $date = $row["Date"];
                $Hours = $row["Hours"];
                $Description = $row{"Description"};
                echo "<tr>
                                <td>$id</td>
                                <td>$date</td>
                                <td>$Hours</td>
                                <td>$Description</td>
                              ";
                echo "<td><a href=\"delete.php?id=$id&description=$Description\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td></tr>";

            }
        }
        else
        {
            echo "No Hours for this frat";
        }
    } catch (mysqli_sql_exception $exception) {
        die($exception->getMessage());
    }
}
?>
</table>
</div>

</body>

