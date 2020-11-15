<?php
//this page is like the controller (i think)


//requires mySQL connection
include('database/DBController.php');

//require Product Class
include('database/Product.php');


//all objects are created here

//DBController object;
$db = new DBController();  //creates a db controller object which its constructor creates a connection

//Product object
$product = new Product($db);

print_r($product->getProductDetailsData()); //no need param, product table is default in the product class















?>


