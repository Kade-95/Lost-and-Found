<!DOCTYPE>

<?php
session_start();
  include("../../includes/db.php");
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
    <link rel="stylesheet" type="text/css" href="../../main.css"/>
    <link rel="stylesheet" type="text/css" href="../style.css"/>
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
          <img src="../../images/lostandfound.png"/>
        </a>

        <p>

          <?php
             echo "<b>Welcome </b>" . $_SESSION['admin_email'];
          ?>

        </p>

		<div id="menu">
          <ul>
            <li><a href="../index.php">Customers</a></li>
            <li><a href="../found_items.php">Found items</a></li>
            <li><a href="../lost_items.php">Lost items</a></li>
            <li><a href="../matched_items.php">Matched items</a></li>
            <li><a href="../location/index.php">Add Location</a></li>
            <li><a href='../../admin_area/logout.php'>logout</a></li>

          </ul>
        </div>

      </nav>
    </header>

    <div id="main_content">

      <form method="post">
        <div>
          <select name="state">
						<option>Select state</option>
						<?php
              $get_states = "select * from states";

             $run_get = mysqli_query($con, $get_states);

             while($row_get = mysqli_fetch_array($run_get)){
               $state_id = $row_get['state_id'];
               $state_name = $row_get['state_name'];

               echo "<option value='$state_id'>$state_name</option>";
             }
						?>
					</select>

          <input type="text" name="city" placeholder="City" required/><br/><br/>
        </div>

        <div>
          <button type="submit" name="add_loc">ADD</button><br/><br/>
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

<?php

  if(isset($_POST['add_loc'])){
    $state = mysqli_real_escape_string($con, $_POST['state']);
    $city = mysqli_real_escape_string($con, $_POST['city']);
    $check_state = "select * from states where state_name = '$state'";

    $run_state = mysqli_query($con, $check_state);
    if($run_state){
      $ins_loc = "insert into locations(state_id, city_name) values('$state', '$city')";
      $run_ins = mysqli_query($con, $ins_loc);
      if($run_ins){
        echo "<script>alert('Location inserted.')</script>";
        echo "<script>window.open('index.php', '_self')</script>";
      }else {
        echo "<script>alert('Location not inserted. Please try again!')</script>";
      }
    }else {
      echo "<script>alert('State not in Nigeria')</script>";
    }
  }

 ?>
<?php } ?>
