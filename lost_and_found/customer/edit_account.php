<!DOCTYPE>
<?php
session_start();
include("../includes/db.php");
if(!isset($_SESSION['user_email'])){

  echo "<script>window.open('../customer/login.php?not_logged_in=You are not logged_in!','_self')</script>";
}
else{
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
        <div id="sub_menu">
          <ul>
            <li><a href="account.php">My Account</a></li>
            <li><a href="#">Edit Account</a></li>
            <li><a href="#">Matched Items</a></li>
            <li><a href="#">Delete Account</a></li>
          </ul>
        </div>

      </nav>
    </header>

    <div id="main_content">
      <?php

        $customer_email = $_SESSION['user_email'];
        $sel_user = "select * from customer where customer_email = '$customer_email'";
        $run_sel = mysqli_query($con, $sel_user);
        if($run_sel){
          $row_sel = mysqli_fetch_array($run_sel);
          $customer_name = $row_sel['customer_name'];
        }else {
          echo "<script>alert('Not found')</script>";
        }
      ?>

      <form>
        <div>
          <input type="text" name="ac_name"
        </div>
        <div>
        </div>
        <div>
        </div>
        <div>
        </div>
        <div>
        </div>
      </form>
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
<?php } ?>
