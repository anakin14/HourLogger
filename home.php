<home.html xmlns="http://www.w3.org/1999/html">
<html>
<head>
<title>hourLogger</title>

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
        echo "Connected successfully";
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
        echo "using password $password";
  }


  if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!empty($_POST["username"]) && !empty($_POST["psw"]))
        {
            $username = $_POST["username"];
            $password = $_POST["psw"];
            $sql = "SELECT id, username, password FROM `askinsey`.`Users` WHERE username = $username";
            $result = $conn->query($sql);
            echo "trying $username with $password";
            if($result->num_rows > 0)
            {
                while($row = $result->fetch_assoc()) {
                    echo $row["psw"];
                    if ($row["psw"] == $password)
                    {
                        $_SESSION["loggedin"] = true;
                    }
                }
            }
            else
            {
                $invalid_login = "Invalid";
            }

        }



  }

    // Initialize the session
    //session_start();


    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: input_form.php");
        exit;
}
  ?>

</head>
<body>



<div class ="navbar">
  <a href="home.html">Home</a>
  <a href="input_form.php">Hour Logger</a>
  <a href=".html">View Hours</a>
  <a href=".html">Help</a>
  <div class="login-container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <input type="text" placeholder="Username" name="username">
      <input type="text" placeholder="Password" name="psw">
        <h5 class="error"><?php echo $invalid_login ?></h5>
      <button type="submit">Login</button>
    </form>
  </div>
</div>


<button class="open-button" onclick="openForm()">Create Account</button>

<div class="form-popup" id="myForm">
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-container" method="post">
    <h1>New Account</h1>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Full Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" required>

    <label for="psw"><b>New Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw"><b>Re-enter password</b></label>
    <input type="password" placeholder="Re-nter Password" name="psw" required>

    <button type="submit" class="btn">Create</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>



</body>