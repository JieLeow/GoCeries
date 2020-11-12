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
            <h2><b>All Products</b></h2>

        <form>
          <label for ="sort">Sort By :</label>
          <select name="list" id="list" accesskey="target">
            <option value='none' selected>Choose a category</option>
            <option value="products.php">All Products</option>
            <option value="fruits.php">Fruits</option>
            <option value="vegetables.php">Vegetables</option>
            <option value="dairyneggs.php">Dairy & Eggs</option>
            <option value="/beverages.php">Beverage</option>
          </select>
          <input type=button value="Go" onclick="goToNewPage()" />
        </form>
        <script type="text/javascript">
        function goToNewPage()
        {
            var url = document.getElementById('list').value;
            if(url != 'none') {
                window.location = url;
            }
        }
        </script>


            <!-- <label for ="sort">Sort By :</label>
            <select name = "sort">
                <option>Default</option>
                <option>Price: Low to High</option>
                <option>Price: High to Low</option>
                <option>Average Rating</option>
            </select> -->

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
                  <!-- Fruits -->
                  <a href= ""><img src="images/dairy-milk.jpg"></a>
                  <br>
                  <p>Horizon Organic Half &Half, 1.89 L</p>
                  <p>Weight ~ 4.2 lb</p>
                  <p>$7.99</p>
              </div>

              <div class="col-3">
                  <!-- Fruits -->
                  <a href= ""><img src="images/beverage-applejuice.jpg"></a>
                  <br>
                  <p>Honest Kids Appley Ever After Apple Organic Fruit Juice</p>
                  <p>Weight ~ 3.4 lb</p>
                  <p>$4.29</p>
              </div>

              <div class="col-3">
                  <!-- Fruits -->
                  <a href= ""><img src="images/vegetable-asparagus.jpg"></a>
                  <br>
                  <p>Asparagus</p>
                  <p>Weight ~ 1 lb (bunch)</p>
                  <p>~$3.01 /item</p>
              </div>

              <div class="col-3">
                  <!-- Beverages -->
                 <a href = ""><img src = "images/vegetable-tomato.jpg"></a>
                 <p>Roma Tomato</p>
                  <p>Weight ~ 0.25 lb</p>
                  <p>$1.49 /lb</p>
              </div>

              <div class="col-3">
                  <!-- Vegetables -->
                  <a href = ""><img src = "images/vegetable-pepper.jpg"></a>
                  <p>Green Bell Pepper</p>
                  <p>Weight ~ 0.4 lb</p>
                  <p>$0.99 /each</p>
              </div>

              <div class="col-3">
                  <!-- Fruits -->
                  <a href= ""><img src="images/vegetable-carrot.jpg"></a>
                  <br>
                  <p>Organic Loose Carrot</p>
                  <p>Weight ~ 0.2 lb</p>
                  <p>$0.99 /lb</p>
              </div>

              <div class="col-3">
                  <!-- Beverages -->
                 <a href = ""><img src = "images/vegetable-beans.jpg"></a>
                 <p>Green Beans</p>
                  <p>weight</p>
                  <p>$1.99 /lb</p>
              </div>

              <div class="col-3">
                  <!-- Vegetables -->
                  <a href = ""><img src = "images/vegetable-cabbage.jpg"></a>
                  <p>Green Cabbage</p>
                  <p>Weight ~ 2 lb</p>
                  <p>$0.99 /lb</p>
              </div>

              <div class="col-3">
                  <!-- Beverages -->
                 <a href = ""><img src = "images/beverage-citrusseltzer.jpg"></a>
                 <p>Truly Hard Seltzer Hard Seltzer, Citrus Mix Pack</p>
                  <p>Weight ~ 9 lb</p>
                  <p>$20.69</p>
              </div>

              <div class="col-3">
                  <!-- Vegetables -->
                  <a href = ""><img src = "images/beverage-peachtea.jpg"></a>
                  <p>Honest Tea Organic Fair Trade Peach Tea Gluten Free</p>
                  <p>Weight ~ 1.06 lb</p>
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
                  <p>Weight</p>
                  <p>$8.69</p>
              </div>

              <div class="col-3">
                  <!-- Vegetables -->
                  <a href = ""><img src = "images/beverage-berryseltzer.jpg"></a>
                  <p>Truly Hard Seltzer Berry Variety Hard Seltzer</p>
                  <p>Weight ~ 9 lb</p>
                  <p>$20.69</p>
              </div>

              <div class="col-3">
                  <!-- Beverages -->
                 <a href = ""><img src = "images/dairy-yogurt.jpg"></a>
                 <p>Siggi's Icelandic Style Skyr Non-Fat Yogurt, Vanilla</p>
                  <p>Weight ~ 0.33 lb</p>
                  <p>$1.00</p>
              </div>

              <div class="col-3">
                  <!-- Vegetables -->
                  <a href = ""><img src = "images/dairy-oatmilk.jpg"></a>
                  <p>Califia Farms Oatmilk, Gluten Free</p>
                  <p>Weight ~ 3 lb</p>
                  <p>$4.49</p>
              </div>

              <div class="col-3">
                  <!-- Fruits -->
                  <a href= ""><img src="images/dairy-creamer.jpg"></a>
                  <br>
                  <p>Chobani Pumpkin Spice Coffee Creamer</p>
                  <p>Weight ~ 1.5 lb</p>
                  <p>$4.49</p>
              </div>

              <div class="col-3">
                  <!-- Beverages -->
                 <a href = ""><img src = "images/dairy-vitalegg.jpg"></a>
                 <p>Vital Farms Vital Farms Pasture-Raised (Alfresco) Eggs</p>
                  <p>Weight ~ 2.5 lb</p>
                  <p>$8.79/18ct</p>
              </div>

              <div class="col-3">
                  <!-- Vegetables -->
                  <a href = ""><img src = "images/dairy-eggland.jpg"></a>
                  <p>Eggland's Best Cage Free Grade A Large Brown Eggs</p>
                  <p>Weight ~ 1.3 lb</p>
                  <p>$3.99/ 12ct</p>
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
    
