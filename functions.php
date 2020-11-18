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
$beveragesArray = $product->getProductsByCategory('beverage');
$dairiesArray = $product->getProductsByCategory('Dairy & Eggs');


// ------------------------------------- product ------------------------------------------//












?>


