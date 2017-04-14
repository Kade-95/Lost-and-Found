<?php

include("../../includes/db.php");

  if($_POST['id']){
    $state_id = $_POST['id'];

    $get_city = "select * from locations where state_id = '$state_id'";

    $run_get = mysqli_query($con, $get_city);
    if($run_get){
      while($row_get = mysqli_fetch_array($run_get)){
        $location_id = $row_get['location_id'];
        $city_name = $row_get['city_name'];

        echo '<option value="'.$location_id.'">'.$city_name.'</option>';
      }
    }else {
      echo "<script>alert('cities not found')</script>";
    }
  }

?>
