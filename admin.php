<?php
/**
 * Created by PhpStorm.
 * User: Adrien Pew
 * Date: 3/20/2019
 * Time: 1:20 PM
 */
?>
<html lang="en">
<head>

    <link rel="stylesheet" href="style.css"/>


    <title>Admin</title>

<?php
    include ('db_connect.php');
?>

</head>

<body>

<?php
include('menu.php');
?>
<div class="main-content" align="center">
    <h1>Administrators</h1>
    <br>
    <h3>Use above menu options to perform administrative commands</h3>
</div>

<label for="frat">Chapter</label>
<select name="frat" id="frat">
    <?php
    $sql = "SELECT * FROM `Frat`";
    $result = $conn->query($sql);
    //echo "<option>1</option>";

    while ($row = $result->fetch_assoc()) {

        $fratList = $row["frat"];
        echo "<option>$fratList</option>";

    }
    ?>
</select>


<table width='80%' border="0">
    <tr bgcolor="teal">
        <td>id</td>
        <td>hours</td>
        <td>date</td>
        <td>description</td>
    </tr>
    <?php
    $result = mysqli_query($sql, "SELECT * FROM users ORDER BY id DESC");
        try {

            if ($conn->query($sql) == TRUE) {
                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc($sql)) {
                    $id = $row["id"];
                    $date = $row["Date"];
                    $Hours = $row["Hours"];
                    $Description = $row{"Description"};
                    echo "<tr>
                            <td>$id</td>
                            <td>$date</td>
                            <td>$Hours</td>
                            <td>$Description</td>
                          </tr>";

                }
            } else {
                echo "Not connected";
            }

        } catch (mysqli_sql_exception $exception) {
            die($exception->getMessage());
        }

    ?>
</table>





</body>

</html>
