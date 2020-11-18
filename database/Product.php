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



    public function getAllProducts($table = 'products'){   //returns an array of all objects, to be used in the categories view page to loop through each item.

        //performs a query which is returned as a result object.
        $result = $this->db->con->query("SELECT product_name, product_price,        
        product_weight, product_imagename FROM {$table}");         

        $productsArray = array();

        echo "<br> ";

        while($row = $result->fetch_array()){
            $productsArray[] = $row;
        }

        return $productsArray;
        
    }

        

}


?>