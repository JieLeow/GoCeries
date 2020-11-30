<?php

session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		// if($_POST["product_ID"] == $key)
		if($_POST["product_ID"] == $_SESSION["shopping_cart"][$key]['product_ID']){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'> Product is removed from your cart!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['product_ID'] === $_POST["product_ID"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}

}
?>
<html>
<head>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goceries</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="style.css">
		<!-- additional CSS -->
		<style>
  	.product_wrapper {
			float:left;
			padding: 10px;
			text-align: center;
			}
		.product_wrapper:hover {
			box-shadow: 0 0 0 2px #e5e5e5;
			cursor:pointer;
			}
		.product_wrapper .name {
			font-weight:bold;
			}
		.product_wrapper .buy {
			text-transform: uppercase;
				background: #F68B1E;
				border: 1px solid #F68B1E;
				cursor: pointer;
				color: #fff;
				padding: 8px 40px;
				margin-top: 10px;
		}
		.product_wrapper .buy:hover {
			background: #f17e0a;
				border-color: #f17e0a;
		}
		.message_box .box{
			margin: 10px 0px;
				border: 1px solid #2b772e;
				text-align: center;
				font-weight: bold;
				color: #2b772e;
			}
		.table td {
			border-bottom: #F0F0F0 1px solid;
			padding: 10px;
			}
		.cart_div {
			float:right;
			font-weight:bold;
			position:relative;
			}
		.cart_div a {
			color:#000;
			}
		.cart_div span {
			font-size: 12px;
				line-height: 14px;
				background: #F68B1E;
				padding: 2px;
				border: 2px solid #fff;
				border-radius: 50%;
				position: absolute;
				top: -1px;
				left: 13px;
				color: #fff;
				width: 14px;
				height: 13px;
				text-align: center;
			}
		.cart .remove {
				background: none;
				border: none;
				color: #0067ab;
				cursor: pointer;
				padding: 0px;
			}
		.cart .remove:hover {
			text-decoration:underline;
			}

		.button2 {

		width: 200px;
		height: 40px;
		font-size: 16px;
		background-color: rgb(162, 253, 57);
		border-radius: 6px;
		border: none;
		cursor: pointer;
		margin-top: 10px;
		color:gray;
		/* margin-left:30px; */
		}

		.empty-cart{
			margin-top: 250px;
			margin-bottom: 2px;
			text-align: center;
		}

		</style>
</head>
<!-- HEADER -->
<?php
			include('phpTemplates/header.php');
	?>
	<!-- BODY -->

<body>
	<div style="width:1000px; margin:50 auto;">
<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>
<table class="table">
<tbody>
<tr>
<td></td>
<td>PRODUCT NAME</td>
<td>QUANTITY</td>
<td>PRODUCT PRICE</td>
<td>TOTAL </td>
<td>TOTAL WEIGHT</td>

</tr>

<?php
foreach ($_SESSION["shopping_cart"] as $product){
?>

<tr>
<td><img src='<?php echo 'images/' . $product["product_imagename"]; ?>' width="80" height="60" /></td>
<td><?php echo $product["product_name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='product_ID' value="<?php echo $product["product_ID"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='product_ID' value="<?php echo $product["product_ID"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
<option <?php if($product["quantity"]==6) echo "selected";?> value="6">6</option>
<option <?php if($product["quantity"]==7) echo "selected";?> value="7">7</option>
<option <?php if($product["quantity"]==8) echo "selected";?> value="8">8</option>
<option <?php if($product["quantity"]==9) echo "selected";?> value="9">9</option>
<option <?php if($product["quantity"]==10) echo "selected";?> value="10">10</option>
</select>
</form>
</td><td><?php echo "$".$product["product_price"]; ?></td>
<td><?php echo "$".$product["product_price"]*$product["quantity"]; ?></td>
<td><?php echo $product["product_weight"]*$product["quantity"]. " lbs"; ?></td>

</tr>

<?php
global $total_weight;
$total_price += ($product["product_price"]*$product["quantity"]);
$taxes = ($total_price*10)/100;
$final_amount = $total_price + $taxes;
$total_weight += ($product["product_weight"]*$product["quantity"]);
$delivery = 0;
if($total_weight>20){
    $delivery  = 5;
} else {$delivery = 0;}
$final_amount = $total_price + $taxes + $delivery;
}
?>
</table>
<table class="table">
<tr>
<td colspan="5" align="right">
<strong>Total: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
<tr>
<td colspan="5" align="right">
	<strong>Taxes: <?php echo "$".sprintf("%.2f", $taxes); ?></strong>
</td>
</tr>
<tr>
<td colspan="5" align="right">
<strong>Delivery Fee: <?php echo "$".$delivery."  (".$total_weight." lbs)" ; ?></strong>
</td>
</tr>
<tr>
<td colspan="5" align="right">
	<strong>Final Amount: <?php echo "$".sprintf("%.2f", $final_amount); ?></strong>
</td>
<tr>
<td colspan="5" align="right">

<form method= "post" action='checkout.php'>
	<input type = "hidden" name = "totalprice" value = "<?php echo $total_price?>" />
	<input type = "hidden" name = "taxes" value = "<?php echo $taxes?>" />
	<input type = "hidden" name = "deliveryfee" value = "<?php echo $delivery ?>" />
	<input type = "hidden" name = "finalprice" value = "<?php echo $final_amount?>" />

	<button type="submit" id="myButton" class="button2" >Proceed to Checkout</button>
</form>


</td>
<tr>

</tr>
</tbody>
  <?php
}else{

	?>
	<div class='small-container empty-cart'>
		<h3>Your cart is empty!</h3>
		<p> View our products <a href ='category-allProducts.php'>here!</a></p>
	</div>
	
	<?php 
	}
	?>

</table>

</div>
</div>
</body>
</html>
<!-- FOOTER -->
<?php
    include('phpTemplates/footer.php');
?>
