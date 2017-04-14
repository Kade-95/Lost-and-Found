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

        <p>

          <?php
            if(isset($_SESSION['user_email'])){
              echo "<b>Welcome </b>" . $_SESSION['user_email'];
            }
            else{
              echo "<b>Welcome Guest</b>";
            }
          ?>

        </p>

        <div id="menu">
          <ul>
            <li><a href="../index.php">Home</a></li>
            <li><a href="../found_item/index.php">Found an item</a></li>
            <li><a href="../lost_item/index.php">Lost an item</a></li>
            <li><a href="account.php">User Account</a></li>
            <?php
              if(isset($_SESSION['user_email'])){
                echo "<li><a href='../customer/logout.php'>logout</a></li>";
              }
              else{
                echo "<li><a href='../customer/login.php'>login/register</a></li>";
              }
            ?>
          </ul>
        </div>
      </nav>
    </header>

    <div id="login_content">
      <h2>Customer login</h2>
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

    $sel_user = "select * from customer where customer_email='$email' AND customer_pass='$pass'";

    $run_user = mysqli_query($con, $sel_user);

    $check_user = mysqli_num_rows($run_user);

    if($check_user==0){

      echo "<script>alert('Email or Password incorrect!')</script>";

    }
    else{

      $_SESSION['user_email'] = $email;

      echo "<script>window.open('../index.php?logged_in=You have successfully logged in!', '_self')</script>";
    }

  }
?>
