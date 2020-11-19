


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


