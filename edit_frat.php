<?php
/**
 * Created by PhpStorm.
 * User: Anakin  Kinsey
 * Date: 4/13/2019
 * Time: 1:11 PM
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


    $invalid_frat = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        if(!empty($_POST["add_frat"])) {
            try {
                $add_frat = $_POST["add_frat"];
                $sql = "SELECT * FROM Frat WHERE `frat` = '$add_frat'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $invalid_frat = "Frat name already in use";
                } else {
                    $sql = "INSERT INTO `Frat`(`frat`) VALUES ('$add_frat')";
                    $conn->query($sql);
                }
            } catch (mysqli_sql_exception $exception) {
                die($exception->getMessage());
            }
        }
        else
        {
            try{
                $remove_frat = $_POST["remove_frat"];
                $sql = "DELETE FROM `Frat` WHERE `frat` = '$remove_frat'";
                $result = $conn->query($sql);

            }
            catch (mysqli_sql_exception $exception)
            {
                die($exception->getMessage());
            }
        }

        header("location: admin.php");
        exit;
    }






?>

<html lang="en">
<head>
    <title>Remove Frat</title>
    <link rel="stylesheet" href="style.css"/>
</head>

<body>
<?php
    include ('menu.php');
?>

    <div class="main-content" align="center">
        <h3>Remove Frat</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-container" method="post">
            <select name="remove_frat" id="frat">
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
        <br>
    </div>
    <br>
    <br>
    <div class="main-content" align="center">
        <h3>Add Frat</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-container" method="post">
            <input type="text" placeholder="Add Frat" name="add_frat" required>
            <button type="submit" class="btn">Submit</button>
            <h5 class="error"><?php echo $invalid_frat ?></h5>
        </form>
        <br>
        <br>
    </div>
</body>



</html>
