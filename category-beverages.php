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


<body>

    <!-- HEADER -->
    <?php
        include('phpTemplates/header.php')
    ?>

    <!-- ALL PRODUCTS SECTION -->
    <div class="categories all-products">

        <div class="small-container">
            <h2><b>Beverages</b></h2>

        <form>
          <label for ="sort">Sort By :</label>
          <select name="list" id="list" accesskey="target">
            <option value='none' selected>Choose a category</option>
            <option value="category-allproducts.php">All Products</option>
            <option value="category-fruits.php">Fruits</option>
            <option value="category-vegetables.php">Vegetables</option>
            <option value="category-dairyneggs.php">Dairy & Eggs</option>
            <option value="category-beverages.php">Beverage</option>
          </select>
          <input type=button value="Go" onclick="goToNewPage()" />
        </form>


            <div class = "row">
                <div class="col-3">
                    <!-- Fruits -->
                    <a href= ""><img src="images/beverage-applejuice.jpg"></a>
                    <br>
                    <p>Honest Kids Appley Ever After Apple Organic Fruit Juice</p>
                    <p>Weight ~ 3.4 lbs</p>
                    <p>$4.29</p>
                </div>

                <div class="col-3">
                    <!-- Beverages -->
                   <a href = ""><img src = "images/beverage-citrusseltzer.jpg"></a>
                   <p>Truly Hard Seltzer Hard Seltzer, Citrus Mix Pack</p>
                    <p>Weight ~ 9 lbs</p>
                    <p>$20.69</p>
                </div>

                <div class="col-3">
                    <!-- Vegetables -->
                    <a href = ""><img src = "images/beverage-peachtea.jpg"></a>
                    <p>Honest Tea Organic Fair Trade Peach Tea Gluten Free</p>
                    <p>Weight ~ 1.06 lbs</p>
                    <p>$1.48</p>
                </div>

                <div class="col-3">
                    <!-- Fruits -->
                    <a href= ""><img src="images/beverage-kombucha.jpg"></a>
                    <br>
                    <p>Gt's Organic Kombucha, Enlightened Synergy-Trilogy</p>
                    <p>Weight ~ 1 lb</p>
                    <p>$3.19</p>
                </div>

                <div class="col-3">
                    <!-- Beverages -->
                   <a href = ""><img src = "images/beverage-minttea.jpg"></a>
                   <p>Numi Organic Caffeine Free Tea Bags Moroccan Mint</p>
                    <p>Weight ~ .09 lbs</p>
                    <p>$8.69</p>
                </div>

                <div class="col-3">
                    <!-- Vegetables -->
                    <a href = ""><img src = "images/beverage-berryseltzer.jpg"></a>
                    <p>Truly Hard Seltzer Berry Variety Hard Seltzer</p>
                    <p>Weight ~ 9 lbs</p>
                    <p>$20.69</p>
                </div>


            </div>

            <div class = "products-button">
                <span>1</span>
                <span>2</span>
                <span>3</span>
                <span>4</span>
            </div>

        </div>
    </div>

<!-- footer -->
<?php
    include('phpTemplates/footer.php')
?>
