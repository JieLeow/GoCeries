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

        //fetch product data one by one from the query
        while($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){ //assoc use column name as index key
            $resultArray[] = $item;

            }
            return $resultArray;
    }



    public function getAllProducts($table = 'products'){//returns an array of all objects, to be used in the categories view page to loop through each item.

        //performs a query which is returned as a result object.
        $result = $this->db->con->query("SELECT product_id, product_name, product_price,        
        product_weight, product_imagename, product_category, product_description FROM {$table}");         

        $productsArray = array();

        while($row = $result->fetch_array()){
            $productsArray[] = $row;
        }

        shuffle($productsArray);  //needed?, else can remove.

        return $productsArray;
        
    }


    public function getProductsByCategory($category){ //param is a string of a product category.

        //performs a query which is returned as a result object.
        $result = $this->db->con->query("SELECT product_id, product_name, product_price,        
        product_weight, product_imagename, product_category, product_description FROM products
        WHERE product_category = '{$category}'");         

        $categoricalProductsArray = array();

        while($row = $result->fetch_array()){
            $categoricalProductsArray[] = $row;
        }  

        return $categoricalProductsArray;
        
    }


    public function getThreeRelatedProducts($category){
        $result = $this->db->con->query("SELECT product_id, product_name, product_price,        
        product_weight, product_imagename, product_category, product_description FROM products
        WHERE product_category = '{$category}'");         

        $RelatedProductsArray = array();

        while($row = $result->fetch_array()){
            $RelatedProductsArray[] = $row;
        }  

        return $RelatedProductsArray;
    }

    public function getSingleProduct($product_ID){

        $result =$this->db->con->query("SELECT * FROM `products` WHERE `product_id`='{$product_ID}'");

        return $result;

    }


    //used to get the quantity of stock left for a product
    public function getProductStock($product_ID){
        $result =$this->db->con->query("SELECT product_stock FROM `products` WHERE `product_id`='{$product_ID}'");

        $stockLeft = (int) $result->fetch_assoc()['product_stock'];
        return $stockLeft;
    }

        

}


?>