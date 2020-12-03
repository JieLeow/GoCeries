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
                            <li><a href = "about.php">About</a></li>
                            <?php if (isset($_SESSION['user_id'])&& isset($_SESSION['user_loginname'])){ ?>


                             <li><a href = "account.php">Hello, <?php echo $_SESSION['user_name']; ?></a></li>
                             <li><a href = "logout.php">Logout</a></li>
                                   <?php } else { ?>

                                   <li><a href = "account.php">Account</a></li>
                                   <?php } ?>
                            <li><a href = "cart.php"><i class="fa fa-shopping-cart cart-icon" aria-hidden="true"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
