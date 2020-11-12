<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products | Go!Ceries</title>

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

    <div class="account-info">
        <!-- add the navbar, the account should change to smtg like : "welcome back, username" -->
        <div class="container">
            <div class="small-container">
                <h2>Account Information</h2>
                <h3>Name</h3>
                <p>John Doe</p>
                <h3>Change Password</h3>
                <!-- form + password field -->
                <h3>Shipping Address</h3>
                <h4>Billing Address</h4>
                <h4>Saved Credit Cards</h4>
            </div>
        </div>
    </div>


<!-- FOOTER -->
<?php
    include('phpTemplates/footer.php');
?>