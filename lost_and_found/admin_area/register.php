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
      <h2>Admin Regsitration</h2>
      <form method="post">
        <div>
          <input type="text" name="user_email" placeholder="email" required/><br/><br/>

          <input type="password" name="user_pass" placeholder="password" required/><br/><br/>
        </div>

        <div>
          <button type="submit" name="login">Register</button><br/><br/>
        </div>
      </form>

      <a href="login.php" id="register">login</a><br/><br/>
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

    $sel_user = "select * from admins where admin_email='$email'";

    $run_user = mysqli_query($con, $sel_user);

    $check_user = mysqli_num_rows($run_user);

    if($check_user==0){

      $ins_admin = "insert into admins (admin_email, admin_pass) values('$email', '$pass')";

      $run_admin = mysqli_query($con, $ins_admin);

      if($run_admin){

        $_SESSION['admin_email'] = $email;

        echo "<script>alert('Regsitration complete')</script>";

        echo "<script>window.open('index.php', '_self')</script>";
      }else {
        echo "<script>alert('Regsitration not successfully')</script>";
      }

    }
    else{
      echo "<script>alert('User already exists')</script>";
    }

  }
?>
