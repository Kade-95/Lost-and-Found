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
    <header>
      <nav>
        <a href="../index.php">
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
            <li><a href="../customer/account.php">User Account</a></li>
            <li><a href='../customer/logout.php'>logout</a></li>
          </ul>
        </div>
      </nav>

      <h2 id="moto">Did you lose an item? Don't worry, we will get it back to you.</h2>
    </header>

    <div id="found_content">
      <form method="post" enctype="multipart/form-data">
        <div>
          <input type="text" name="item_name" placeholder="name" id="name" required/><br/><br/>

          <input type="file" name="item_image"/><br/><br/>

          <select name="state" id="state">
						<option>Select state</option>
						<?php
              $get_states = "select * from states";
             if($run_get = mysqli_query($con, $get_states)){
               while($row_get = mysqli_fetch_array($run_get)){
                 $state_id = $row_get['state_id'];
                 $state_name = $row_get['state_name'];

                 echo "<option value='$state_id'>$state_name</option>";
               }
             }else {
               echo "<script>alert('states not found')</script>";
             }
						?>
					</select>

          <select name="city" id="city">
            <option>Select City</option>
					</select>

          <h2 id="description">Item description eg.(Color, size, weight)</h2><br/>

          <input type="text" name="desc1" placeholder="description1" id="name" required/><br/><br/>

          <input type="text" name="desc2" placeholder="description2" id="name" required/><br/><br/>

          <input type="text" name="desc3" placeholder="description3" id="name" required/><br/><br/>

          <input type="text" name="desc4" placeholder="description4" id="name" required/><br/><br/>
        </div>

        <div>
          <button type="submit" name="finish">Finish</button><br/><br/>
        </div>
      </form>
    </div>
    <script src="..\includes\jquery-3.2.0.min.js">
    </script>
    <script src="..\includes\functions\functions.js">
    </script>
  </body>
  <footer>
    <h2>&copy; 2017 by www.shoponlineng.com</h2>
  </footer>
</html>

<?php

    if(isset($_POST['finish'])){
      $email = $_SESSION['user_email'];
      $name = mysqli_real_escape_string($con, $_POST['item_name']);
      $image = $_FILES['item_image']['name'];
      $image_tmp = $_FILES['item_image']['tmp_name'];
      move_uploaded_file($image_tmp, "images/$image");


      $state = mysqli_real_escape_string($con, $_POST['state']);
      $city = mysqli_real_escape_string($con, $_POST['city']);
      //descriptions for the item
      $desc_1 = mysqli_real_escape_string($con, $_POST['desc1']);
      $desc_2 = mysqli_real_escape_string($con, $_POST['desc2']);
      $desc_3 = mysqli_real_escape_string($con, $_POST['desc3']);
      $desc_4 = mysqli_real_escape_string($con, $_POST['desc4']);

      $ins_item = "insert into lost_item (loser_email, item_name, item_image, item_desc1, item_desc2, item_desc3, item_desc4, item_location, item_state) values('$email', '$name', '$image', '$desc_1', '$desc_2', '$desc_3', '$desc_4', '$city', '$state')";

      $run_ins = mysqli_query($con, $ins_item);

      if($run_ins){
        echo "<script>alert('Thanks, Lets see what we can do.')</script>";
        echo "<script>window.open('index.php','_self')</script>";
      }
      else {
        echo "<script>alert('Sorry an error occured, Please try again!')</script>";
      }
    }
 ?>
<?php } ?>
