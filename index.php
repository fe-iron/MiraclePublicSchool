<?php
  include 'admin-panel/connection.php';
  $conn = OpenCon();

  
  $sql = "SELECT * FROM banners ORDER BY id DESC LIMIT 1";
  $banners = $conn->query($sql);

  $sql = "SELECT * FROM sliders ORDER BY id DESC LIMIT 5";
  $sliders = $conn->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Miracle Public School</title>
    <meta charset="utf-8">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway|Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="inc/css/style.css">
</head>

<body>

    <?php include_once 'inc/header.php'; ?>
        <?php include_once 'inc/navbar.php'; ?>

            <section class="image-background">
                <?php
                    while($data = mysqli_fetch_assoc($banners))
                {?>
                <!-- <img src="images/miracle/front-image.jpg" class="img-fluid"> -->
                <img src="admin-panel/upload/banner/<?php echo $data['banner']; ?>" class="img-fluid">
                <?php }?>
            </section>


            <section class="py-5">
                <div class="container-fluid educational">
                    <div class="row px-xl-5">
                        <div class="col-md-3 mb-3">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    <h5 class="text-center text-white">News and Updates</h5>
                                    <h6 class="text-center text-white">Date:10/10/10</h6>
                                </div>
                                <div class="card-body  scroll">
                                    <ol class="pl-3">
                                        <li class="border-bottom pl-xl-2 py-xl-2"><a href="" class="text-decoration-none text-dark">Notification: Examination form for MBBS-I Prof./ MD/ MS/ Diploma</a></li>
                                        <li class="border-bottom pl-xl-2 py-xl-2"><a href="" class="text-decoration-none text-dark">Revised: R.D.C. Mathematics to be held on date 13-10-2019</a></li>
                                        <li class="border-bottom pl-xl-2 py-xl-2"><a href="" class="text-decoration-none text-dark">Press release: Examination form for B.D.S.-I,II,III & IV Professional (Main & Supply) Course</a></li>
                                        <li class="border-bottom pl-xl-2 py-xl-2"><a href="" class="text-decoration-none text-dark">Revised: R.D.C. Mathematics to be held on date 13-10-2019</a></li>
                                        <li class="border-bottom pl-xl-2 py-xl-2"><a href="" class="text-decoration-none text-dark">Revised: R.D.C. Mathematics to be held on date 13-10-2019</a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">

                        <section class="slider" data-interval="1000">
                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="1800">
                                    <div class="carousel-inner carousel-fade">
                                        <?php $count = 0;
                                            while($data = mysqli_fetch_assoc($sliders))
                                            {
                                                if($count == 0){?>
                                                    <div class="carousel-item active">
                                                        <img src="admin-panel/upload/slider/<?php echo $data['slider']; ?>" class="d-block w-100" alt="slider image" class="img-fluid">
                                                    </div>
                                                <?php } $count = $count + 1;
                                        ?>
                                            <div class="carousel-item">
                                                <img src="admin-panel/upload/slider/<?php echo $data['slider']; ?>" class="d-block w-100" alt="slider image" class="img-fluid">
                                            </div>
                                        <?php } ?>
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

                        <div class="col-md-3 mb-3">
                            <div class="card  ">
                                <div class="card-header bg-primary">
                                    <h5 class="text-center text-white">Events</h5></div>
                                <div class="card-body">
                                    <ol class="pl-3">
                                        <li class="border-bottom pl-xl-2 py-xl-2"><a href="" class="text-decoration-none text-dark">Notification: Examination form for MBBS-I Prof./ MD/ MS/ Diploma</a></li>
                                        <li class="border-bottom pl-xl-2 py-xl-2"><a href="" class="text-decoration-none text-dark">Revised: R.D.C. Mathematics to be held on date 13-10-2019</a></li>
                                        <li class="border-bottom pl-xl-2 py-xl-2"><a href="" class="text-decoration-none text-dark">Press release: Examination form for B.D.S.-I,II,III & IV Professional (Main & Supply) Course</a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <section>
                <div class="container">
                	<h2 class="text-center">School Administrative</h2>
                    <div class="row">
                        <div class="col-md">
                            <div class="card">
							  <img src="images/miracle/picture1.jpg" class="card-img-top" alt="...">
							  <div class="card-body text-center">
							    <h5 class="card-title">Founder</h5>
							    <p class="card-text text-justify">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							  </div>
							</div>
							

                        </div>

                        <div class="col-md">
                             <div class="card">
							  <img src="images/miracle/picture1.jpg" class="card-img-top" alt="...">
							  <div class="card-body text-center">
							    <h5 class="card-title">Chairman</h5>
							    <p class="card-text text-justify">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							  </div>
							</div>
                        </div>
                        
                        <div class="col-md">
                            <div class="card">
							  <img src="images/miracle/picture1.jpg" class="card-img-top" alt="...">
							  <div class="card-body text-center">
							    <h5 class="card-title">Director</h5>
							    <p class="card-text text-justify">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							  </div>
							</div>
                        </div>

                        <div class="col-md">
                            <div class="card">
							  <img src="images/miracle/picture1.jpg" class="card-img-top" alt="...">
							  <div class="card-body text-center">
							    <h5 class="card-title">Principal</h5>
							    <p class="card-text text-justify">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							  </div>
							</div>
                        </div>

                    </div>
                </div>
            </section>


            <section>
                <div class="container educational">
                    <div class="row py-5">
                        <div class="col-md mx-xl-4 mb-3">
                            <a href="gallery.php" class="text-decoration-none text-dark">
                                <div class="card">
                                    <i class="fas fa-image fa-3x mt-5"></i>
                                    <div class="card-body text-center">
                                        <h5 class="card-title font-weight-bold">PHOTO GALLERY</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md mx-xl-4 mb-3">
                            <a href="gallery.php" class="text-decoration-none text-dark">
                                <div class="card">
                                    <i class="fas fa-video fa-3x mt-5"></i>
                                    <div class="card-body text-center">
                                        <h5 class="card-title font-weight-bold">VIDEO</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md mx-xl-4 mb-3">
                            <a href="tel:+919540126057" title="To call" class="text-decoration-none text-dark">
                                <div class="card">
                                    <i class="fas fa-phone fa-3x mt-5"></i>
                                    <div class="card-body text-center">
                                        <h5 class="card-title font-weight-bold">PHONE</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <?php include_once 'inc/footer.php'; ?>

</body>

</html>