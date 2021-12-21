<?php
  include 'connection.php';
  // include 'auth.php';
  $conn = OpenCon();
  session_start();
  
  $sql = "SELECT * FROM users";
  $student = $conn->query($sql);

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
        <a href="index.php" class="list">Banner</a>
        <a href="slider.php" class="">Slider</a>
        <a href="registration.php" class="list active">Registration</a>
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
         <a href="index.php" class="list">Banner</a>
         <a href="slider.php" class="active">Slider</a>
         <a href="registration.php" class="list active">Registration</a>
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
            <a class="h4 text-dark font-weight-bold pt-2">Student Registration Table</a>
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
                    <th scope="col" class="border-right text-center">Sr.</th>
                    <th scope="col" class="border-right text-center">Date</th>
                    <th scope="col" class="border-right text-center">Class</th>
                    <th scope="col" class="border-right text-center">Name</th>  
                    <th scope="col" class="border-right text-center">Father</th>  
                    <th scope="col" class="border-right text-center">Mother</th>  
                    <th scope="col" class="border-right text-center">Address</th>  
                    <th scope="col" class="border-right text-center">Mobile Number</th>
                    <th scope="col" class="border-right text-center">Alternate Number</th>
                    <th scope="col" class="border-right text-center">Photo</th> 
                    <th scope="col" class="border-right text-center">Signature</th>    
                    <th scope="col" class="border-right text-center">Suggestion</th>    
                  </tr>
                </thead>
                <tbody> 
                <?php $count = 0;
                  while($data = mysqli_fetch_assoc($student)){ 
                    $count = $count + 1; ?>
                    <tr class="border-bottom">
                      <td class="border-right border-left text-center"><?php echo $count; ?></td>
                      <td class="border-right border-left text-center"><?php echo $data['date']; ?></td>
                      <td class="border-right border-left text-center"><?php echo $data['class']; ?></td>
                      <td class="border-right border-left text-center"><?php echo $data['student_name']; ?></td>
                      <td class="border-right border-left text-center"><?php echo $data['father_name']; ?></td>
                      <td class="border-right border-left text-center"><?php echo $data['mother_name']; ?></td>
                      <td class="border-right border-left text-center"><?php echo $data['address']; ?></td>
                      <td class="border-right border-left text-center"><?php echo $data['mobile1']; ?></td>
                      <td class="border-right border-left text-center"><?php echo $data['mobile2']; ?></td>
                      <td class="border-right border-left text-center"><a href="upload/admission/<?php echo $data['photo']; ?>"><?php echo $data['photo']; ?></a></td>
                      <td class="border-right border-left text-center"><a href="upload/admission/<?php echo $data['signature']; ?>"><?php echo $data['signature']; ?></a></td>
                      <td class="border-right border-left text-center"><?php echo $data['suggestion']; ?></td>
                    </tr> 
                  <?php } ?>
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