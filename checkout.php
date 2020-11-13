<html>
  <head>

  <style>
  body {
    box-sizing: border-box;
  }
  .row {
    display: -ms-flexbox; /* IE10 */
    display: flex;
    -ms-flex-wrap: wrap; /* IE10 */
    flex-wrap: wrap;
    margin: 0 -16px;
  }
  .col-25 {
    -ms-flex: 15%; /* IE10 */
    flex: 15%;
  }
  .col-50 {
    -ms-flex: 5%; /* IE10 */
    flex: 50%;
  }
  .col-75 {
    -ms-flex: 65%; /* IE10 */
    flex: 65%;
  }
  .col-25,
  .col-50,
  .col-75 {
    padding: 0 16px;
  }
  .container {
    padding: 5px 20px 15px 20px;
    border-radius: 3px;
  }
  input[type=text] {
    width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }
  label {
    margin-bottom: 10px;
    display: block;
  }
  .btn {
    background-color: #4CAF50;
    color: white;
    padding: 12px;
    margin: 10px 0;
    border: none;
    width: 100%;
    border-radius: 3px;
    cursor: pointer;
    font-size: 17px;
  }
  .btn:hover {
    background-color: #45a049;
  }
  a {
    color: #2196F3;
  }
  hr {
    border: 1px solid lightgrey;
  }
  span.price {
    float: right;
    color: grey;
  }
  </style>

<link href="css/style.css" rel="stylesheet">


</head>

<body>

    <!-- HEADER -->
    <?php
      include('phpTemplates/header.php');
  ?>

  <!-- Main checkout container -->
  <h2>Checkout</h2>
  <p></p>
  <div class="row">
    <div class="col-75">
      <div class="container" style="background-color: #f2f2f2; margin-left:25px;
      margin-bottom:25px;">
        <form action="./confirmation.php" method="post">

          <div class="row">
            <div class="col-50">
              <h3>Shipping Address</h3>
              <label for="fname"><i class="fa fa-user"></i>Full Name</label>
              <input type="text" id="ShippingFname" name="shippingfullname" placeholder="">
              <label for="email"><i class="fa fa-envelope"></i>Email</label>
              <input type="text" id="ShippingEmail" name="shippingemail" placeholder="">
              <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input type="text" id="ShippingAddress" name="shippingaddress" placeholder="">
              <label for="city"><i class="fa fa-institution"></i> City</label>
              <input type="text" id="ShippingCity" name="shippingcity" placeholder="">

              <div class="row">
                <div class="col-50">
                  <label for="state">State</label>
                  <input type="text" id="ShippingState" name="shippingstate" placeholder="">
                </div>
                <div class="col-50">
                  <label for="zip">Zip</label>
                  <input type="text" id="ShippingZip" name="shippingzip" placeholder="">
                </div>
              </div>
            </div>

            <div class="col-50">
              <h3>Payment</h3>
              <label for="fname">Accepted Cards</label>
              <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
              </div>
              <label for="cname">Name on Card</label>
              <input type="text" id="cname" name="cardname" placeholder="">
              <label for="ccnum">Credit card number</label>
              <input type="text" id="ccnum" name="cardnumber" placeholder="">
              <label for="expmonth">Exp Month</label>
              <input type="text" id="expmonth" name="expmonth" placeholder="">
              <div class="row">
                <div class="col-50">
                  <label for="expyear">Exp Year</label>
                  <input type="text" id="expyear" name="expyear" placeholder="">
                </div>
                <div class="col-50">
                  <label for="cvv">CVV</label>
                  <input type="text" id="cvv" name="cvv" placeholder="">
                </div>
              </div>
            </div>
          </div>

          <label>
            <div class="form-group">
              <input id="checkbox" type="checkbox" onclick="boxUnchcked()"
              setBilling="checked">
              Billing address same as shipping
            </div>

            <!-- Shipping container if billing and shipping address are not the same -->
            <label>
              <div id="billing" style="display:block;">
                <div class="form-group">
                        <div class="row">
                        <div class="col-50">
                          <h3>Billing Address</h3>
                          <label for="fname"><i class="fa fa-user"></i>Full Name</label>
                          <input type="text" id="BillingFname" name="billingfullname" placeholder="">
                          <label for="email"><i class="fa fa-envelope"></i>Email</label>
                          <input type="text" id="BillingEmail" name="billingemail" placeholder="">
                          <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                          <input type="text" id="BillingAddress" name="billingaddress" placeholder="">
                          <label for="city"><i class="fa fa-institution"></i> City</label>
                          <input type="text" id="BillingCity" name="billingcity" placeholder="">

                          <div class="row">
                            <div class="col-50">
                              <label for="state">State</label>
                              <input type="text" id="BillingState" name="billingstate" placeholder="">
                            </div>
                            <div class="col-50">
                              <label for="zip">Zip</label>
                              <input type="text" id="BillingZip" name="billingzip" placeholder="">
                            </div>
                          </div>
                        </div>
                        </div>
                </div>
              </div>
            </label>

            <!-- Script for showing container for different shipping address -->
            <script>
            var checkbox = document.getElementById('checkbox');
            var billing_div = document.getElementById('billing');
            checkbox.onclick = function() {
                console.log(this);
               if(this.checked == false) {
                 billing_div.style['display'] = 'block';
                 document.getElementById('BillingFname').value = '';
                 document.getElementById('BillingEmail').value = '';
                 document.getElementById('BillingAddress').value = '';
                 document.getElementById('BillingCity').value = '';
                 document.getElementById('BillingState').value = '';
                 document.getElementById('BillingZip').value = '';
               } else {
                 billing_div.style['display'] = 'none';
                 document.getElementById('BillingFname').value = document.getElementById('ShippingFname').value;
                 document.getElementById('BillingEmail').value = document.getElementById('ShippingEmail').value;
                 document.getElementById('BillingAddress').value = document.getElementById('ShippingAddress').value;
                 document.getElementById('BillingCity').value = document.getElementById('ShippingCity').value;
                 document.getElementById('BillingState').value = document.getElementById('ShippingState').value;
                 document.getElementById('BillingZip').value = document.getElementById('ShippingZip').value;
               }
            };
            </script>

          <!-- Place order button to proceed to confirmation page -->
          </label>
          <input type="submit" value="Place Your Order" class="btn">
        </form>
      </div>
    </div>

    <!-- Cart -->
    <div class="col-25">
      <div class="container" style="background-color: #f2f2f2; margin-right:25px;">
        <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b></b></span></h4>
        <p><a href="#">Product 1</a> <span class="price"></span></p>
        <p><a href="#">Product 2</a> <span class="price"></span></p>
        <p><a href="#">Product 3</a> <span class="price"></span></p>
        <p><a href="#">Product 4</a> <span class="price"></span></p>
        <hr>
        <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <?php
      include('phpTemplates/footer.php');
  ?>
