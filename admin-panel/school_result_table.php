<?php
  include 'connection.php';
  // include 'auth.php';
  $conn = OpenCon();
  session_start();
  
  $sql = "SELECT * FROM results";
  $results = $conn->query($sql);

  if (isset($_GET['id'])){
    $this_id = $_GET['id'];
     
    $query = "DELETE FROM results WHERE id='$this_id'";
        $result = mysqli_query($conn,$query);
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
       <a href="index.php" class="list">Banner</a>
        <a href="slider.php" class="">Slider</a>
        <a href="registration.php" class="list ">Registration</a>
        <a href="gallery.php" class="list ">Gallery</a>
        <a href="contact_list.php" class="list ">Contact</a>
        <a href="result_school.php" class="list active">Result Upload</a>
        <a href="news_table_list.php" class="">News & Updates</a>
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
       <a href="index.php" class="list">Banner</a>
        <a href="slider.php" class="">Slider</a>
        <a href="registration.php" class="list ">Faculty</a>
        <a href="gallery.php" class="list ">Gallery</a>
        <a href="contact_list.php" class="list ">Contact</a>
        <a href="result_school.php" class="list active">Result Upload</a>
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
            <a class="h4 text-dark font-weight-bold pt-2">Uploaded Results</a>
            <form class="form-inline">
              <a href="result_school.php" class="btn btn-primary">Upload Result</a>
            </form>
          </nav>

          <div class="card-body ">
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead class="border">
                  <tr>
                    <th scope="col" class="border-right text-center">Sr. No.</th>
                    <th scope="col" class="border-right text-center">Date</th>
                    <th scope="col" class="border-right text-center">Result</th>
                    <th scope="col" class="border-right text-center">Year</th>
                    <th scope="col" class="border-right text-center">Class</th>
                    <th scope="col" class="border-right text-center">Operation</th>
                  </tr>
                </thead>
                <tbody> 
                <?php $count = 0;
                  while($data = mysqli_fetch_assoc($results)){ 
                    $count = $count + 1; ?>
                      <tr class="border-bottom">
                        <td class="border-right border-left"> <?php echo $count; ?> </td>
                        <?php $date = $data['created_on']; 
                              $date = substr($date, 0, 10); ?>
                        <td class="border-right border-left"> <?php echo $date; ?> </td>
                        <td class="border-right"> 
                          <a href="../result_file/<?php echo $data['result']; ?>" download style="text-decoration: none; font-size: 15px; color: black">
                            <?php echo $data['result']; ?>  
                            <span class="text-primary">(Click To Download)</span>
                          </a>
                        </td>
                        <td class="border-right"> <?php echo $data['year']; ?> </td>
                        <td class="border-right"> <?php echo $data['class']; ?> </td>
                        <td class="border-right text-center">
                          <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="school_result_table.php?id=<?php echo $data['id'];?>" type="submit" class="btn btn-danger">
                              Delete
                            </a>
                          </div>
                        </td>
          </tr> 
  _table                  <?php
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