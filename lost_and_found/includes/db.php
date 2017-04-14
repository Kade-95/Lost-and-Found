<?php
//connect to the database
  $con = mysqli_connect("localhost", "root", "", "lost_and_found");

//check for error during connection
  if(mysqli_connect_errno()){
    echo "Failed to connect to database" + mysqli_connect_errno();
  }
 ?>
