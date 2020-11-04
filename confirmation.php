<html>
  <head>
    <title>Confirmation</title>
  </head>
  <body>
    <h1>Confirmation</h1>
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
            echo "The user has been added.";
            echo $fullname = $_POST["firstname"];
            echo $email = $_POST["email"];
            echo $address = $_POST["address"];
            echo $city = $_POST["city"];
            echo $state = $_POST["state"];
            echo $zip = $_POST["zip"];
            echo $cardname = $_POST["cardname"];
            echo $cardnumber = $_POST["cardnumber"];
            echo $monthexp= $_POST["expmonth"];
            echo $yearexp = $_POST["expyear"];
            echo $cvv = $_POST["cvv"];
          } else {
            echo mysqli_error($conn);
          }
            mysqli_close($conn); // close connection

        } else {
          echo '<script> type="text/javascript"> alert("One or more areas are not filled in.");
                location="checkout.html"; </script>';
        }
      } else {
        echo "Form was not submitted.";
      }
    ?>
    <br>
    <br>
    <form action="/Login.php" method="post">
      <button type="submit">Proceed to Login</button>
    </form>
    <form action="/Registration.php" method="post">
      <button type="submit">Return to Registration</button>
    </form>
  </body>
</html>
