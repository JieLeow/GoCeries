<!DOCTYPE html>
<html>
  <head>
    <title>Add Map</title>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKblPBimQUF-jQTgFwwuYXKYTcoG3hbE0&callback=initMap&libraries=&v=weekly"
      defer
    ></script>


    <!-- OWN CSS -->
    <link rel="stylesheet" href="css/style.css">

    <style type="text/css">
      /* Set the size of the div element that contains the map */
      #map {
        height: 300px;
        /* The height is 400 pixels */
        width: 300px;
        /* The width is the width of the web page */
      }
    </style>
    <script>
      // Initialize and add the map
      function initMap() {
        // The location of Uluru
        const uluru = { lat: 37.338207, lng: -121.886330 };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 12,
          center: uluru,
        });
        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
          position: uluru,
          map: map,
        });
      }
    </script>
  </head>
  
  <body>
    <?php include('phpTemplates/header.php') ?>

    <div class="container">
        <div class="row">
            <div class="col-2">
                <p>We are a small startup focusing on delivering groceries to your doorstep while maintaining the highest quality and freshness of our products</p>
                <p>Suspendisse ac auctor dui, eget lobortis urna. Curabitur at dictum ex. Praesent tincidunt metus tellus, vitae rhoncus ex sodales sed. 
                    Curabitur bibendum sit amet eros in varius. Duis imperdiet sollicitudin erat sed cursus. Vivamus nec felis nisi. Quisque dignissim libero a quam gravida egestas. 
                    Cras cursus nulla sit amet velit hendrerit, vitae sollicitudin diam placerat. Praesent semper tellus nec arcu ultrices ultrices. 
                    Ut ultricies dolor in sapien tincidunt interdum a ac nibh. Etiam ullamcorper rhoncus velit eu fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; 
                    Maecenas justo sem, pellentesque id vulputate et, consectetur ut lacus. Nullam nisl ligula, vehicula eu magna ac, rhoncus rhoncus lacus.</p>
            </div>

            <div class ="col-2">
                <p>Our location:</p>
                <div id="map"></div>
            </div>

            
        </div>
    </div>

    <?php include('phpTemplates/footer.php')?>
  </body>
</html>
