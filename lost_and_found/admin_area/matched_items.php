<!DOCTYPE>

<?php
session_start();
include("../includes/db.php");
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
      <div id="matches">

        <section class="item left">
          <p>FOUND</p>
        </section>

        <section class="item right">
          <p>LOST</p>
        </section>
        <section class="item left">
          <table id="example">
              <tr style="background-color: #ccc;">
                <th>Item ID</th>
                <th id="name">Finder Email</th>
                <th>Item Name</th>
                <th>Item Image</th>
                <th>Item Location</th>
              </tr><br/>
          </table>
        </section>

        <section class="item right">
          <table id="example">
              <tr style="background-color: #ccc;">
                <th>Item ID</th>
                <th id="name">Loser Email</th>
                <th>Item Name</th>
                <th>Item Image</th>
                <th>Item Location</th>
              </tr><br/>
          </table>
        </section>

        <?php
          $get_found = "select * from found_item";
          $run_found = mysqli_query($con, $get_found);
          $i = 0;

          while ($row_found = mysqli_fetch_array($run_found)) {
            $f_loc = $row_found['item_location'];
            $finder_email = $row_found['finder_email'];
            $found_name = $row_found['item_name'];
            $found_image = $row_found['item_image'];
            $found_id = $row_found['found_id'];

            $get_found_city = "select * from locations where location_id = '$f_loc'";

            $run_found_city = mysqli_query($con, $get_found_city);

            $i++;
            $y = 0;

            $get_lost = "select * from lost_item";
            $run_lost = mysqli_query($con, $get_lost);
            while ($row_lost = mysqli_fetch_array($run_lost)) {
              $l_loc = $row_lost['item_location'];
              $loser_email = $row_lost['loser_email'];
              $lost_name = $row_found['item_name'];
              $lost_image = $row_found['item_image'];
              $lost_id = $row_found['found_id'];

              $get_lost_city = "select * from locations where location_id = '$l_loc'";

              $run_lost_city = mysqli_query($con, $get_lost_city);

              $y++;

              if ($f_loc == $l_loc) {

                if($row_found_city = mysqli_fetch_array($run_found_city)){
                  $f_loc = $row_found_city['city_name'];
                  echo "
                  <section class='item left'>
                    <table id='example'>
                      <td><a href='found_item_details.php?found_item=$found_id'> $i</a></td>
                      <td><a href='found_item_details.php?found_item=$found_id'>$finder_email</a></td>
                      <td style='text-transform: uppercase;'><a href='found_item_details.php?found_item$found_id'>$found_name</a></td>
                      <td><a href='found_item_details.php?found_item=$found_id'><img src='../found_item/images/$found_image'></a></td>
                      <td><a href='found_item_details.php?found_item=$found_id'>$f_loc</a></td>
                    </table>
                  </section>";
                }

                if($row_lost_city = mysqli_fetch_array($run_lost_city)){
                  $l_loc = $row_lost_city['city_name'];
                  echo "
                  <section class='item right'>
                    <table id='example'>
                      <td><a href='found_item_details.php?found_item=$lost_id'> $y</a></td>
                      <td><a href='found_item_details.php?found_item=$lost_id'>$loser_email</a></td>
                      <td style='text-transform: uppercase;'><a href='found_item_details.php?$lost_id'>$lost_name</a></td>
                      <td><a href='found_item_details.php?found_item=$lost_id'><img src='../found_item/images/$lost_image'></a></td>
                      <td><a href='found_item_details.php?found_item=$lost_id'>$l_loc</a></td>
                    </table>
                  </section>";
                }
              }
            }
          }
        ?>

      </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js">
    </script>
    <script src="../includes/functions/functions.js">
    </script>
  </body>
  <footer>
    <h2>&copy; 2017 by www.shoponlineng.com</h2>
  </footer>
</html>
<?php } ?>
