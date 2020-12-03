<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_SESSION['user_loginname'])) {

 ?>
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
  input[type=number] {
    width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }
  input[type=email] {
    width: 100%;
    margin-bottom: 20px;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 3px;
  }
  select {
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

  h2{
    text-align: center;
    margin-top: 20px;
    margin-bottom: 20px;
  }

  hr{
    margin-bottom: 20px;
  }
  </style>

<link href="css/style.css" rel="stylesheet">


</head>

<body>

    <!-- HEADER -->
    <?php
      include('phpTemplates/header.php');
  ?>

  <?php

    foreach($_POST as $key=>$val) {
      $_SESSION['POST'][$key] = $val;
    }
   ?>

  <!-- Main checkout container -->
  <h2>Checkout</h2>
  <hr>
  <div class="row">
    <div class="col-75">
      <div class="container" style="background-color: #f2f2f2; margin-left:25px;
      margin-bottom:25px;">
        <form action="confirmation.php" method="post">

          <div class="row">
            <div class="col-50">
              <h3>Shipping Address</h3>
              <div class="row">
                <div class="col-50">
                  <label for="fname"><i class="fa fa-user"></i>First Name</label>
                  <input type="text" id="ShippingFname" onkeyup="isEmpty()" name="shippingfirstname" placeholder=""
                  required pattern = "[A-Za-z]+" title="Please enter letters only and no spaces">
                </div>
                <div class="col-50">
                  <label for="lname"><i class="fa fa-user"></i>Last Name</label>
                  <input type="text" id="ShippingLname" onkeyup="isEmpty()" name="shippinglastname" placeholder=""
                  required pattern = "[A-Za-z]+" title="Please enter letters only and no spaces">
                </div>
              </div>
              <label for="email"><i class="fa fa-envelope"></i>Email</label>
              <input type="email" id="ShippingEmail" onkeyup="isEmpty()" name="shippingemail" placeholder="" required>
              <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
              <input type="text" id="ShippingAddress" onkeyup="isEmpty()" name="shippingaddress" placeholder="" required pattern="\S(.*\S)?">
              <label for="city"><i class="fa fa-institution"></i> City</label>
              <input type="text" id="ShippingCity" onkeyup="isEmpty()" name="shippingcity" placeholder="" required pattern = "\S(.*\S)?">

              <div class="row">
                <div class="col-50">
                  <label for="state">State</label>
                  <input type="text" id="ShippingState" name="shippingstate" value="CA" readonly>
                </div>
                <div class="col-50">
                  <label for="zip">Zip</label>
                  <input type="text" id="ShippingZip" onkeyup="isEmpty()" name="shippingzip" placeholder=""
                  required pattern= "[0-9]+" title="Please enter numbers only" minlength="5" maxlength="5">
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
              <input type="text" id="cname" onkeyup="isEmpty()" name="cardname" placeholder="" required>
              <label for="ccnum">Credit card number</label>
              <input type="text" id="ccnum" onkeyup="isEmpty()" name="cardnumber" placeholder=""
              required pattern="[0-9]+" title="Please enter numbers only" minlength="16" maxlength="16">
              <label for="expmonth">Exp Month</label>
              <select name="expmonth" id="expmonth" onkeyup="isEmpty()" placeholder="" title="Please select a month" required>
                <option value=""></option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
              </select><br>
              <div class="row">
                <div class="col-50">
                  <label for="expyear">Exp Year</label>
                  <input type="number" id="expyear" onkeyup="isEmpty()" name="expyear" placeholder=""
                  required pattern="[2][0][2-9][0-9]" title="Please enter a year between 2021 and 2099" minlength="4" maxlength="4" min="2021" max="2099">
                </div>
                <div class="col-50">
                  <label for="cvv">CVV</label>
                  <input type="text" id="cvv" onkeyup="isEmpty()"
                  name="cvv" placeholder="" required pattern="[0-9]+"
                  title="Please enter numbers only" minlength="3" maxlength="3">
                </div>
              </div>
            </div>
          </div>

          <label>
            <div class="form-group">
              <input type="checkbox" id="checkbox" onclick="boxUnchecked()"
              title="Please fill out shipping and payment information first" disabled>
              Billing address same as shipping
            </div>

            <script>
            function isEmpty() {
              if (document.getElementById("ShippingFname").value==="" ||
                  document.getElementById("ShippingLname").value==="" ||
                  document.getElementById("ShippingEmail").value==="" ||
                  document.getElementById("ShippingAddress").value==="" ||
                  document.getElementById("ShippingCity").value==="" ||
                  document.getElementById("ShippingState").value==="" ||
                  document.getElementById("ShippingZip").value==="" ||
                  document.getElementById("cname").value==="" ||
                  document.getElementById("ccnum").value==="" ||
                  document.getElementById("expmonth").value==="" ||
                  document.getElementById("expyear").value==="" ||
                  document.getElementById("cvv").value==="") {
                document.getElementById('checkbox').disabled = true;
              } else {
                document.getElementById('checkbox').disabled = false;
              }
            }
            </script>

            <!-- Shipping container if billing and shipping address are not the same -->
            <label>
              <div id="billing" style="display:block;">
                <div class="form-group">
                        <div class="row">
                        <div class="col-50">
                          <h3>Billing Address</h3>
                          <label for="fname"><i class="fa fa-user"></i>Full Name</label>
                          <input type="text" id="BillingFname" name="billingfullname" placeholder=""
                          required pattern = "\S[A-Za-z](.*\S)?" title="Please enter letters only">
                          <label for="email"><i class="fa fa-envelope"></i>Email</label>
                          <input type="email" id="BillingEmail" name="billingemail" placeholder="" required>
                          <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                          <input type="text" id="BillingAddress" name="billingaddress" placeholder="" required pattern="\S(.*\S)?">
                          <label for="city"><i class="fa fa-institution"></i> City</label>
                          <input type="text" id="BillingCity" name="billingcity" placeholder="" required pattern="\S(.*\S)?">

                          <div class="row">
                            <div class="col-50">
                              <label for="state">State</label>
                              <input type="text" id="BillingState" name="billingstate" value="CA" readonly>
                            </div>
                            <div class="col-50">
                              <label for="zip">Zip</label>
                              <input type="text" id="BillingZip" name="billingzip" placeholder=""
                              required pattern= "[0-9]+" title="Please enter numbers only" minlength="5" maxlength="5">
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

<?php

    // $_SESSION['finalprice'] = $_POST['finalprice'];
    // $_SESSION['taxes'] = $_POST['taxes'];

    //try
    isset($_POST['finalprice'])? $_SESSION['finalprice'] = $_POST['finalprice']: $_SESSION['finalprice'] = 0;
    isset($_POST['taxes'])? $_SESSION['taxes'] = $_POST['taxes']: $_SESSION['taxes'] = 0;

?>

    <!-- Cart -->

    <?php if(isset($_POST['totalprice']) && isset($_POST['taxes']) && isset($_POST['deliveryfee']) && isset($_POST['finalprice'])){?>
            <div class="col-25">
              <div class="container" style="background-color: #f2f2f2; margin-right:25px;">
                <h4><a href='cart.php'>Cart</a> <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b></b></span></h4>
                <p>Subtotal: <span class="price"> <?php echo "$".sprintf("%.2f", $_POST['totalprice']); ?> </span></p>
                <p>Taxes: <span class="price"> <?php echo "$".sprintf("%.2f", $_POST['taxes']); ?></span></p>
                <p>Delivery fee: <span class="price"> <?php echo "$".sprintf("%.2f", $_POST['deliveryfee']); ?></span></p>
                <hr>
                <p>Total <span class="price" style="color:black"><b><?php echo "$".sprintf("%.2f", $_POST['finalprice']); ?></b></span></p>
              </div>

    <?php }
          else{ ?>
              <div class="container" style="background-color: #f2f2f2; margin-right:25px;">
              <h4><a href='cart.php'>Cart</a> <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b></b></span></h4>
              <p>Subtotal: <span class="price"> $0.00 </span></p>
              <p>Taxes: <span class="price">$0.00</span></p>
              <p>Delivery fee: <span class="price"> $0.00</span></p>
              <hr>
              <p>Total <span class="price" style="color:black"><b>$0.00</b></span></p>
            </div>

          <?php } ?>




    </div>
  </div>

<!-- prevents refreshing of page for unwanted post request -->
<!-- <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
        }
</script> -->


  <!-- FOOTER -->
  <?php
      include('phpTemplates/footer.php');
  ?>

  </body>
</html>
<?php
}else{
     header("Location: loginregister.php?error=You need to login before shopping");
     exit();
}
 ?>
