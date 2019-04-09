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
<div align="center">
    <table>
        <tr>
            <th>Date</th>
            <th>Num Hours</th>
            <th>Description</th>
        </tr>
        <?php

            $sql = "SELECT * FROM Students WHERE id = '$id'";
            if($conn->query($sql) == TRUE)
            {
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()) {
                    $date = $row["Date"];
                    $Hours = $row["Hours"];
                    $Description = $row{"Description"};
                    echo "<tr>
                            <td>$date</td>
                            <td>$Hours</td>
                            <td>$Description</td>
                          </tr>"
                    ;

                }
            }
            else
            {echo "No hours found";}
        ?>
    </table>



</div>

</body>
