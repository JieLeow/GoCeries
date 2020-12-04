<?php
  session_start();
  foreach($_POST as $key=>$val) {
    $_SESSION['POST'][$key] = $val;
  }
 ?>

<html>
  <head>
    <title>Confirmation</title>
  <link href="css/style.css" rel="stylesheet">
  </head>

<style>

    .divr {
      text-align: center;
    }

    span {
        line-height: 200%;
        color: black;
        font-size: 25px;
        font-weight: bold;
    }

    img {
        width: 100px;
        height: 100px;
        margin-right: 5px;
        margin-left: 5px;
    }

    #map {
        height: 400px;
        /* The height is 400 pixels */
        width: 60%;
        /* The width is the width of the web page */
        margin-bottom: 40px;
    }
</style>

  <body>


    <!-- HEADER -->
    <?php
      include('phpTemplates/header.php');
    ?>
    
    <!-- <h1 style="margin-top: 40px; margin-left: 20px; margin-bottom: 20px; text-align:center; font-size:240%;">Thank you! Your order has been placed.</h1> -->


    <?php

        //functions
        function getODate() {
            $today = new DateTime(); //not working - what is the datetime object that gets inserted into the database
            return $today;
        }

        function getONum() { //not guarenteed uniqueness
            $func = 17 * rand(0, 1000) + time(); //time() in seconds
            return $func;
        }

      //if container has been filled out
      if (isset($_POST["shippingfirstname"]) && isset($_POST["shippinglastname"]) && isset($_POST["shippingemail"]) && isset($_POST["shippingaddress"])
        && isset($_POST["shippingcity"]) && isset($_POST["shippingstate"]) && isset($_POST["shippingzip"]) &&
        isset($_POST["cardname"]) && isset($_POST["cardnumber"]) && isset($_POST["expmonth"])
        && isset($_POST["expyear"]) && isset($_POST["cvv"]) && isset($_POST["billingemail"]) && isset($_POST["billingaddress"])
        && isset($_POST["billingcity"]) && isset($_POST["billingstate"]) && isset($_POST["billingzip"])) { //first if bracket
        if ($_POST["shippingfirstname"] && $_POST["shippinglastname"] && $_POST["shippingemail"] && $_POST["shippingaddress"] &&
            $_POST["shippingcity"] && $_POST["shippingstate"] && $_POST["shippingzip"] && $_POST["cardname"] &&
            $_POST["cardnumber"] && $_POST["expmonth"] && $_POST["expyear"]
            && $_POST["cvv"] && $_POST["billingfullname"] && $_POST["billingemail"] && $_POST["billingaddress"]
            && $_POST["billingcity"] && $_POST["billingstate"] && $_POST["billingzip"]) {
              $shippingfirstname = $_POST["shippingfirstname"];
              $shippinglastname = $_POST["shippinglastname"];
              $shippingemail = $_POST["shippingemail"];
              $shippingaddress = $_POST["shippingaddress"];
              $shippingcity = $_POST["shippingcity"];
              $shippingstate = $_POST["shippingstate"];
              $shippingzip = $_POST["shippingzip"];
              $cardname = $_POST["cardname"];
              $cardnumber = $_POST["cardnumber"];
              $monthexp= $_POST["expmonth"];
              $yearexp = $_POST["expyear"];
              $cvv = $_POST["cvv"];
              $billingfullname = $_POST["billingfullname"];
              $billingemail = $_POST["billingemail"];
              $billingaddress = $_POST["billingaddress"];
              $billingcity = $_POST["billingcity"];
              $billingstate = $_POST["billingstate"];
              $billingzip = $_POST["billingzip"];
              $userid = $_SESSION['user_id'];


          // create connection
          $conn = mysqli_connect("localhost", "root", "", "goceries");

          // check connection
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          echo '<h1 style="margin-top: 40px; margin-left: 20px; margin-bottom: 20px; text-align:center; font-size:240%;">Thank you! Your order has been placed.</h1>';
          
          // register payment   //add in user id as well, right now user id set as just a single number 3.
          $sql = "INSERT INTO payments (payment_user_id, payment_fname, payment_lname, payment_email,
          payment_address, payment_city, payment_state, payment_zip, payment_cardholder,
          payment_ccnumber, payment_expmonth, payment_expyear, payment_cvv,
          payment_billingname, payment_billingemail, payment_billingaddress,
          payment_billingcity, payment_billingstate, payment_billingzip) VALUES ('$userid', '$shippingfirstname',
          '$shippinglastname','$shippingemail','$shippingaddress','$shippingcity','$shippingstate','$shippingzip',
          '$cardname','$cardnumber','$monthexp','$yearexp','$cvv','$billingfullname','$billingemail',
          '$billingaddress','$billingcity','$billingstate','$billingzip')";

          //send sequel to database
          $results = mysqli_query($conn, $sql);

            //declare all variables for orders table
            // $orderdate = getDate();
            // $orderdate = date('m/d/Y h:i:s a', time()); //user friendly format
            date_default_timezone_set('America/Los_Angeles');
            $orderdate = date('Y-m-d H:i:s'); //for insertion to db;
            $orderid = getONum();
            /*--------need to get the order total details---*/
            $userid = $_SESSION['user_id']; //temporary, will fix to current user using session or smtg
            $ordertotal = $_SESSION['finalprice']; // $finalprice in the cart page
            $ordertax = $_SESSION['taxes'];
            $orderstatus = "Processing Order";

            //FIRST SQL----------------------CREATES AND ORDER IN ORDER TABLE----------------------------------//
            $sql2 = "INSERT INTO orders (order_ID, user_ID, order_total,
            order_tax, order_date, order_delivery_status) VALUES ('$orderid',
            '$userid','$ordertotal','$ordertax','$orderdate','$orderstatus')";

            //send sequel to database
            $results2 = mysqli_query($conn, $sql2);


            /*---probably need to insert orders-product-details data into database here too (for the images)------*/
            // $product_ID = 0;
            // $quantity = 100;

            
            

            //SECOND SQL------------------------UPDATING PRODUCT STOCK QUANTITY--------------------------------//
            
            //for loop to loop through the products in the shopping cart
            // print "<pre>";
            // print_r($_SESSION['shopping_cart']);
            // print "</pre>";
            
            forEach($_SESSION['shopping_cart'] as $products){

              //variable to store cart product stock, to not mess up sql statement
              $stock = $products['product_stock'] - $products['quantity'];
              $id = $products['product_ID'];

              //either use tempProductQuantity SESSION, or the cart SESSION, stock - quantity;
              $sql3 = "UPDATE products SET product_stock ='{$stock}' where product_id = '{$id}'";
              $results3= mysqli_query($conn, $sql3);

              
            }

            //THIRD SQL--------------------STORE ORDER DETAILS WITH PRODUCT AND ORDERED QUANTITY----------------//
            forEach($_SESSION['shopping_cart'] as $products){

              //variable to store cart product stock, to not mess up sql statement
              $totalquantity = $products['quantity'];
              $productid = $products['product_ID'];
              //$orderid 
              $totalweight = $products['product_weight']*$totalquantity;
          
              //either use tempProductQuantity SESSION, or the cart SESSION, stock - quantity;
              $sql3 = "INSERT INTO orders_products_details VALUES ($orderid, $productid, $totalweight, $totalquantity)";
              $results3= mysqli_query($conn, $sql3);

            }
            


          //checks whether or not the output is received from database
          if ($results && $results2 && $results3) {
            echo '<div class="divr">';
            echo '<span style="margin-left: 20px;">'.$_POST['shippingfirstname'].' </span>';
            echo '<span>'.$_POST['shippinglastname'].'</span>';
            echo "<br>";
            echo '<span style="margin-left: 20px;">'.$_POST['shippingemail'].'</span>';
            echo "<br>";
            echo '<span style="margin-left: 20px;">'.$_POST['shippingaddress'].'</span>';
            echo "<br>";
            echo '<span style="margin-left: 20px;">'.$_POST['shippingcity'].',</span>';
            echo '<span style="margin-left: 5px;">'.$_POST['shippingstate'].'</span>';
            echo '<span style="margin-left: 5px; margin-bottom: 200px;">'.$_POST['shippingzip'].'</span>';

              echo '<h1 style="text-align:center; margin-top:40px;">Your Order</h2>';
              echo '<span> Order Date: '.$orderdate . '</span>';
              echo "<br>";
              echo '<span> Order #: ' .$orderid.'</span>';
              echo "<br>";
              echo '<span> Total: $'.sprintf("%.2f", $ordertotal).'</span>';
              echo "<br>";
              // need to get the product details from databse
              // echo '<span>What You Have Ordered: </span>';
              // echo '<span>
              // <table>
              // <tbody>
              // <tr>
              //   <td><img src="images/dairy-oatmilk.jpg"></td>
              //   <td><img src="images/dairy-oatmilk.jpg"></td>
              //   <td><img src="images/dairy-oatmilk.jpg"></td>
              //   <td><img src="images/dairy-oatmilk.jpg"></td>
              //   <td><img src="images/dairy-oatmilk.jpg"></td>
              // <td><h2>...</h2></td>
              // </tr>
              // </tbody>
              // </table>
              // </span>';
              // echo "<br>";
              echo '<span>Track Package:</span>';
              echo "<br>";
              echo '<div id="map"></div>';
              echo '</div>';


              //Resets the cart after successful checkout
              unset($_SESSION["shopping_cart"]);

              //not sure do i need to do this
              unset($_SESSION["tempProductQuantity"]);

          } else {
            echo mysqli_error($conn);
          }
            mysqli_close($conn); // close connection

        } else {
          echo '<script> type="text/javascript"> alert("One or more areas are not filled in.");
                location="checkout.php"; </script>';
        }
      } else {
        // echo "Form was not submitted. Please try again.";
        echo '<h1 style="margin-top: 40px; margin-left: 20px; margin-bottom: 500px; text-align:center; font-size:240%;">Checkout was not successful. Please Return to Cart Page and Try Again.</h1>';
      }
    ?>

<!--map api (work in progress)-->
<!--probably link it to index.js-->

<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKblPBimQUF-jQTgFwwuYXKYTcoG3hbE0&callback=initMap&libraries=&v=weekly"
  defer
></script>

<script>
  // Initialize and add the map
  function initMap() {
      const labels = "AB";

      // The location of the billing address (placeholder - need to use Geocoder in maps api)
      const address = { lat: 37.33219619200047, lng: 121.90493422446872 };

    // The location of the store
    const store = { lat: 37.33219619200047, lng: -121.90493422446872 };

    // The map, centered at the store
    const map = new google.maps.Map(document.getElementById("map"), {
      center: store,
    });
    // The marker, positioned at the store
    const markerA = new google.maps.Marker({
        position: store, label: labels[0], title: "Your order is on the way!", map: map,
    });
      // The marker, positioned at the shipping address
      const markerB = new google.maps.Marker({
        position: address, label: labels[1], map: map,
      });

      // doesn't seem to work - should adjust zoom so that both markers are visible on the map
      var markers = [markerA, markerB];
           var bounds = new google.maps.LatLngBounds();
           for (var i = 0; i < markers.length; i++) {
            bounds.extend(markers[i]);
           }

           map.fitBounds(bounds);
  }
</script>

<!-- prevents refreshing of page for unwanted post request -->
<script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
</script>

    <!-- FOOTER -->
    <?php
        include('phpTemplates/footer.php');
    ?>

  </body>
</html>
