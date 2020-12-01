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

    .btn{
        margin: 30px 20px 30px 0px;
    }
</style>


<body>

    <!-- HEADER -->
    <?php
        include('phpTemplates/header.php');
        include('functions.php'); //not sure (does it create new connection everytime?)
    ?>

    <!-- WHAT I AM ACTUALLY SUPPOSED TO DO:
        - fix the product details page
        - get the product id
        - make an product array based on currentPage's productID
        - upon "add", that array is added to the cart
        - if the array already exists in the cart, update its quantity when "add" is pressed, DONT make new array.
        -
    -->
    
    <?php 
    // ADDED INTEGRATION TO CART (TRIAL)
    session_start();
        if (isset($_GET['product_id']) && $_GET['product_id']!=""){
            $product_ID = $_GET['product_id'];
            $result = mysqli_query($db->con,"SELECT * FROM `products` WHERE `product_ID`='$product_ID'");
            $row = mysqli_fetch_assoc($result);
            $name = $row['product_name'];    
            $product_ID = $row['product_ID'];
            $price = $row['product_price'];
            $image = $row['product_imagename'];
            $weight = $row['product_weight'];
            
            //-------understood everything from above: basically just get product details and stored into variables.-----------



            //---------------------- try to implement my own version here: ------------------//
            $productDetailsArray = array(
                'product_name'=>$name,
                'product_ID'=>$product_ID,
                'product_price'=>$price,
                'product_weight'=>$weight,
                'quantity'=>1, //default quantity = 1; is there a problem here?
                'product_imagename'=>$image
            );


            //upon "add", add product to cart. 
            //if cart contains product, update quantity. else, add the product array. 

            //right now, the add button just refreshes the page. DOESNT DO SHIT LOL.
            //so, i think should utilize the post request properly.

            
            //problem : 1 . when only single product, cannot add cart(SOLVED I THINK)
            //          2 . Cannot increase quantity of product.

            
            $alreadyInCart = false;

            //debug
            $counter = 1;

            $productQuantity = $product->getProductStock($_GET['product_id']);
            echo '<br>product id is: ' . $_GET['product_id'] . '<br>';
            echo 'product stock left is: ' . $productQuantity . '<br>';

            if(isset($_POST['addToCart'])){

                if(empty($_SESSION['shopping_cart'])){
                    $_SESSION['shopping_cart'] = array();
                    $_SESSION['shopping_cart'][$product_ID] = $productDetailsArray;
                    $alreadyInCart = true;
                }else{
                    //loop through cart, if product id found, increment. else add product to cart.
                    foreach($_SESSION['shopping_cart'] as &$cartProduct){ //TODO: this line not executed yet I think.
                        if($cartProduct['product_ID'] == $product_ID){
                            $cartProduct['quantity'] = $cartProduct['quantity'] +1;
                            $alreadyInCart = true; 

                            // //debug
                            // echo'<br>';
                            // echo 'product quantity is: ' . $cartProduct['quantity']; 
                            // echo '<br>';

                            // $counter++;
                            // echo 'quantity counter is: ' . $counter;
                            // echo '<br>';
                            // echo 'POST value before reset is: ' . $_POST['addToCart'];
                        }
                    }
                    if(!$alreadyInCart){ //where cart is not empty, but product not in cart
                        $_SESSION['shopping_cart'][$product_ID] = $productDetailsArray;
                        $alreadyInCart = true;
                    }
                }

                //debug
                echo '<br>' . 'is product in cart?';
                echo $alreadyInCart ? ' true' : ' false';

                echo "<br><br><br>";
                print_r($_SESSION['shopping_cart']);

                $_POST['addToCart'] = NULL;
                print_r($_POST['addToCart']);
            }
            //---------------------- my own implementation ends here ------------------------//


            //if product already in cart, then prompt message:
                // echo "<script type='text/javascript'>alert('Product is already added to the cart');</script>";
            
            //---------------------- default implementation ---------------------------//
            // $cartArray = array(   //this is the individual product row with their information in cartArray, which contains a product, that is an array of information. 
            //     $product_ID=>array(
            //     'product_name'=>$name,
            //     'product_ID'=>$product_ID,
            //     'product_price'=>$price,
            //     'product_weight'=>$weight,
            //     'quantity'=>1,
            //     'product_imagename'=>$image)
            // );
            
            // if(empty($_SESSION["shopping_cart"])) {  //if the shopping cart session is empty, store the cart array to the session.
            //     $_SESSION["shopping_cart"] = $cartArray; 
            //     $status = "<div class='box'>Product is added to your cart!</div>";
            //     print_r($_SESSION["shopping_cart"]);

            //     echo $status;
            //     //reset the data
                
                
            // }else{
            //     $array_keys = array_keys($_SESSION["shopping_cart"]); //check what?????
            //     print_r($_SESSION["shopping_cart"]);
            //     if(in_array($product_ID,$array_keys)) {
            //         $status = "<div>Product is already added to your cart!</div>";
            //         echo $status;
            //     } else {
            //     $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray); //merge the cart array with the shopping cart session array.
            //     $status = "<div class='box'>Product is added to your cart!</div>";
            //     print_r($_SESSION["shopping_cart"]);
            //     echo $status;

            //     }
            // }
        }
    ?>


    <?php
    // ADDED INTEGRATION TO CART (TRIAL)
    

    if(!empty($_SESSION["shopping_cart"])) {
        $cart_count = count(array_keys($_SESSION["shopping_cart"]));   //this count the number of products in the cart (not quantity);
    ?>
    <div class="cart_div">
    <a href="cart.php"><img src="images/cart-icon.png" /> Cart<span><?php echo '(' . $cart_count . ')' ?></span></a>
    </div>

    <!-- add javascript to change button number -->
    <!-- <script>
         function updateCartNumber() {
            document.getElementById('count').innerHTML =  <?php echo $cart_count ?> ;
         }
         window.onload = updateCartNumber;
    </script> -->



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
                    <p><a href = "mainPage.php">Home</a> / <a href = "category-allProducts.php">All Products</a> / <a href = '<?php echo 'category-' .  $product['product_category'] . '.php'?>'> <?php echo $product['product_category']?> </a></p>
                    <h1><?php echo $product['product_name'] ?></h1>
                    <h4 style="margin: 40px 0; font-size: 22px; font-weight: bold;">$ <?php echo $product['product_price'] ?> / each</h4>
                    <p><?php echo 'Weight:  ' . $product['product_weight'] , ' lbs'?> / each</p>
                    <!-- <input type="number" value="0" min="0" onkeydown="return false"> -->

                    <button name='addToCart' type='submit' class='btn' label="Add to Cart" value="1" onclick="decreaseStock();addToCartMessage();">Add to Cart</button>
                    <p id="stock"><?php echo 'Stock left: ' . $productQuantity ?></p>
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
