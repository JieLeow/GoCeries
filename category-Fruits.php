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
        include('phpTemplates/header.php');
    ?>

    <!-- ALL PRODUCTS SECTION -->
    <div class="categories all-products">

        <div class="small-container">
            <h2><b>Fruits</b></h2>

        <form>
          <label for ="sort">Sort By :</label>
          <select name="list" id="list" accesskey="target">
            <option value='none' selected>Choose a category</option>
            <option value="./category-allproducts.php">All Products</option>
            <option value="./category-fruits.php">Fruits</option>
            <option value="./category-vegetables.php">Vegetables</option>
            <option value="./category-dairyneggs.php">Dairy & Eggs</option>
            <option value="./category-beverages.php">Beverage</option>
          </select>
          <input type=button value="Go" onclick="goToNewPage()" />
        </form>

            <div class = "row">
                <div class="col-3">
                    <!-- Fruits -->
                    <a href= ""><img src="images/fruit-apple.jpg"></a>
                    <br>
                    <p>Organic Gala Apple</p>
                    <p>Weight ~ 0.35lb</p>
                    <p>$0.76/each</p>
                </div>

                <div class="col-3">
                    <!-- Beverages -->
                   <a href = ""><img src = "images/fruit-banana.jpg"></a>
                   <p>Organic Bananas</p>
                    <p>Weight ~ 0.4 lb</p>
                    <p>$0.31 /item | $0.75 /lb</p>
                </div>

                <div class="col-3">
                    <!-- Vegetables -->
                    <a href = ""><img src = "images/fruit-peach.jpg"></a>
                    <p>Organic White Peach</p>
                    <p>Weight ~ 0.3 lb</p>
                    <p>$1.81/each </p>
                </div>

                <div class="col-3">
                    <!-- Fruits -->
                    <a href= ""><img src="images/fruit-blueberry.jpg"></a>
                    <br>
                    <p>Organic Blueberries Package</p>
                    <p>6oz Container</p>
                    <p>$3.99 /each</p>
                </div>

                <div class="col-3">
                    <!-- Beverages -->
                   <a href = ""><img src = "images/fruit-strawberry.jpg"></a>
                   <p>Strawberries</p>
                    <p>1lb Container</p>
                    <p>$4.50 /each</p>
                </div>

                <div class="col-3">
                    <!-- Vegetables -->
                    <a href = ""><img src = "images/fruit-cantaloupe.jpg"></a>
                    <p>Cantaloupe</p>
                    <p>Weight ~ 2 lb</p>
                    <p>$2.50 /each</p>
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

 <!-- FOOTER -->
 <?php
      include('phpTemplates/footer.php');
  ?>