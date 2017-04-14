<!DOCTYPE>
<?php
session_start();

 ?>
<html>
  <head>
    <title>
      Lost item finder
    </title>
    <link rel="stylesheet" type="text/css" href="main.css"/>
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
          <img src="images/lostandfound.png"/>
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
            <li><a href="index.php">Home</a></li>
            <li><a href="found_item/index.php">Found an item</a></li>
            <li><a href="lost_item/index.php">Lost an item</a></li>
            <li><a href="customer/account.php">User Account</a></li>
            <?php
              if(isset($_SESSION['user_email'])){
                echo "<li><a href='customer/logout.php'>logout</a></li>";
              }
              else{
                echo "<li><a href='customer/login.php'>login/register</a></li>";
              }
            ?>
          </ul>
        </div>
      </nav>

      <h4 id="moto">finding lost items made possible here.</h4>
    </header>

    <div id="main_content">
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
    </script>
    <script src="includes/functions/functions.js">
    </script>
  </body>
  <footer>
    <h2>&copy; 2017 by www.shoponlineng.com</h2>
  </footer>
</html>
