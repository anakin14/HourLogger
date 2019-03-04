
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

        $conn = new mysqli($servername, $username, $password, $dbname);


     if ($conn->connect_error) {
         die("Connection failed: " . $conn->connect_error);
     }


  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!empty($_POST["username"]) && !empty($_POST["psw"]))
        {
            $username = $_POST["username"];
            $password = $_POST["psw"];
            $sql = "SELECT id, username, password FROM `askinsey`.`Users` WHERE username = '$username'";
            $result = $conn->query($sql);
<<<<<<< HEAD
            echo "trying $username with $password";
            if($result->num_rows > 0)
            {
                //checks username and password if correct logs in
                while($row = $result->fetch_assoc()) {
                    echo $row["psw"];
                    if ($row["psw"] == $password) {
                        echo $row["username"];
                        if ($row["username"] == $username) {
                            $_SESSION["loggedin"] = true;
                        }
<<<<<<< HEAD

                        //echo $result->num_rows;
                        if ($result->num_rows > 0) { //breaks here

                            while ($row = $result->fetch_assoc()) {
                                $pss = $row["password"];
                                echo "$password $pss";
                                if ("$pss" == "$password") {
                                    echo "yes";
                                    $_SESSION["loggedin"] = true;
                                    //echo $username;
                                    $_SESSION["name"] = $username;

                                }

                            }
                        } else {
                            $invalid_login = "Invalid";
                        }

=======
=======
            //echo $result->num_rows;
            if($result->num_rows > 0)
            { //breaks here

                while($row = $result->fetch_assoc()) {
                    $pss = $row["password"];
                    echo "$password $pss";
                    if ("$pss" == "$password")
                    {
                        echo "yes";
                        $_SESSION["loggedin"] = true;
                        //echo $username;
                        $_SESSION["name"] = $username;
>>>>>>> 15f13b22f61b5b83682ce3714d142720b747daa1
>>>>>>> parent of 8286998... ifx
                    }
                    if (!empty($_POST["name"]) && !empty($_POST["created_psw"]) && !empty($_POST["re_psw"]) && !empty($_POST["email"])) {
                        $username = $POST["name"];
                        $email = $POST["email"];
                        $password = $POST["created_psw"];

                        // checks if the username is in use for creating account
                        echo $row["username"];
                        if (!get_magic_quotes_gpc()) {
                            $_POST['name'] = addslashes($_POST['username']);
                        }
                        $usercheck = $_POST['name'];
                        $check = $sql("SELECT username FROM users WHERE username = '$usercheck'")
                        or die($invalid_login = "Invalid");
                        $check2 = $sql($check);
                        //if the name exists it gives an error
                        if ($check2 != 0) {
                            die('Sorry, the username ' . $_POST['username'] . ' is already in use.');
                        }
                    }
                }


  }

    // Initialize the session



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


    <input type="text" placeholder="Enter Email" name="email" required>

    <input type="text" placeholder="Enter Name" name="name" required>

    <input type="password" placeholder="Enter Password" name="created_psw" required>

    <input type="password" placeholder="Re-nter Password" name="re_psw" required>
      
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