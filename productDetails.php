<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_loginname'])) {

 ?>
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

    .add-btn{
        margin-left: 0px;
        margin-bottom: 10px;
    }

    #stock{
        margin-left: 5px;
    }
</style>


<body>

    <!-- HEADER -->
    <?php
        include('phpTemplates/header.php');
        include('functions.php'); 
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

        if (isset($_GET['product_id']) && $_GET['product_id']!=""){
            $product_ID = $_GET['product_id'];
            $result = mysqli_query($db->con,"SELECT * FROM `products` WHERE `product_ID`='$product_ID'");
            $row = mysqli_fetch_assoc($result);
            $name = $row['product_name'];
            $product_ID = $row['product_ID'];
            $price = $row['product_price'];
            $image = $row['product_imagename'];
            $weight = $row['product_weight'];
            $stock = $row['product_stock'];


            $productDetailsArray = array(
                'product_name'=>$name,
                'product_ID'=>$product_ID,
                'product_price'=>$price,
                'product_weight'=>$weight,
                'quantity'=>1, //default quantity = 1; is there a problem here?
                'product_imagename'=>$image,
                'product_stock'=>$stock
            );


            $alreadyInCart = false;

            //debug
            $counter = 1;

            //define a session variable that is an array of tempProductQuantities.
            $tempProductQuantity = $product->getProductStock($_GET['product_id']);

            //echo '<br>product id is: ' . $_GET['product_id'] . '<br>';

            //works, but fix for better readability?
            if(!isset( $_SESSION['tempProductQuantity'][$product_ID] )){
                $_SESSION['tempProductQuantity'][$product_ID] = $tempProductQuantity; //initialize to quantity in product db
            }





            if(isset($_POST['addToCart'])){

                if(empty($_SESSION['shopping_cart'])){
                    $_SESSION['shopping_cart'] = array();
                    $_SESSION['shopping_cart'][$product_ID] = $productDetailsArray;
                    $alreadyInCart = true;

                //temporary products stock counter
                if($_SESSION['tempProductQuantity'][$product_ID] > 0){
                    $_SESSION['tempProductQuantity'][$product_ID] = $_SESSION['tempProductQuantity'][$product_ID]- 1;
                }

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
                            if($_SESSION['tempProductQuantity'][$product_ID] > 0){
                                $_SESSION['tempProductQuantity'][$product_ID] = $_SESSION['tempProductQuantity'][$product_ID]- 1;
                            }

                        }
                    }
                    if(!$alreadyInCart){ //where cart is not empty, but product not in cart
                        $_SESSION['shopping_cart'][$product_ID] = $productDetailsArray;
                        $alreadyInCart = true;

                        if($_SESSION['tempProductQuantity'][$product_ID] > 0){
                            $_SESSION['tempProductQuantity'][$product_ID] = $_SESSION['tempProductQuantity'][$product_ID]- 1;
                        }

                    }
                }


                //debug temp stock counter
                // echo 'product stock left is: ' . $_SESSION['tempProductQuantity'][$product_ID]. '<br>';
                // print_r( $_SESSION['tempProductQuantity']);
                // //debug
                // echo '<br>' . 'is product in cart?';
                // echo $alreadyInCart ? ' true' : ' false';

                // echo "<br><br><br>";
                // print_r($_SESSION['shopping_cart']);

                // $_POST['addToCart'] = NULL;
                // print_r($_POST['addToCart']);
            }
            
        }
    ?>


    <?php
    // ADDED INTEGRATION TO CART 


    if(!empty($_SESSION["shopping_cart"])) {
        $cart_count = count(array_keys($_SESSION["shopping_cart"]));   //this count the number of products in the cart (not quantity);
    ?>
    <!-- cart icon with number -->
    <!-- <div class="cart_div">
    <a href="cart.php"><img src="images/cart-icon.png" /> Cart<span><?php //echo $cart_count; ?></span></a>
    </div> -->



    <?php
    }//ADDED INTEGRATION TO CART END AT THIS LINE

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
                    <?php if($_SESSION['tempProductQuantity'][$product_ID] > 0) {?>
                    <button name='addToCart' type='submit' class='btn add-btn' label="Add to Cart" value="1" onclick="decreaseStock()">Add to Cart</button>
                    <p id="stock"><?php echo 'Stock left: ' . $_SESSION['tempProductQuantity'][$product_ID] ?></p>
                  <?php } else { ?> <p> OUT OF STOCK </p>
                  <?php } ?><br><br>
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

<!-- prevents refreshing of page for unwanted post request -->
<script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
</script>


<!-- FOOTER -->
    <?php
        include('phpTemplates/footer.php');
    ?>
    <?php
    }else{
         header("Location: loginregister.php?error=You need to login before shopping");
         exit();
    }
     ?>
