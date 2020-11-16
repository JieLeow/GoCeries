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


<!-- additional CSS -->
<style>
    td {
        border: 1px solid black;
        padding: 6px;
    }

    table {
        float: left;
        border-collapse: collapse;
    }

    input {
        width: 60px; 
        height: 40px; 
        outline: none;
        padding-left: 10px; 
        font-size: 20px; 
        margin-right: 10px; 
        border: 1px solid #23ae00;
        caret-color: transparent;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -khtml-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none;
    }
</style>


<body>

    <!-- HEADER -->
    <?php
        include('phpTemplates/header.php');

        include('functions.php'); //not sure (does it create new connection everytime?)

        $products = $product->getProductDetailsData();

        //now, print product title based on image clicked/ use post request? yes. most likely.

    ?>

    <!-- single product details -->
    <div class="small-container" style="margin-top: 80px;">
        <div class = "row">
            <div style= "flex: 50%; min-width: 180px; margin-bottom: 30px;">
                <img src="images/fruit-banana.jpg" width="100%" style="padding: 0;">
            </div>
            <div style= "flex: 50%; min-width: 180px; margin-bottom: 30px; padding: 20px;">
                <p>Home / Fruits</p>
                <h1>Organic Banana</h1>
                <h4 style="margin: 40px 0; font-size: 22px; font-weight: bold;">$0.31/each</h4>
                  <input type="number" value="0" min="0" onkeydown="return false">
                <a href="" class="btn">Add To Cart</a>
                <h3>Nutritional Facts</h3> 
                <br>
                <table>
                    <tbody>
                      <tr>
                        <td>Serving Size: <b>1 medium</b></td>
                        <td>Calories: <b>105</b></td>
                      </tr>
                      <tr>
                        <td>Total Fat: <b>0.4 g</b></td>
                        <td>Protein: <b>1.3 g</b></td>
                      </tr>
                      <tr>
                        <td>Total Carbohydrate: <b>27 g</b></td>
                        <td>Total Sugars: <b>14.4 g</b></td>
                      </tr>
                      <tr>
                        <td>Sodium: <b>1.2 mg</b></td>
                        <td>Calcium <b>5.9 mg</b></td>
                      </tr>
                    </tbody>
                  </table>
                
            </div>
        </div>
    </div>


    <!-- related products -->
    <div class="small-container">
        <div class = "row">
            <h2 style="float: left; margin-left: 50px;">Related Products</h2>
            <p style="float: right; margin-right: 50px;">View More</p>
        </div>
    </div>


    <!-- SUGGESTED PRODUCTS SECTION -->
    <div class="categories all-products">
        <div class="small-container">
            <div class = "row">
                <div class="col-3">
                    <!-- Fruits -->
                    <a href= ""><img src="images/fruit-banana.jpg"></a> 
                    <br>
                    <p>Banana</p> 
                    <p>Rating</p>
                    <p>Price: </p>
                </div>

                <div class="col-3">
                    <!-- Beverages -->
                   <a href = ""><img src = "images/beverage-applejuice.jpg"></a>
                   <p>Banana</p> 
                    <p>Rating</p>
                    <p>Price: </p>
                </div>

                <div class="col-3">
                    <!-- Vegetables -->
                    <a href = ""><img src = "images/dairy-eggland.jpg"></a>
                    <p>Banana</p> 
                    <p>Rating</p>
                    <p>Price: </p>
                </div>
            </div>

        </div>
    </div>


<!-- FOOTER -->
    <?php
        include('phpTemplates/footer.php');
    ?>
