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

      <h2>all found items</h2>
	`	<table id="example">

      <tr style="background-color: #ccc;">
        <th>Item ID</th>
        <th id="name">Finder Email</th>
        <th>Item Name</th>
        <th>Item Image</th>
        <th>Item Location</th>
      </tr><br/>

			<?php
				include("../includes/db.php");

        $get_found_item = "select * from found_item";

      	$run_get = mysqli_query($con, $get_found_item);

				$i = 0;

				while($row_item = mysqli_fetch_array($run_get)){

					$finder_email = $row_item['finder_email'];
          $item_name = $row_item['item_name'];
          $item_image = $row_item['item_image'];
          $found_id = $row_item['found_id'];
          $item_location = $row_item['item_location'];

          $get_city = "select * from locations where location_id = '$item_location'";

          $run_city = mysqli_query($con, $get_city);

          if($row_city = mysqli_fetch_array($run_city)){
            $item_location = $row_city['city_name'];
          }

					$i++;

			?>


      <tr >
        <td><a href="found_item_details.php?found_item=<?php echo $found_id; ?>"><?php echo $i; ?></a></td>
        <td><a href="found_item_details.php?found_item=<?php echo $found_id; ?>"><?php echo $finder_email; ?></a></td>
        <td style="text-transform: uppercase;"><a href="found_item_details.php?found_item=<?php echo $found_id; ?>"><?php echo $item_name; ?></a></td>
        <td><a href="found_item_details.php?found_item=<?php echo $found_id; ?>"><img src="../found_item/images/<?php echo $item_image; ?>"></a></td>
        <td><a href="found_item_details.php?found_item=<?php echo $found_id; ?>"><?php echo $item_location; ?></a></td>
      </tr>
			<?php } ?>

		</table>

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
<?php } ?>
