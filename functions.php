<?php
//this page is like the controller (i think)


//requires mySQL connection
include('database/DBController.php');

//require Product Class
include('database/Product.php');


//all objects are created here

//DBController object;
$db = new DBController();  //creates a db controller object which its constructor creates a connection




// ------------------------------------- product ------------------------------------------//

//Product object
$product = new Product($db);

//get all products in array of arrays from db.
$productsArray = $product->getAllProducts();

//get products by category from db
$fruitsArray = $product->getProductsByCategory('fruits');
$vegetablesArray = $product->getProductsByCategory('vegetables');
$beveragesArray = $product->getProductsByCategory('beverages');
$dairiesArray = $product->getProductsByCategory('Dairy & Eggs');


//get a single product by id from db
// $singleProductWithDetails = $product->getSingleProduct($_GET['product_id']); //where to get $productID?


//get single product's quantity
// $productQuantity = $product->getProductStock($_GET['product_id']);

// ------------------------------------- product ------------------------------------------//












?>


