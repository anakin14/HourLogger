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
    $sql = "SELECT * FROM Users;";
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


    if(!empty($_POST["name"])) {
        $name = $_POST["name"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $frat = $_POST["frat"];
        $created_psw = $_POST["created_psw"];

        try {
            $sql = "SELECT `first_name`, `last_name`, `frat`, `password`, `id`, `username` FROM `askinsey`.`Users` WHERE username = '$name'";
            $result = $conn->query($sql);


            if($result->num_rows == 0)
            {
                $sql = "INSERT INTO `askinsey`.`Users` (`first_name`, `last_name`, `frat`,`password`, `username` ) VALUES ('$first_name', '$last_name', '$frat', '$created_psw', '$name')";
                $result = $conn->query($sql);
            }
        }
        catch (mysqli_sql_exception $exception)
        {
            echo $exception;
        }
    }
    else
    {
        try{
            $remove_student = $_POST["remove_student"];
            $sql = "DELETE FROM `Frat` WHERE `frat` = '$remove_student'";
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
    <title>Edit Students</title>
    <link rel="stylesheet" href="style.css"/>
</head>

<body>
<?php
include ('menu.php');
?>


    <div class="main-content" align="center">
        <h3>Remove Student</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-container" method="post">
            <select name="remove_student" id = "remove_student">
                <?php
                while ($row = $result->fetch_assoc()) {

                    $firstName = $row["first_name"];
                    $lastName = $row["last_name"];
                    $id = $row["id"];
                    echo "<option>$firstName $lastName ($id)</option>";

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
        <h3>Add Student</h3>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-container" method="post">

            <input type="text" placeholder="Enter Username" name="name" required>
            <input type="text" placeholder="First Name" name="first_name" required>
            <input type="text" placeholder="Last Name" name="last_name" required>
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
            <input type="password" placeholder="Enter Password" name="created_psw" required>
            <button type="submit" class="btn">Submit</button>
        </form>
        <br>
        <br>
    </div>
</body>



</html>
