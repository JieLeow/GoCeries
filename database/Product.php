<?php

//more like productModel (deals with database)
class Product{
    
//instance fields
public $db = null;   //make sure i understand what this means
<<<<<<< HEAD
public $name = '';
public $description = '';
public $price = '';
=======
>>>>>>> 5b5ad1d5f9217b073f2e6be7f067aa370fb2c9ce

// protected $productName = '';
// protected $productImage = '';
// protected $productDescription = '';
// protected $productPrice = '';

//could change this to an array and store products in the same category but only 3 items;
// protected $relatedProducts = '';



//constructor to create a product
public function __construct(DBController $db){ //dependency injection
    if(!isset($db->con))
        return null;
    $this->db = $db;
    

}




public function getProductDetailsData($table = 'products'){

    $result = $this->db->con->query("SELECT product_name, product_category, product_price, 
    product_description FROM {$table}");

    $resultArray = array();

    echo "<br> ";

    //fetch product data one by one from the query
    while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){ //assoc use column name as index key
        $resultArray[] = $item;

        }
        return $resultArray;
    }

}


?>