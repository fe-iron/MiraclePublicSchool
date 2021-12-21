<!DOCTYPE html>
<html>
<head>
	<title></title>
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
    <link rel="stylesheet" type="text/css" href="inc/css/alumini.css">
</head>
<body>

 <?php include_once 'inc/header.php'; ?>
 <?php include_once 'inc/navbar.php'; ?>

<section class="paddding-alumini">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="py-2 text-white font-weight-bold">Our Alumini</h3>
                    <p class="text-white">For more than 53 years, we’ve educated and trained the future engineers, Doctors, politicians and list are too divers they almost in every field.Our students are active in the classroom, laboratory, community and more. </p>
                   <!--  <button  type="button" class="btn btn-success" >Apply Now</button> -->
                   <a href="images/Admission-form/insan-school.pdf"><button  type="button" class="btn btn-success" >Apply Now</button></a>
                   <a href="images/Admission-form/insan-school.pdf"><button  type="button" class="btn btn-dark" >Apply Now</button></a>
                   
                </div>
            </div>
        </div>
    </section>



   <section class="alumini">
   	<div class="container">
   		<div class="row  py-5 mx-lg-5">
   			<div class="col-md">
   				<h2 class="text-center pb-5">Register yourself as ALUMNI</h2>
   				  <form >
                            <div class="form-row">
                                <div class="form-group col-md">
                                    <label class="font-weight-bold mt-2" for="fname">Name* </label>
                                    <input type="text" class="form-control" id="fname" name="student_name" placeholder="First Name" required>
                                </div>
                                <div class="form-group col-md">
                                    <label class="font-weight-bold mt-2" for="mname">Father's Name* </label>
                                    <input type="text" class="form-control" id="mname" name="student_name" placeholder="Father's Name" required>
                                </div>

                                <div class="form-group col-md">
                                    <label f class="font-weight-bold mt-2"or="contactno">Contact Number* </label>
                                    <input type="number" class="form-control" id="contactno" name="student_name" placeholder="Enter Contact Number" required>
                                </div>
                                
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md">
                                    <label class="font-weight-bold mt-2" for="name">Native Place* </label>
                                    <input type="text" class="form-control" id="contactno" name="student_name" placeholder="Enter Native Place" required>
                                </div>
                                <div class="form-group col-md">
                                    <label  class="font-weight-bold mt-2"for="lemail">Current Address* </label>
                                    <input type="email" class="form-control" id="lcompany" name="student_name" placeholder="Enter Current Address" required>
                                </div>

                                <div class="form-group col-md">
                                    <label  class="font-weight-bold mt-2"for="lemail">Pin Number*</label>
                                    <input type="number" class="form-control" id="lcompany" name="pin" placeholder="Enter Pin Number" required>
                                </div>
                                
                            </div>
                            <div class="form-row">
                                
                                <div class="form-group col-md">
                                    <label class="font-weight-bold mt-2" for="text"> Duration of Study FROM*</label>
                                    <input type="number" class="form-control" id="lcompany" name="Date" placeholder="Enter Year of Start" required>
                                </div>
                                
                            
                            <div class="form-group col-md">
                                <label class="font-weight-bold mt-2" for="inputAddress">Duration of Study TO*</label>
                                <input type="number" class="form-control" id="inputAddress" placeholder=" Enter Year of Passing">
                            </div>
                           

                            
                                <div class="form-group  col-md">
                                    <label class="font-weight-bold mt-2" for="inputCity">Profession*</label>
                                    <input type="text" class="form-control" id="inputCity" placeholder="Enter the Profession">
                                </div>
                               
                            </div>

                            <div class="form-row">
                                
                                <div class="form-group col-md">
                                    <label class="font-weight-bold mt-2" for="text">Classes FROM*</label>
                                    <input type="number" class="form-control" id="lcompany" name="Date" placeholder="Enter Class of Start" required>
                                </div>
                                
                            
                            <div class="form-group col-md">
                                <label class="font-weight-bold mt-2" for="inputAddress">Classes TO*</label>
                                <input type="number" class="form-control" id="inputAddress" placeholder=" Enter Class of Passing">
                            </div>
                               
                            </div>

                            <div class="form-row">
                           
							  <div class="form-group col-md">
							    <label for="exampleFormControlFile1" class="font-weight-bold mt-2">Upload your current photo*</label>
							    <input type="file" class="form-control-file" id="exampleFormControlFile1">
							  </div>
							
                            
							  <div class="form-group col-md">
							    <label for="exampleFormControlFile1" class="font-weight-bold mt-2">Upload any proof of study*</label>
							    <input type="file" class="form-control-file" id="exampleFormControlFile1">
							  </div>
							
                        </div>


                            <!-- <button type="submit" class="btn btn-dark">Submit</button> -->
                            <button type="submit" class="btn btn-success" data-toggle="modal" data-target="#myModal23">Submit</button>
                            
                        </form>
   			</div>
   		</div>
   	</div>
   </section>









<?php include_once 'inc/footer.php'; ?>


</body>
</html>