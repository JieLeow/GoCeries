<html>
  <head>
    <title>Confirmation</title>

    <!-- Add boostrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- OWN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>
  <body>
 
    <!-- HEADER -->
    <?php
      include('phpTemplates/header.php');
    ?>

    <h1 style="margin-left: 15px;">Thank you! Your order has been placed.</h1>

    <?php

      //if container has been filled out
      if (isset($_POST["shippingfullname"]) && isset($_POST["shippingemail"]) && isset($_POST["shippingaddress"])
        && isset($_POST["shippingcity"]) && isset($_POST["shippingstate"]) && isset($_POST["shippingzip"]) &&
        isset($_POST["cardname"]) && isset($_POST["cardnumber"]) && isset($_POST["expmonth"])
        && isset($_POST["expyear"]) && isset($_POST["cvv"]) && isset($_POST["billingemail"]) && isset($_POST["billingaddress"])
        && isset($_POST["billingcity"]) && isset($_POST["billingstate"]) && isset($_POST["billingzip"])) {
        if ($_POST["shippingfullname"] && $_POST["shippingemail"] && $_POST["shippingaddress"] &&
            $_POST["shippingcity"] && $_POST["shippingstate"] && $_POST["shippingzip"] && $_POST["cardname"] &&
            $_POST["cardnumber"] && $_POST["expmonth"] && $_POST["expyear"]
            && $_POST["cvv"]) {
              $shippingfullname = $_POST["shippingfullname"];
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
              $billingemail = $_POST["billingemail"];
              $billingaddress = $_POST["billingaddress"];
              $billingcity = $_POST["billingcity"];
              $billingstate = $_POST["billingstate"];
              $billingzip = $_POST["billingzip"];


          // create connection
          $conn = mysqli_connect("localhost", "root", "", "users");

          // check connection
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          // register user
          $sql = "INSERT INTO customers (fullname, email, address, city, state, zip,
          namecard, cardnumber, monthexp, yearexp, cvv, shipemail, shipaddress, shipcity,
          shipstate, shipzip ) VALUES ('$shippingfullname', '$shippingemail',
          '$shippingaddress', '$shippingcity', '$shippingstate', '$shippingzip', '$cardname', '$cardnumber',
          '$monthexp', '$yearexp', '$cvv', '$billingemail', '$billingaddress', '$billingcity',
          '$billingstate', '$billingzip')";

          //send sequel to database
          $results = mysqli_query($conn, $sql);

          //checks whether or not the output is received from database
          if ($results) {
            echo '<span style="color: black; font-size: 25px; font-weight:bold;
            margin-left: 20px;">'.$_POST['shippingfullname'].'</span>';
            echo "<br>";
            echo '<span style="color: black; font-size: 25px; font-weight:bold;
            margin-left: 20px;">'.$_POST['shippingemail'].'</span>';
            echo "<br>";
            echo '<span style="color: black; font-size: 25px; font-weight:bold;
            margin-left: 20px;">'.$_POST['shippingaddress'].'</span>';
            echo "<br>";
            echo '<span style="color: black; font-size: 25px; font-weight:bold;
            margin-left: 20px;">'.$_POST['shippingcity'].',</span>';
            echo '<span style="color: black; font-size: 25px; font-weight:bold;
            margin-left: 5px;">'.$_POST['shippingstate'].'</span>';
            echo '<span style="color: black; font-size: 25px; font-weight:bold;
            margin-left: 5px; margin-bottom: 200px;">'.$_POST['shippingzip'].'</span>';
          } else {
            echo mysqli_error($conn);
          }
            mysqli_close($conn); // close connection

        } else {
          echo '<script> type="text/javascript"> alert("One or more areas are not filled in.");
                location="checkout.php"; </script>';
        }
      } else {
        echo "Form was not submitted. Please try again.";
      }
    ?>
    
    
    
<!-- FOOTER -->
<?php
  include('phpTemplates/footer.php');
?>

    
