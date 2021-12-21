<?php
  include 'connection.php';
  // include 'auth.php';
  $conn = OpenCon();
  session_start();
  
  $sql = "SELECT * FROM news_and_update WHERE is_event=1";
  $news = $conn->query($sql);

  if (isset($_GET['id'])){
    $this_id = $_GET['id'];
     
    $query = "DELETE FROM news_and_update WHERE id='$this_id'";
    $result = mysqli_query($conn, $query);
    if($result){
      $_SESSION['msg'] = "Deleted Successfully!";
    }else{
        echo mysqli_error($conn);
        $_SESSION['error'] = "Delete Failed!";
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
        <a href="registration.php" class="list ">Registration</a>
        <a href="gallery.php" class="list ">Gallery</a>
        <a href="contact_list.php" class="list ">Contact</a>
        <a href="result_upload.php" class="list ">Result Upload</a>
        <a href="news_table_list.php" class="">News & Updates</a>
        <a href="event.php" class=" active">Events</a>
      </div>
   </div>

   <!-- large-screen-sidebar-ends -->





   <!-- small-screen-sidebar starts -->
   <div class="small-screen-sidebar">
    <div id="mySidenav" class="sidenav">
     <div class="logo bg-color-sidenav">

       <!--  <a href="index.php"><img src="images/wmk-final.png" height="60" width="100"> <span class="float-right"> <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a></span></a> -->

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
        <a href="contact_list.php" class="list ">Contact</a>
        <a href="result_upload.php" class="list ">Result Upload</a>
        <a href="news_table_list.php" class="">News & Updates</a>
        <a href="event.php" class=" active">Events</a>
     </div>
   </div>
 </div>
</div>
<!-- large-screen-sidebar-starts -->

<div class="content">

  <?php include_once'inc/header.php'; ?>
  <div class="container">

    <div class="row justify-content-center">
      <div class="col-md-11">
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
            <a class="h4 text-dark font-weight-bold pt-2">Event List</a>
            <form class="form-inline">
              <a href="add_event.php" class="btn-primary btn">Add New Event</a>
            </form>
          </nav>

          <div class="card-body ">

            <div class="table-responsive">
              <table class="table table-bordered">
                <thead class="border">
                  <tr>
                    <th scope="col" class="border-right">Sr. No.</th>
                    <th scope="col" class="border-right">News and Update</th>
                    <th scope="col" class="border-right">Event Date</th>
                    <th scope="col" class="border-right text-center">Opreation</th>
                  </tr>
                </thead>
                <tbody> 
                <?php $count = 0;
                  while($data = mysqli_fetch_assoc($news)){ 
                    $count = $count + 1; ?>
                      <tr class="border-bottom">
                        <td class="border-right border-left"> <?php echo $count; ?> </td>
                        <td class="border-right"><strong> <?php echo $data['news']; ?></strong></td>
                        <td class="border-right"> <?php echo $data['event_date']; ?> </td>
                        <td class="border-right text-center">
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="news_table_list.php?id=<?php echo $data['id'];?>" type="submit" class="btn btn-danger">
                              Delete
                            </a>
                          </div>
                        </td>
                        </tr> 
                <?php
                    }
                ?>
                </tbody>
                </table>
              </div>
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