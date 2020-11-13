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
            <h2><b>Dairy & Eggs</b></h2>

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
        <script type="text/javascript">
        function goToNewPage()
        {
            var url = document.getElementById('list').value;
            if(url != 'none') {
                window.location = url;
            }
        }
        </script>

            <div class = "row">
                <div class="col-3">
                    <!-- Fruits -->
                    <a href= ""><img src="images/dairy-milk.jpg"></a>
                    <br>
                    <p>Horizon Organic Half &Half, 1.89 L</p>
                    <p>Weight ~ 4.2 lb</p>
                    <p>$7.99</p>
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
