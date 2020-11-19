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


<!-- additional CSS -->
<style>
    td {
        border: 1px solid black;
        padding: 6px;
    }

    table {
        float: left;
        border-collapse: collapse;
    }

    input {
        width: 60px; 
        height: 40px; 
        outline: none;
        padding-left: 10px; 
        font-size: 20px; 
        margin-right: 10px; 
        border: 1px solid #23ae00;
        caret-color: transparent;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none;
    }
</style>


<body>

    <!-- HEADER -->
    <?php
        include('phpTemplates/header.php');
        include('functions.php'); //not sure (does it create new connection everytime?)
    ?>

    
    <?php 
    // ADDED INTEGRATION TO CART (TRIAL)
    session_start();
        if (isset($_GET['product_id']) && $_GET['product_id']!=""){
            $product_ID = $_GET['product_id'];
            $result = mysqli_query($db->con,"SELECT * FROM `products` WHERE `product_ID`='$product_ID'");
            $row = mysqli_fetch_assoc($result);
            $name = $row['product_name'];
            echo $name;
            $product_ID = $row['product_ID'];
            $price = $row['product_price'];
            $image = $row['product_imagename'];
            $weight = $row['product_weight'];
            
            
            $cartArray = array(
                $product_ID=>array(
                'product_name'=>$name,
                'product_ID'=>$product_ID,
                'product_price'=>$price,
                'product_weight'=>$weight,
                'quantity'=>1,
                'product_imagename'=>$image)
            );
            
            if(empty($_SESSION["shopping_cart"])) {
                $_SESSION["shopping_cart"] = $cartArray;
                $status = "<div class='box'>Product is added to your cart!</div>";
            }else{
                $array_keys = array_keys($_SESSION["shopping_cart"]);
                if(in_array($product_ID,$array_keys)) {
                    $status = "<div>Product is already added to your cart!</div>";
                } else {
                $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
                $status = "<div class='box'>Product is added to your cart!</div>";
                }
                }
            }
    ?>


    <?php
    // ADDED INTEGRATION TO CART (TRIAL)
    if(!empty($_SESSION["shopping_cart"])) {
        $cart_count = count(array_keys($_SESSION["shopping_cart"]));   
    ?>
    <div class="cart_div">
    <a href="cart.php"><img src="images/cart-icon.png" /> Cart<span><?php echo $cart_count; ?></span></a>
    </div>



    <?php 
    }//ADDED INTEGRATION TO CART (TRIAL) END AT THIS LINE

        $product_id = $_GET['product_id'] ?? 1;
        foreach($productsArray as $product){
            if($product['product_id'] == $product_id){ //find product in array that matches current product_id
            
    ?>

    <!-- single product details -->
    <div class="small-container" style="margin-top: 80px;">
        <div class = "row">
            <div style= "flex: 50%; min-width: 180px; margin-bottom: 30px;">
                <img src="images/<?php echo $product['product_imagename'] ?>" width="100%" style="padding: 0;">
            </div>
            <div style= "flex: 50%; min-width: 180px; margin-bottom: 30px; padding: 20px;">
                <form method='post' action=''>
                    <p><a href = "mainPage.php">Home</a> / <a href = "category-allProducts.php">All Products / </a> <a href = '<?php echo 'category-' .  $product['product_category'] . '.php'?>'> <?php echo $product['product_category']?> </a></p>
                    <h1><?php echo $product['product_name'] ?></h1>
                    <h4 style="margin: 40px 0; font-size: 22px; font-weight: bold;">$ <?php echo $product['product_price'] ?> / each</h4>
                
                    <!-- <input type="number" value="0" min="0" onkeydown="return false"> -->
                    <!-- <a href="" class="btn" type="submit">Add To Cart</a> -->

                    <button type='submit' class='btn'>Add to Cart</button>
                    <h3>Product Description</h3> 
                    <p><?php echo $product['product_description'] ?></p>
                    <br>
                </form>
                
            </div>
        </div>
    </div>
    

    
    <?php 
            }
        }
        

    ?>

        <!-- related products -->
        <!-- <div class="small-container">
            <div class = "row">
                <h2 style="float: left; margin-left: 50px;">Related Products</h2>
                <p style="float: right; margin-right: 50px;">View More</p>
            </div>
        </div> -->


        <!-- SUGGESTED PRODUCTS SECTION -->
        <!-- <div class="categories all-products">
            <div class="small-container">
            
                <div class = "row">
                
                    <div class="col-3"> -->
                        <!-- Fruits -->
                        <!-- <a href= ""><img src="images/fruit-banana.jpg"></a> 
                        <br>
                        <p>Banana</p> 
                        <p>Rating</p>
                        <p>Price: </p>
                    </div>

                </div>

            </div>
        </div> -->


<!-- FOOTER -->
    <?php
        include('phpTemplates/footer.php');
    ?>
