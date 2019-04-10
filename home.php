
<html>
<head>
<title>hourLogger</title>

<link rel="stylesheet" href="style.css"/>

  <?php
    //$db=mysqli_connect("ccuresearch.coastal.edu:1433", "askinsey", "OXPrmka5") or die ('I cannot connect to the database because: ' . mysqli_error($link));


  include ('db_connect.php');

  $name_err = $frat_err = "";

  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (!empty($_POST["username"]) && !empty($_POST["psw"])) {
          $username = $_POST["username"];
          $password = $_POST["psw"];
          try {
              $sql = "SELECT id, admin, password FROM `askinsey`.`Users` WHERE username = '$username'";
              $result = $conn->query($sql);
          }
          catch (mysqli_sql_exception $exception)
          {
              echo $exception;
          }

          if ($result->num_rows > 0) {
              //echo "yes";
              //checks username and password if correct logs in
              while ($row = $result->fetch_assoc()) {
                  //echo $row["password"];
                  if ($row["password"] == $password)
                  {
                          //$_SESSION["loggedin"] = true;
                          //$_SESSION["name"] = $username;
                            $_SESSION["id"] = $row["id"];

                            if($row["admin"] == 1)
                            {
                                $_SESSION["admin"] = 1;
                                header("location: admin.php");
                                exit;
                            }
                            else
                            {


                                header("location: input_form.php");
                                exit;
                            }
                  }
                  }


                  //echo $result->num_rows;

          }
          else {
                      $invalid_login = "Invalid";
                  }

          }
      if(!empty($_POST["created_psw"]))
      {
          $name = $_POST["name"];
          $first_name = $_POST["first_name"];
          $last_name = $_POST["last_name"];
          $frat = $_POST["frat"];
          $created_psw = $_POST["created_psw"];

          try {
              $sql = "SELECT `first_name`, `last_name`, `frat`, `password`, `id`, `username` FROM `askinsey`.`Users` WHERE username = '$name'";
              $result = $conn->query($sql);
          }
          catch (mysqli_sql_exception $exception)
          {
              echo $exception;
          }

          if($result->num_rows > 0)
          {
              $name_err = "This username is already taken!";
          }
          else
          {
              try{
                  $sql = "INSERT INTO `askinsey`.`Users` (`first_name`, `last_name`, `frat`,`password`, `username` ) VALUES ('$first_name', '$last_name', '$frat', '$created_psw', '$name')";
                  $result = $conn->query($sql);
                }
                catch (mysqli_sql_exception $exception)
                {
                    echo $exception;
                }

          }

      }

  }
            //echo $result->num_rows;


    // Check if the user is already logged in, if yes then redirect him to welcome page
  /*
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: input_form.php");
        exit;
}
  */
  if(isset($_SESSION["id"]) && isset($_SESSION["admin"]))
  {
      header("location: admin.php");
      exit;
  }
  else if(isset($_SESSION["id"]))
  {
      header("location: input_form.php");
      exit;
  }
  ?>

</head>
<body>



<div class ="navbar">
    <?php
        include ('menu.php');
    ?>
  <div class="login-container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <input type="text" placeholder="Username" name="username">
      <input type="password" placeholder="Password" name="psw">
        <h5 class="error"><?php echo $invalid_login ?></h5>
      <button type="submit">Login</button>
    </form>
  </div>
</div>


<button class="open-button" onclick="openForm()">Create Account</button>

<div class="form-popup" id="myForm">

    <
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form-container" method="post">
    <h1>New Account</h1>


    <input type="text" placeholder="Enter Username" name="name" required>
      <h5><?php echo $name_err?></h5>
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
      
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
    /* When the user clicks on the button, toggle between hiding and showing the dropdown content */
    function myFunction()
    {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event)
    {
        if (!event.target.matches('.dropbtn'))
        {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++)
            {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show'))
                {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

</script>



</body>