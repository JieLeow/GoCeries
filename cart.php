<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goceries</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="css/cartpage.css">

    <?php
    ob_start();

    // require functions.php file
    require ('functions.php');
    ?>
</head>


<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['delete-cart-submit'])){
            $deletedrecord = $Cart->deleteCart($_POST['product_ID']);
        }
    }
?>
<!-- HEADER -->
<div class="header">
    <div class = header-nav>
        <div class = "container">
            <div class = "navbar">
                <div class = "logo">
                    <h1>GOCERIES</h1>
                </div>

                <nav>
                    <ul>
                      <li><a href = "mainPage.html">Home</a></li>
                      <li><a href = "products.html">Products</a></li>
                        <li><a href = "">Contact</a></li>
                        <li><a href = "">Account</a></li>
                        <li><a href = ""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
  <section id="cart" class="py-3 mb-5">
      <div class="container-fluid w-75">
          <h5 class="font-baloo font-size-20">Shopping Cart</h5>

          <!--  shopping cart items   -->
          <div class="row">
              <div class="col-sm-9">
                  <?php
                      foreach ($product->getData('orders') as $item) :
                          $cart = $product->getProduct($item['product_ID']);
                          $subTotal[] = array_map(function ($item){
                  ?>
                  <!-- cart item -->
                  <div class="row border-top py-3 mt-3">
                      <div class="col-sm-2">
                          <img src="<?php echo $item['product_imagename']?>" style="height: 120px;" alt="cart1" class="img-fluid">
                      </div>
                      <div class="col-sm-8">
                          <h5 class="font-baloo font-size-20 mb-2"><?php echo $item['product_name']?></h5>
                          <h6 class="font-baloo font-size-20 mb-2"><?php echo $item['product_weight']?> lbs</h6>

                          <!-- product qty -->
                          <div class="qty d-flex pt-2">
                              <div class="d-flex font-rale w-25">
                                  <button class="qty-up border bg-light" data-id="<?php echo $item['product_ID'] ?? '0'; ?>"><i class="fas fa-angle-up"></i></button>
                                  <input type="text" data-id="<?php echo $item['product_ID'] ?? '0'; ?>" class="qty_input border px-2 w-100 bg-light" disabled value="1" placeholder="1">
                                  <button data-id="<?php echo $item['product_ID'] ?? '0'; ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                              </div>

                              <form method="post">
                                  <input type="hidden" value="<?php echo $item['product_ID'] ?? 0; ?>" name="product_ID">
                                  <button type="submit" name="delete-cart-submit" class="buttons">Delete</button>
                              </form>

                          </div>
                          <!-- !product qty -->

                      </div>

                      <div class="col-sm-2 text-right">
                          <div class="font-size-20 text-danger font-baloo">
                              $<span class="product_price" data-id="<?php echo $item['product_ID'] ?? '0'; ?>"><?php echo $item['product_price'] ?? 0; ?></span>
                          </div>
                      </div>
                  </div>
                  <!-- !cart item -->
                  <?php
                  return $item['product_price'];

                          }, $cart); // closing array_map function
                        endforeach;
                                          ?>
              </div>
              <!-- subtotal section-->
              <div class="col-sm-3">
                  <div class="sub-total border text-center mt-2">
                      <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                      <div class="border-top py-4">
                          <h5 class="font-baloo font-size-20">Subtotal ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span> </span> </h5>
                          <h5 class="font-baloo font-size-20">Cart weight ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span> </span> </h5>
                          <button type="submit" class="button2">Proceed to Buy</button>
                      </div>
                  </div>
              </div>
              <!-- !subtotal section-->
          </div>
          <!--  !shopping cart items   -->
      </div>
  </section>

<!-- !start #footer -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!-- Custom Javascript -->
<script src="index.js"></script>
</body>
</html>
