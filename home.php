<home.html>
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



<div class ="navbar">
  <a href="home.html">Home</a>
  <a href=".html">Hour Logger</a>
  <a href=".html">View Hours</a>
  <a href=".html">Help</a>
  <div class="login-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Username" name="username">
      <input type="text" placeholder="Password" name="psw">
      <button type="submit">Login</button>
    </form>
  </div>
</div>


<button class="open-button" onclick="openForm()">Create Account</button>

<div class="form-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
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