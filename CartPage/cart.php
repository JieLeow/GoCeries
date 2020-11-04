<?php

session_start();

require_once ("createDb.php");
$db = new CreateDb("Productdb", "Producttb");

if (isset($_POST['remove'])){
  if ($_GET['action'] == 'remove'){
      foreach ($_SESSION['cart'] as $key => $value){
          if($value["product_id"] == $_GET['id']){
              unset($_SESSION['cart'][$key]);
              echo "<script>alert('Product has been Removed...!')</script>";
              echo "<script>window.location = 'cart.php'</script>";
          }
      }
  }
}



?>

<?php
function cartElement($productimg, $productname, $productprice, $productid){
    $element = "
    <form action='cart.php?action=remove&id=$productid' method='post' class='cart-items'>
      <div class='item'>
       <div><button type='submit' class='buttons' name='remove'>Remove</button>
        </div>

       <div class='image'>
         <img src='$productimg' width='100' height='100' alt='' />
       </div>

       <div class='description'>
         <span>$productname</span>
       </div>

       <div class='quantity'>
         <button class='plus-btn' type='button' name='button'>
           <img src='plus.svg' alt='' />
         </button>
         <input type='text' name='name' value='1'>
         <button class='minus-btn' type='button' name='button'>
           <img src='minus.svg' alt='' />
         </button>
       </div>

       <div class='total-price'>$$productprice</div>
     </div>
     </form>
     ";
     echo  $element;
 }

?>

<html>
<head>
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="styles.css">
</head>


<body class="bg">
  <div class="header">
       <div class = "header-nav">
           <div class = "container">
               <div class = "navbar">
                   <div class = "logo">
                       <h1>GOCERIES</h1>
                   </div>

                   <nav>
                       <ul>
                           <li><a href = "index.php">Home</a></li>
                           <li><a href = "">Products</a></li>
                           <li><a href = "">Contact</a></li>
                           <li><a href = "">Account</a></li>
                           <li><a href = ""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                       </ul>
                   </nav>
               </div>
           </div>
       </div>
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-md-7">
                <div class="shopping_cart">
                  <div class="title">My Cart</div>
                <hr>

                <?php
                $total = 0;
                    if (isset($_SESSION['cart'])){
                        $product_id = array_column($_SESSION['cart'], 'product_id');

                        $result = $db->getData();
                        while ($row = mysqli_fetch_assoc($result)){
                            foreach ($product_id as $id){
                                if ($row['id'] == $id){
                                    cartElement($row['product_image'], $row['product_name'],$row['product_price'], $row['id']);
                                    $total = $total + (int)$row['product_price'];
                                }
                            }
                        }
                    }else{
                        echo "<h5>Cart is Empty</h5>";
                    }
                ?>
                <hr>
                </div>
            </div>
<div class="col-md-4 offset-md-1 border rounded m-4 bg-light h-25">
            <div class="pt-4">
                <h6>SHOPPING CART DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if (isset($_SESSION['cart'])){
                                $count  = count($_SESSION['cart']);
                                echo "<h6>Price ($count items)</h6>";
                            }else{
                                echo "<h6>Price (0 items)</h6>";
                            }
                        ?>
                        <h6>Delivery Fee</h6>
                        <hr>
                        <h6>Final Amount</h6>
                    </div>
                    <div class="col-md-6">
                        <h6>$<?php echo $total; ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>$
                          <?php  echo $total; ?>
                          </h6>
                    </div>
                </div>
            </div>

        </div>
      </div>
    </div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
