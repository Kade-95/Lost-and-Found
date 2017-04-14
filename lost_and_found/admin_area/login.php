<!DOCTYPE>
<?php
session_start();

 ?>
<html>
  <head>
    <title>
      Lost item finder
    </title>
    <link rel="stylesheet" type="text/css" href="../main.css"/>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway:700" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway:300" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway:200" />
  </head>
  <body>

    <div id="leftnav">
    </div>

    <header>
      <nav>
        <a href="index.php">
          <img src="../images/lostandfound.png"/>
        </a>

      </nav>
    </header>

    <div id="login_content">
      <h2>Admin login</h2>
      <form method="post">
        <div>
          <input type="text" name="user_email" placeholder="email" required/><br/><br/>

          <input type="password" name="user_pass" placeholder="password" required/><br/><br/>
        </div>

        <div>
          <button type="submit" name="login">Login</button><br/><br/>
        </div>
      </form>

      <a href="register.php" id="register">Register</a><br/><br/>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
    </script>
    <script src="functions.js">
    </script>
  </body>
  <footer>
    <h2>&copy; 2017 by www.shoponlineng.com</h2>
  </footer>
</html>

<?php

  include("../includes/db.php");

  if(isset($_POST['login'])){

    $email = mysqli_real_escape_string($con, $_POST['user_email']);
    $pass = mysqli_real_escape_string($con, $_POST['user_pass']);

    $sel_user = "select * from admins where admin_email='$email' AND admin_pass='$pass'";

    $run_user = mysqli_query($con, $sel_user);

    $check_user = mysqli_num_rows($run_user);

    if($check_user==0){

      echo "<script>alert('Email or Password incorrect!')</script>";

    }
    else{

      $_SESSION['admin_email'] = $email;

      echo "<script>window.open('index.php?logged_in=You have successfully logged in!', '_self')</script>";
    }

  }
?>
