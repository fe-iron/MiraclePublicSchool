<style type="text/css">

  .navbar {
    -webkit-box-shadow: 0px 5px 7px 1px rgb(0 0 0 / 75%);
    -moz-box-shadow: 0px 5px 7px 1px rgba(0,0,0,0.75);
    box-shadow: 0px 5px 7px 1px rgb(0 0 0 / 21%);
    z-index: 99;
    padding: 5px 10px;
}

  .btn-dark ,.btn-success
  {
    font-family: 'Raleway', sans-serif;
  }


  .navbar .navbar-nav .nav-link{
    font-family: 'Raleway', sans-serif;


  }




 /* @media (max-width: 768px) { 

  
      }
*/
      @media (min-width: 1015px) and (max-width: 1199.98px) { 
       .navbar .navbar-nav .nav-link{
        font-size: 18px;
      }

    }

    @media (min-width: 768px) and (max-width: 1015px) {

     .navbar .navbar-nav .nav-link{
      font-size: 15px;
    }

    .dropdown .dropdown-menu a{
      font-size: 13px;

    }
  }


  @media (max-width: 576px) {

   .navbar .navbar-nav .nav-link{
    font-size: 15px;
  }

  .dropdown .dropdown-menu a{
    font-size: 11px;

  }
}



.dropdown .dropdown-menu a{

 font-family: 'Raleway', sans-serif;
}


item:focus, .dropdown-item:hover {
  color: white;
  text-decoration: none;
  background-color: #f58817;
}
</style>

<nav class="navbar navbar-expand-md bg-primary navbar-dark sticky-top">
  <!-- Brand -->

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ml-lg-3  active">
        <a class="nav-link  " href="index.php">Home </a>
      </li>
      <li class="nav-item ml-lg-3">
        <a class="nav-link " href="about.php">About</a>
      </li>
      <li class="nav-item ml-lg-3">
        <a class="nav-link " href="administrative.php">Administrative</a>
      </li>

     <!--  <li class="nav-item ml-lg-3">
        <a class="nav-link " href="faculty.php">Faculty</a>
      </li> -->

     <!--  <li class="nav-item ml-lg-3">
        <a class="nav-link " href="course.php">Course</a>
      </li> -->

      <li class="nav-item ml-lg-3">
        <a class="nav-link " href="facility.php">Facility</a>
      </li>

     <!--  <li class="nav-item ml-lg-3">
        <a class="nav-link " href="syllabus.php">Syllabus</a>
      </li> -->

      <li class="nav-item ml-lg-3">
        <a class="nav-link " href="gallery.php">Gallery</a>
      </li>     
      <li class="nav-item ml-lg-3">
        <a class="nav-link " href="contact.php">Contact Us</a>
      </li>
    </ul>
    <span class="navbar-text">
      <a href="registration.php" class="btn btn-success">Register Now!!</a>
    </span>
  </div>
</nav>