<?php
    include('phpTemplates/mainPageHeader.php');
?>


<?php
    //require functions.php file
    include('functions.php');
      include "db_conn.php";
?>


    <!-- FEATURES CATEGORIES SECTION -->
    <div class = "features">
        <div class="container">
            <h2><b>How are We Different?</b></h2>
            <hr>
            <div class="row">
                <div class="col-3">
                    <i class="fa fa-truck"></i>
                    <p>We deliver your items within 24 hours!</p>
                </div>
                <div class="col-3">
                    <i class="fa fa-archive"></i>
                    <p>Fresh picked from local farms!</p>
                </div>
                <div class="col-3">
                    <i class="fa fa-money" ></i>
                    <p>10% of our earnings are donated to local charity!</p>
                </div>
            </div>

            <div class="row">
                <div class="col-3">
                    <p>We offer free shipping for orders that weigh less than 20lbs!</p>
                </div>
                <div class="col-3">
                    <p>We have most of the grocery items you need!</p>
                </div>
                <div class="col-3">
                    <p>Empowering small local business!</p>
                </div>
            </div>

        </div>


    </div>

    <!-- CATEGORIES SECTION -->
    <div class="categories">

        <div class="small-container">
            <h2> <b>Product Categories </b></h2>
            <hr>
            <div class = "row">
                <div class="col-4">
                    <!-- Fruits -->
                    <a href= "category-Fruits.php"><img src="images/fruit-banana.jpg"></a>
                    <br>
                    <h3> Fruits</h3>
                </div>

                <div class="col-4">
                    <!-- Beverages -->
                   <a href = "category-beverages.php"><img src = "images/beverage-applejuice.jpg"></a>
                    <h3>Beverages</h3>
                </div>

                <div class="col-4">
                    <!-- Vegetables -->
                    <a href = "category-vegetables.php"><img src = "images/vegetable-cabbage.jpg"></a>
                    <h3>Vegetables</h3>
                </div>

                <div class="col-4">
                    <!-- Dairy and Eggs -->
                    <a href = "category-dairy & eggs.php"><img src="images/dairy-eggland.jpg"></a>
                    <h3>Dairy & Eggs</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- TEAM MEMBERS -->
    <div class="team-members">
        <!-- add a carousel possibly -->
        <h2><b>Team Members</b></h2>
        <hr>

        <div class="row">
        <!-- CAROUSEL -->
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Carousel indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <!-- Wrapper for carousel items -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="img-fluid" src="images/doggo.jpg" alt="First Slide">
                        <div class="carousel-caption">
                            <h3>Li Jie</h3>
                          </div>
                    </div>
                    <div class="carousel-item">
                        <img  src="images/doggo.jpg" alt="Second Slide">
                        <div class="carousel-caption">
                            <h3>Clarence</h3>
                          </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/doggo.jpg" alt="Third Slide">
                        <div class="carousel-caption">
                            <h3>Tam</h3>
                          </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/doggo.jpg" alt="Third Slide">
                        <div class="carousel-caption">
                            <h3>Shunyi</h3>
                          </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/doggo.jpg" alt="Third Slide">
                        <div class="carousel-caption">
                            <h3>Michelle</h3>
                          </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/doggo.jpg" alt="Third Slide">
                        <div class="carousel-caption">
                            <h3>Vu</h3>
                          </div>
                    </div>
                    <div class="carousel-item">
                        <img src="images/doggo.jpg" alt="Third Slide">
                        <div class="carousel-caption">
                            <h3>Stan</h3>
                          </div>
                    </div>
                </div>
                <!-- Carousel controls -->
                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>

    </div>

    <?php
        include("phpTemplates/footer.php");
    ?>
