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
                            <?php if (isset($_SESSION['id'])&& isset($_SESSION['user_name'])){ ?>


                          <li><a href = "account.php">Hello, <?php echo $_SESSION['name']; ?></a></li>
                          <li><a href = "logout.php">Logout</a></li>
                                <?php } else { ?>

                                <li><a href = "account.php">Account</a></li>
                                <?php } ?>
                            <li><a href = ""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                            <li><a href = ""><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
