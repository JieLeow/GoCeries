<?php

// require MySQL Connection
require ('DBController.php');

// require Product Class
require ('cart.php');

// DBController object
$db = new DBController();

// Product object
$product = new cart($db);

if (isset($_POST['itemid'])){
    $result = $product->getProduct($_POST['itemid']);
    echo json_encode($result);
}
