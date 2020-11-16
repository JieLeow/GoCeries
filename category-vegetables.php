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
            <h2><b>Vegetables</b></h2>

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
                    <a href= ""><img src="images/vegetable-asparagus.jpg"></a>
                    <br>
                    <p>Asparagus</p>
                    <p>Weight ~ 1 lb (bunch)</p>
                    <p>~$3.01</p>
                </div>

                <div class="col-3">
                    <!-- Beverages -->
                   <a href = ""><img src = "images/vegetable-tomato.jpg"></a>
                   <p>Roma Tomato</p>
                    <p>Weight ~ 0.25 lb /each</p>
                    <p>$1.49</p>
                </div>

                <div class="col-3">
                    <!-- Vegetables -->
                    <a href = ""><img src = "images/vegetable-pepper.jpg"></a>
                    <p>Green Bell Pepper</p>
                    <p>Weight ~ 0.4 lb /each</p>
                    <p>$0.99</p>
                </div>

                <div class="col-3">
                    <!-- Fruits -->
                    <a href= ""><img src="images/vegetable-carrot.jpg"></a>
                    <br>
                    <p>Organic Loose Carrot</p>
                    <p>Weight ~ 0.2 lb /each</p>
                    <p>$0.99</p>
                </div>

                <div class="col-3">
                    <!-- Beverages -->
                   <a href = ""><img src = "images/vegetable-beans.jpg"></a>
                   <p>Green Beans</p>
                    <p>Weight ~ 1lb /bag</p>
                    <p>$1.99</p>
                </div>

                <div class="col-3">
                    <!-- Vegetables -->
                    <a href = ""><img src = "images/vegetable-cabbage.jpg"></a>
                    <p>Green Cabbage</p>
                    <p>Weight ~ 2 lbs /each</p>
                    <p>$0.99</p>
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
