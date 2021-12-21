<?php
  include 'connection.php';
  // include 'auth.php';
  $conn = OpenCon();
  session_start();

  if (isset($_POST['submit'])){
      $date = $_POST['event_date'];    
      $news = $_POST['news'];    
      // Insert record
      $query = "INSERT INTO news_and_update (event_date, news) values('$date', '$news')";
      // echo $query;
      $result = mysqli_query($conn,$query);
      if($result){
          $_SESSION['msg'] = "Uploaded Successfully!";
          // echo $msg;
      }else{
          echo mysqli_error($conn);
          $_SESSION['error'] = "Upload Failed!";
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
        <a href="index.php" class="list ">Banner</a>
        <a href="slider.php" class="">Slider</a>
        <a href="registration.php" class="list ">Faculty</a>
        <a href="gallery.php" class="list ">Gallery</a>
        <a href="contact.php" class="list ">Contact</a>
        <a href="result_upload.php" class="list ">Result Upload</a>
        <a href="news_table_list.php" class="active">News & Updates</a>
        <a href="event.php" class="">Events</a>
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
                <img src="images/logo.jpg">
              </h3>
            </div>
            <div class="p-2 bd-highlight">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            </div>
          </div>
  </div>
  <div class="pt-0" id="sidebar-here">
    <div class="pt-3" id="sidebar-here">
     <a href="index.php" class="list ">Banner</a>
        <a href="slider.php" class="">Slider</a>
        <a href="registration.php" class="list ">Faculty</a>
        <a href="gallery.php" class="list ">Gallery</a>
        <a href="contact.php" class="list ">Contact</a>
        <a href="result_upload.php" class="list ">Result Upload</a>
        <a href="news_table_list.php" class="active">News & Updates</a>
        <a href="event.php" class="">Events</a>
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
        <div class="card my-5 shadow">
          <nav class="navbar navbar-light  venue-registration border-bottom">
            <a class="h4 text-dark font-weight-bold pt-2">News And Updates </a>
            <form class="form-inline">
              <a href="news_table_list.php" class="btn btn-primary">View news List</a>
            </form>
          </nav>
          <div class="card-body ">
            

            <form action=" " method="post">
              <div class="form-row pt-3">
                <div class="col-md mb-3">
                  <label for="Venue" class="font-weight-bold">Enter News and Updates*</label>
                  <input type="text" name="news" class="form-control" placeholder="Enter News" id="venue-name" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md">
                  <label for="Venue" class="font-weight-bold">Enter News Date*</label>
                  <input type="date" name="event_date" class="form-control" placeholder="Enter News Date" id="venue-name">
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