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
             echo "<b>Welcome </b>" . $_SESSION['admin_email'];
          ?>

        </p>

		<div id="menu">
          <ul>
            <li><a href="index.php">Customers</a></li>
            <li><a href="found_items.php">Found items</a></li>
            <li><a href="lost_items.php">Lost items</a></li>
            <li><a href="matched_items.php">Matched items</a></li>
            <li><a href="location/index.php">Add Location</a></li>
            <li><a href='../admin_area/logout.php'>logout</a></li>
          </ul>
        </div>

      </nav>
    </header>

    <div id="main_content">

      <?php

        include("../includes/db.php");

        $get_id = $_GET['found_item'];
        $get_item = "select * from found_item where found_id='$get_id'";
        $run_get = mysqli_query($con, $get_item);
        $row_get = mysqli_fetch_array($run_get);

        if($row_get){
          $finder_email = $row_get['finder_email'];
          $item_name = $row_get['item_name'];
          $item_image = $row_get['item_image'];
          $item_desc1 = $row_get['item_desc1'];
          $item_desc2 = $row_get['item_desc2'];
          $item_desc3 = $row_get['item_desc3'];
          $item_desc4 = $row_get['item_desc4'];
        }
       ?>

       <div id="details">
         <h2><?php echo $item_name;?></h2>
         <img src='../found_item/images/<?php echo $item_image;?>' />
         <h2>Details</h2>
         <ul>
           <li><?php echo $item_desc1;?></li>
           <li><?php echo $item_desc2;?></li>
           <li><?php echo $item_desc3;?></li>
           <li><?php echo $item_desc4;?></v>
         </ul>
       </div>


    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
    </script>
    <script src="../functions/functions.js">
    </script>
  </body>
  <footer>
    <h2>&copy; 2017 by www.shoponlineng.com</h2>
  </footer>
</html>
<?php } ?>
