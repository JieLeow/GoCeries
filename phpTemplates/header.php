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
                          <li><a href = "mainPage.php">Home</a></li>
                          <li><a href = "category-allProducts.php">Products</a></li>
                          <li><a href = "#footer">Contact</a></li>
                          <?php if (isset($_SESSION['user_id'])&& isset($_SESSION['user_loginname'])){ ?>


                           <li><a href = "account.php">Hello, <?php echo $_SESSION['user_name']; ?></a></li>
                           <li><a href = "logout.php">Logout</a></li>
                                 <?php } else { ?>

                                 <li><a href = "account.php">Account</a></li>
                                 <?php } ?>

                             <li><?php
                            if(!empty($_SESSION["shopping_cart"])) {
                            $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                            ?>
                              <a href = "cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
                              <span><?php echo $cart_count; ?></span></a>
                              </div>
                              <?php
                            }
                            ?>
                            </li>
                      </ul>
                  </nav>
              </div>
          </div>
      </div>

  </div>


            <!-- font awesome icons -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
