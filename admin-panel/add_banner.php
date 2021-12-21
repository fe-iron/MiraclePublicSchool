<?php
  include 'connection.php';
  // include 'auth.php';
  $conn = OpenCon();
  session_start();

  if (isset($_POST['submit'])){
      $target_dir = "upload/banner/"; 
  
      $photo = $_FILES['banner']['name'];
      $target_file1 = $target_dir . basename($_FILES["banner"]["name"]);
          // Select file type
      $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
          // Valid file extensions
      $extensions_arr = array("jpg","jpeg","png");
        
          if( in_array($imageFileType1,$extensions_arr) ){
              // Upload file
              if(move_uploaded_file($_FILES['banner']['tmp_name'],$target_dir.$photo)){
                 // Insert record
                 $query = "INSERT INTO banners (banner) values('$photo')";
                  // echo $query;
                  $result = mysqli_query($conn,$query);
                  if($result){
                      $_SESSION['msg'] = "Upload Successfully!";
                      // echo $msg;
                  }else{
                      echo mysqli_error($conn);
                      $_SESSION['error'] = "Upload Failed!";
                  }
              }
          }else{
              //  echo "error saving file";
              $_SESSION['error'] = "Something went wrong! at ".$photo;
          }    
  }
?>
<?php include_once'inc/head.php'; ?>
<link rel="stylesheet" type="text/css" href="inc/css/style.css">

<body>
  <section>
    <!-- large-screen-sidebarstarts -->
    <div class="sidebar">
      <div class="logo">
        <h3 class="">
        <img src="images/logo.jpg">
        </h3>
      </div>
      <div class="" id="sidebar-here">
        <a href="banner.php" class="list active">Banner</a>
        <a href="slider.php" class="">Slider</a>
        <a href="registration.php" class="list ">Registration</a>
        <a href="gallery.php" class="list ">Gallery</a>
        <a href="contact_list.php" class="list ">Contact</a>
        <a href="result_upload.php" class="list ">Result Upload</a>
        <a href="news_table_list.php" class="">News & Updates</a>
        <a href="donation_list.php" class="">Events</a>
      </div>
    </div>

    <!-- large-screen-sidebar-ends -->
    <!-- small-screen-sidebar starts -->
    <div class="small-screen-sidebar">
      <div id="mySidenav" class="sidenav">
       <div class="logo bg-color-sidenav">
         <div class="d-flex bd-highlight">
          <div class=" bd-highlight">
            <h3 class="">
              <img src="images/logo.png">
            </h3>
          </div>
          <div class="p-2 bd-highlight">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          </div>
        </div>
      </div>
      <div class="pt-0" id="sidebar-here">
        <div class="" id="sidebar-here">
        <a href="banner.php" class="list active">Banner</a>
        <a href="slider.php" class="">Slider</a>
        <a href="registration.php" class="list ">Registration</a>
        <a href="gallery.php" class="list ">Gallery</a>
        <a href="contact_list.php" class="list ">Contact</a>
        <a href="result_upload.php" class="list ">Result Upload</a>
        <a href="news_table_list.php" class="">News & Updates</a>
        <a href="donation_list.php" class="">Events</a>
      </div>
     </div>
   </div>
 </div>
 <!-- large-screen-sidebar-starts -->

 <div class="content">

  <?php include_once'inc/header.php'; ?>
  <div class="container">

    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card my-5 shadow">
          <nav class="navbar navbar-light  venue-registration border-bottom">
            <a class="h4 text-dark font-weight-bold pt-2">Banner</a>
            <form class="form-inline">
              <a href="index.php" class="btn btn-primary">View Banner</a>
            </form>
          </nav>

          <div class="card-body ">
            <div class="col-md-12">
            <h4 class="mb-4 text-success text-center"><?php 
                        if(isset($_SESSION['msg'])){
                            echo $_SESSION['msg'];
                            unset($_SESSION['msg']);
                        }
                        ?>
                </h4>
                <h4 class="mb-4 text-danger text-center"><?php
                            if(isset($_SESSION['error'])){
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                ?>
            </h4>
            </div>
            <form action=" " method="post" enctype="multipart/form-data">
              <div class="form-row pt-3">
                <div class="col-md mb-3">
                </h4> <br>
                  <label for="Venue" class="font-weight-bold">Add Banner Photo*</label>
                  <input type="file" name="banner" class="form-control" placeho0lder="Upload Photo" id="venue-name" required>
                </div>
              </div>

              <input class="btn btn-success mt-3" type="submit" value="Submit" name="submit">
              
              <!-- <a href="" class="btn btn-primary my-3">Submit</a> -->
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>
</section>

<script type="text/javascript">
  function openNav() {
    document.getElementById("mySidenav").style.width = "200px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
</script>

</body>

</html>