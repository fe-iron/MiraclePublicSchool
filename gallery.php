<?php
  include 'admin-panel/connection.php';
  $conn = OpenCon();
  session_start();
  
  $sql = "SELECT * FROM gallery";
  $gallery = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
	<title>gallery</title>
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
    <link rel="stylesheet" type="text/css" href="inc/css/gallery.css">

</head>
<body>

 <?php include_once 'inc/header.php'; ?>
 <?php include_once 'inc/navbar.php'; ?>

  <section class="paddding-gallery">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="py-2 text-white font-weight-bold text-center">Photo Gallery</h3>
                    <p class="text-white text-center">A Camera that puts a world of possiblities at your fingertips.</p>
                  
                   
                </div>
            </div>
        </div>
    </section>
    <!-- end of upper  section -->

   <section class="">
       <div class="container">
                <h2 class="text-center pt-5">Reflects Our History</h2>
                <?php 
                  $text = "";
                  $count = 1;
                  while($data = mysqli_fetch_assoc($gallery))
                  {
                    if($count == 1){
                        $text = $text . '<div class="row">
                            <div class="col-md-3 mb-3">
                                <div class="card" data-aos="flip-left"  data-aos-duration="3000">
                                    <img src="admin-panel/upload/gallery/'.$data['image'].'" class="card-img-top" alt="...">
                                </div>
                            </div>';
                        $count = $count + 1;
                    }
                    else if($count < 4 && $count > 1){
                        $text = $text . '
                            <div class="col-md-3 mb-3">
                                <div class="card" data-aos="flip-left"  data-aos-duration="3000">
                                    <img src="admin-panel/upload/gallery/'.$data['image'].'" class="card-img-top" alt="...">
                                </div>
                            </div>';   
                        $count = $count + 1;
                    }else if($count == 4){
                        $text = $text . '
                            <div class="col-md-3 mb-3">
                                <div class="card" data-aos="flip-left"  data-aos-duration="3000">
                                    <img src="admin-panel/upload/gallery/'.$data['image'].'" class="card-img-top" alt="...">
                                </div>
                            </div>
                        </div>';
                        $count = 1;
                    }
                  }
                  echo $text;
                ?>
       </div>
   </section>


   

<?php include_once 'inc/footer.php'; ?>
</body>
</html>