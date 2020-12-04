


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
    document.getElementById('stock').innerHTML = "Product is added to your cart!";
    console.log("add to cartedddd");
}


function addToCartMessage(){
    alert("The product is successfully added to your cart!");

    //further modify to determine out of stock or not
}




//----------------- GOOGLE MAPS LOCATION-------------------//

// Initialize and add the map
function initMap() {
    // The location of goceries
    const goceries = { lat: 37.332510, lng: -121.905130 };
    // The map, centered at goceries
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 13,
      center: goceries,
    });
    // The marker, positioned at goceries
    const marker = new google.maps.Marker({
      position: goceries,
      map: map,
    });
  }


  //------------------prevent refreshing page with post requests--------------------//
  function noRefresh(){
    if ( window.history.replaceState ){
        window.history.replaceState( null, null, window.location.href );
      }
  }



//   <script>
//     if ( window.history.replaceState ) {
//         window.history.replaceState( null, null, window.location.href );
//     }
// </script>