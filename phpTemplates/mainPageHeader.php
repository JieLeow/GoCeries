<?php
session_start();
include "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goceries | Welcome!</title>

    <!-- Add boostrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- OWN CSS -->
    <link rel="stylesheet" href="css/style.css">

    

</head>

<body>

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
                            <li><a href = "mainPage.php">Home</a></li>
                            <li><a href = "category-allProducts.php">Products</a></li>
                            <li><a href = "about.php">About</a></li>
                            <?php if (isset($_SESSION['user_id'])&& isset($_SESSION['user_loginname'])){ ?>


                            <li><a href = "account.php">Hello, <?php echo $_SESSION['user_name']; ?></a></li>
                            <li><a href = "logout.php">Logout</a></li>
                                  <?php } else { ?>

                                  <li><a href = "account.php">Account</a></li>
                                  <?php } ?>
                            <li><a href = "cart.php"><i class="fa fa-shopping-cart cart-icon" aria-hidden="true"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class = "row">
            <div class ="column">

                <img src="images/logo_transparent.png">
                <hr>
                <h2>WE'RE HERE TO HELP JUSTIFY YOUR LAZINESS. <br><br>
                    GETTING YOUR GROCERIES IS JUST A FEW CLICKS AWAY!</h2>
                <hr>
                    <p>
                    How are we different? We offer the best price and delivery services.
                    </p>
                <p>What are you waiting for? Join us now. <br>
                  <?php if (isset($_SESSION['user_id'])&& isset($_SESSION['user_loginname'])){ ?>
                    
                    <h1>Hello, <?php echo $_SESSION['user_name']; ?></h1>
                  <a href="logout.php">Logout</a>
                      <?php } else { ?>

                        <a href = "loginregister.php" class = "btn">Sign Up &#10026;</a>
                        <a href = "loginregister.php" class = "btn">Log in &#10026;</a>
                      <?php } ?>
                </p>
            </div>

        </div>
    </div>
