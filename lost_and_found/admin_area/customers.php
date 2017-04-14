<!DOCTYPE>

<?php
session_start();
if(!isset($_SESSION['admin_email'])){

  echo "<script>window.open('../admin_area/login.php?not_admin=You are not an Admin!','_self')</script>";
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
            if(isset($_SESSION['admin_email'])){
              echo "<b>Welcome </b>" . $_SESSION['admin_email'];
            }
            else{
              echo "<b>Welcome Guest</b>";
            }
          ?>

        </p>
		
		<div id="menu">
          <ul>
            <li><a href="javascript:void(0)">Customers</a></li>
            <li><a href="javascript:void(0)">Found items</a></li>
            <li><a href="javascript:void(0)">Lost items</a></li>
            <li><a href="javascript:void(0)">Matched items</a></li>
            <?php
              if(isset($_SESSION['admin_email'])){
                echo "<li><a href='../admin_area/logout.php'>logout</a></li>";
              }
              else{
                echo "<li><a href='../admin_area/login.php'>login/register</a></li>";
              }
            ?>
          </ul>
        </div>

      </nav>
    </header>

    <div id="main_content">
      
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
