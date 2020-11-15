<?php

//more like productModel (deals with database)
class Product{
    
//instance fields
public $db = null;   //make sure i understand what this means

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

    $result = $this->db->con->query("SELECT * FROM {$table}");

    $resultArray = array();


    //fetch product data one by one from the query
    while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){ //assoc use column name as index key
        $resultArray[] = $item;

        }
        return $resultArray;
    }

}


?>