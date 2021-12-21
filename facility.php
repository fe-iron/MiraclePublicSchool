<!DOCTYPE html>
<html>

<head>
    <title>Library</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="inc/css/facility.css">

</head>

<body>

    <?php include_once 'inc/header.php'; ?>
        <?php include_once 'inc/navbar.php'; ?>

        <section class="paddding-facility">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="py-2 text-white font-weight-bold text-center">Facility</h3>
                    <p class="text-white text-center">lots of facility available here</p> 
                </div>
            </div>
        </div>
    </section>
    <!-- end of upper  section -->

        <section class="py-5">
            <div class="container">
                <h2>Central Library</h2>
                <div class="row">
                    <div class="col-md">
                        <h5 class="font-weight-bold">About Central Library</h5>
                        <p> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                    <div class="col-md">
                        <section class="slider" data-interval="1000">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="1800">
                                    <div class="carousel-inner carousel-fade">
                                        <div class="carousel-item active">
                                            <img src="images/carousel/slider1.jpg" class="d-block w-100" alt="..." class="img-fluid">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="images/carousel/slider2.jpg" class="d-block w-100" alt="..." class="img-fluid">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="images/carousel/slider3.jpg" class="d-block w-100" alt="..." class="img-fluid">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </section>
                            <!-- End of Slider -->
                    </div>
                </div>
            </div>
        </section>

        <hr>


        <section class="pb-5">
            <div class="container">
                <h2>Medical </h2>
                <div class="row">

                	<div class="col-md pb-3">
                    	 <section class="slider" data-interval="1000">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="1800">
                                    <div class="carousel-inner carousel-fade">
                                        <div class="carousel-item active">
                                            <img src="images/carousel/slider1.jpg" class="d-block w-100" alt="..." class="img-fluid">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="images/carousel/slider2.jpg" class="d-block w-100" alt="..." class="img-fluid">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="images/carousel/slider3.jpg" class="d-block w-100" alt="..." class="img-fluid">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </section>
                            <!-- End of Slider -->
                    </div>
                    <div class="col-md">
                    	<h5 class="font-weight-bold pl-xl-3">Medical Facilities</h5>
                    	 <p class="mx-xl-3"> ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>

                    
                </div>
            </div>
        </section>
            

            <?php include_once 'inc/footer.php'; ?>
</body>

</html>