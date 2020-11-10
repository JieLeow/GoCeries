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

    <h1>Thank you! Your order has been placed.</h1>

    <?php

      //if username exists
      if (isset($_POST["firstname"]) && isset($_POST["email"]) && isset($_POST["address"])
        && isset($_POST["address"]) && isset($_POST["city"]) && isset($_POST["state"])
        && isset($_POST["zip"]) && isset($_POST["cardname"]) && isset($_POST["cardnumber"])
        && isset($_POST["expmonth"]) && isset($_POST["expyear"]) && isset($_POST["cvv"])) {
        if ($_POST["firstname"] && $_POST["email"] && $_POST["address"] &&
            $_POST["city"] && $_POST["state"] && $_POST["zip"] && $_POST["cardname"] &&
            $_POST["cardnumber"] && $_POST["expmonth"] && $_POST["expyear"]
            && $_POST["cvv"]) {
              $fullname = $_POST["firstname"];
              $email = $_POST["email"];
              $address = $_POST["address"];
              $city = $_POST["city"];
              $state = $_POST["state"];
              $zip = $_POST["zip"];
              $cardname = $_POST["cardname"];
              $cardnumber = $_POST["cardnumber"];
              $monthexp= $_POST["expmonth"];
              $yearexp = $_POST["expyear"];
              $cvv = $_POST["cvv"];

          // create connection
          $conn = mysqli_connect("localhost", "root", "", "users");

          // check connection
          if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
          }

          // register user
          $sql = "INSERT INTO customers (fullname, email, address, city, state, zip,
          namecard, cardnumber, monthexp, yearexp, cvv) VALUES ('$fullname', '$email',
          '$address', '$city', '$state', '$zip', '$cardname', '$cardnumber',
          '$monthexp', '$yearexp', '$cvv')";

          //send sequel to database
          $results = mysqli_query($conn, $sql);

          //checks whether or not the output is received from database
          if ($results) {
            echo '<span style="color: black; font-size: 25px; font-weight:bold;
            margin-left: 20px;">'.$_POST['firstname'].'</span>';
            echo $fullname = $_POST["firstname"];
            echo "<br>";
            echo '<span style="color: black; font-size: 25px; font-weight:bold;
            margin-left: 20px;">'.$_POST['email'].'</span>';
            echo "<br>";
            echo '<span style="color: black; font-size: 25px; font-weight:bold;
            margin-left: 20px;">'.$_POST['address'].'</span>';
            echo "<br>";
            echo '<span style="color: black; font-size: 25px; font-weight:bold;
            margin-left: 20px;">'.$_POST['city'].',</span>';
            echo '<span style="color: black; font-size: 25px; font-weight:bold;
            margin-left: 5px;">'.$_POST['state'].'</span>';
            echo '<span style="color: black; font-size: 25px; font-weight:bold;
            margin-left: 5px; margin-bottom: 200px;">'.$_POST['zip'].'</span>';
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
