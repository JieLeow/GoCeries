<html>
  <head>
    <title>Confirmation</title>
  </head>
  <body>
    <style>
    <?php
         include '/css/style.css';
         include '/css/style/typography.css';
    ?>
    </style>

    <!-- HEADER -->
    <div class="header">
        <div class = header-nav>
            <div class = "container">
                <div class = "navbar">
                    <div class = "logo">
                        <h1>GOCERIES</h1>
                    </div>

                    <nav>
                        <ul>
                            <li><a href = "">Home</a></li>
                            <li><a href = "">Products</a></li>
                            <li><a href = "">Contact</a></li>
                            <li><a href = "">Account</a></li>
                            <li><a href = ""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class = "row">
            <div class ="column">
        </div>
    </div>

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
                location="checkout.html"; </script>';
        }
      } else {
        echo "Form was not submitted. Please try again.";
      }
    ?>

    <!-- FOOTER -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col-1">
                    <h3>Download Our App</h3>
                    <p>Download App for Android and ios Mobile</p>
                </div>

                <div class="footer-col-2">
                    <img src="mainPageImages/logo_transparent.png">
                    <p>Lazy? No Problem. Your laziness is matched with our speed.
                        </p>
                </div>

                <div class="footer-col-3">
                    <h3>Useful Links</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>

                <div class="footer-col-4">
                    <h3>Follow Us</h3>
                    <ul>
                        <li>Coupons</li>
                        <li>Blog Post</li>
                        <li>Return Policy</li>
                        <li>Join Affiliate</li>
                    </ul>
                </div>
            </div>
            <hr>
            <p class = "copyright">Copyright 2020 Go!Ceries </p>
        </div>
    </div>

  </body>
</html>
