


function goToNewPage(){
    var url = document.getElementById('list').value;
    if(url != 'none') {
        window.location = url;
    }
}

function getProductName(){
  //gets the class or productName? decide
     var fruit = document.getElementById('');

}

$(document).ready(function(){

    // product qty section
    let $qty_up = $(".qty .qty-up");
    let $qty_down = $(".qty .qty-down");
    let $deal_price = $("#deal-price");

    // click on qty up button
    $qty_up.click(function(e){

        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

        // change product price using ajax call
        $.ajax({url: "ajax/ajax.php", type : 'post', data : { itemid : $(this).data("id")}, success: function(result){
                let obj = JSON.parse(result);
                let product_price = obj[0]['product_price'];

                if($input.val() >= 1 && $input.val() <= 9){
                    $input.val(function(i, oldval){
                        return ++oldval;
                    });

                    // increase price of the product
                    $price.text(parseInt(product_price * $input.val()).toFixed(2));

                    // set subtotal price
                    let subtotal = parseInt($deal_price.text()) + parseInt(product_price);
                    $deal_price.text(subtotal.toFixed(2));
                }

            }}); // closing ajax request
    }); // closing qty up button

    // click on qty down button
    $qty_down.click(function(e){

        let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
        let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

        // change product price using ajax call
        $.ajax({url: "ajax/ajax.php", type : 'post', data : { itemid : $(this).data("id")}, success: function(result){
                let obj = JSON.parse(result);
                let product_price = obj[0]['product_price'];

                if($input.val() > 1 && $input.val() <= 10){
                    $input.val(function(i, oldval){
                        return --oldval;
                    });


                    // increase price of the product
                    $price.text(parseInt(product_price * $input.val()).toFixed(2));

                    // set subtotal price
                    let subtotal = parseInt($deal_price.text()) - parseInt(product_price);
                    $deal_price.text(subtotal.toFixed(2));
                }

            }}); // closing ajax request
    }); // closing qty down button


});

function addToCart(){
     var addToCartButton = document.getElementById('btn');
     addToCartButton.addEventListener('click',function(event){
         console.log('clicked');
         var buttonClicked = event.target
         buttonClicked.parentElement.parentElement.remove();
         updateCartTotal();
     })
}

function updateCartTotal(){
    
}
//----------------product details page---------------------//
function decreaseStock(){
    var value = parseInt(document.getElementById('stock').innerHTML, 10);
    value--;
    document.getElementById('stock').innerHTML = "FUCK UOU";
    console.log("add to cartedddd");
}


function addToCartMessage(){
    \alert("The product is successfully added to your cart!");

    //further modify to determine out of stock or not
}




//----------------- GOOGLE MAPS LOCATION-------------------//

// Initialize and add the map
function initMap() {
    // The location of Uluru
    const uluru = { lat: 27.205, lng: 77.497 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 4,
      center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
      position: uluru,
      map: map,
    });
  }
  

