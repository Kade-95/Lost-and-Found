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

	`	<table width="100%" align="center" bgcolor="white">

			<tr align="center">
				<td colspan="6"><h2>View All Customers</h2></h2>
			</tr>

			<tr align="center" bgcolor="white">
				<th>Customer ID</th>
				<th>Customer Email</th>
				<th>Customer Name</th>
				<th>Delete</th>
			</tr>

			<?php
				include("../includes/db.php");

				$get_customers = "select * from customer";

				$run_get = mysqli_query($con, $get_customers);


				$i = 0;
				while($row_customer = mysqli_fetch_array($run_get)){

					$customer_id = $row_customer['customer_id'];
					$customer_email = $row_customer['customer_email'];
					$customer_name = $row_customer['customer_name'];
					$i++;

			?>
			<br/>
			<tr align="center" bgcolor="white">
				<td><?php echo $i; ?></td>
				<td><?php echo $customer_email; ?></td>
				<td><?php echo $customer_name; ?></td>
				<td><a href="javascript:void(0)">Delete</a></td>
			<?php } ?>

		</table>

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
