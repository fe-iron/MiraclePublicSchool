<?php
  include 'connection.php';
  // include 'auth.php';
  $conn = OpenCon();
  session_start();
  
  $sql = "SELECT * FROM banners";
  $banners = $conn->query($sql);

  if (isset($_GET['id'])){
    $this_id = $_GET['id'];
     
    $query = "DELETE FROM banners WHERE id='$this_id'";
        $result = mysqli_query($conn,$query);
        if($result){
            $_SESSION['msg'] = "Deleted Successfully!";
            header("Location: index.php");
        }else{
            echo mysqli_error($conn);
            $_SESSION['error'] = "Delete Failed!";
            header("Location: index.php");
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
        <a href="index.php" class="list active">Banner</a>
        <a href="slider.php" class="">Slider</a>
        <a href="registration.php" class="list ">Registration</a>
        <a href="gallery.php" class="list ">Gallery</a>
        <a href="contact_list.php" class="list ">Contact</a>
        <a href="result_upload.php" class="list ">Result Upload</a>
        <a href="news_table_list.php" class="">News & Updates</a>
        <a href="event.php" class="">Events</a>
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
         <a href="index.php" class="list active">Banner</a>
        <a href="slider.php" class="">Slider</a>
        <a href="registration.php" class="list ">Faculty</a>
        <a href="gallery.php" class="list ">Gallery</a>
        <a href="contact_list.php" class="list ">Contact</a>
        <a href="result_upload.php" class="list ">Result Upload</a>
        <a href="news_table_list.php" class="">News & Updates</a>
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
      <div class="col-md-11">
        <div class="card my-5 shadow">
          <nav class="navbar navbar-light  venue-registration border-bottom">
            <a class="h4 text-dark font-weight-bold pt-2">Banner List</a>
            <form class="form-inline">
              <a href="add_banner.php" class="btn-primary btn">Add New Banner</a>
            </form>
          </nav>
          
          <div class="card-body ">
          <h4 class="text-danger text-center">
            <?php 
                              if(isset($_SESSION['msg'])){
                                  echo $_SESSION['msg'];
                                  unset($_SESSION['msg']);
                              }
            ?>
            <h4 class="text-danger text-center"><?php
                                  if(isset($_SESSION['error'])){
                                      echo $_SESSION['error'];
                                      unset($_SESSION['error']);
                                  }
                      ?>
            </h4>
            <br/>
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead class="border">
                  <tr>
                    <th scope="col" class="border-right text-center">Gallery Images</th>  
                  </tr>
                </thead>
                <tbody> 
                  <?php
                  while($data = mysqli_fetch_assoc($banners))
                  {
                    ?> <tr class="border-bottom">
                      <td class="border-right border-left text-center"> <img src="upload/banner/<?php echo $data['banner']; ?>" style="width: 220px; height: auto;"> </td>

                      <td class="border-right text-center">
                        <div class="btn-group" role="group" aria-label="Basic example">

                          <a href="index.php?id=<?php echo $data['id'];?>" class="btn btn-danger">
                            Delete
                          </a>
                        </div>
                      </td>
                      </tr> <?php } ?>
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