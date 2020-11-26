<html>
  <head>
    <title>Confirmation</title>
  <link href="css/style.css" rel="stylesheet">
  </head>
  <body>

    <!-- HEADER -->
    <?php
      include('phpTemplates/header.php');
  ?>

    <h1 style="margin-left: 20px;">Thank you! Your order has been placed.</h1>

    <?php

      //if container has been filled out
      if (isset($_POST["shippingfirstname"]) && isset($_POST["shippinglastname"]) && isset($_POST["shippingemail"]) && isset($_POST["shippingaddress"])
        && isset($_POST["shippingcity"]) && isset($_POST["shippingstate"]) && isset($_POST["shippingzip"]) &&
        isset($_POST["cardname"]) && isset($_POST["cardnumber"]) && isset($_POST["expmonth"])
        && isset($_POST["expyear"]) && isset($_POST["cvv"]) && isset($_POST["billingemail"]) && isset($_POST["billingaddress"])
        && isset($_POST["billingcity"]) && isset($_POST["billingstate"]) && isset($_POST["billingzip"])) {
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


          // create connection
          $conn = mysqli_connect("localhost", "root", "", "goceries");

          // check connection
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          // register user
          $sql = "INSERT INTO payments (payment_fname, payment_lname, payment_email,
          payment_address, payment_city, payment_state, payment_zip, payment_cardholder,
          payment_ccnumber, payment_expmonth, payment_expyear, payment_cvv,
          payment_billingname, payment_billingemail, payment_billingaddress,
          payment_billingcity, payment_billingstate, payment_billingzip) VALUES ('$shippingfirstname',
          '$shippinglastname','$shippingemail','$shippingaddress','$shippingcity','$shippingstate','$shippingzip',
          '$cardname','$cardnumber','$monthexp','$yearexp','$cvv','$billingfullname','$billingemail',
          '$billingaddress','$billingcity','$billingstate','$billingzip')";

          //send sequel to database
          $results = mysqli_query($conn, $sql);

          //checks whether or not the output is received from database
          if ($results) {
            echo '<span style="color: black; font-size: 25px; font-weight:bold;
            margin-left: 20px;">'.$_POST['shippingfirstname'].' </span>';
            echo '<span style="color: black; font-size: 25px; font-weight:bold;">'
            .$_POST['shippinglastname'].'</span>';
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

  </body>
</html>
