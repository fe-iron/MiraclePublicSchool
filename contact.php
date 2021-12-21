<?php

    include 'admin-panel/connection.php';  
    $conn = OpenCon();
    session_start();

    function multi_attach_mail($to, $subject, $message, $senderEmail, $senderName, $files = array()){ 
        // Sender info  
        $from = $senderName." <".$senderEmail.">";  
        $headers = "From: $from"; 
  
        // Boundary  
        $semi_rand = md5(time());  
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
  
        // Headers for attachment  
        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";  
  
        // Multipart boundary  
        $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
        "Content-Transfer-Encoding: 7bit\n\n" . $message . "\n\n";  
  
        // Preparing attachment 
        if(!empty($files)){ 
           for($i=0;$i<count($files);$i++){ 
              if(is_file($files[$i])){ 
                    $file_name = basename($files[$i]); 
                    $file_size = filesize($files[$i]); 
                    
                    $message .= "--{$mime_boundary}\n"; 
                    $fp =    @fopen($files[$i], "rb"); 
                    $data =  @fread($fp, $file_size); 
                    @fclose($fp); 
                    $data = chunk_split(base64_encode($data)); 
                    $message .= "Content-Type: application/octet-stream; name=\"".$file_name."\"\n" .  
                    "Content-Description: ".$file_name."\n" . 
                    "Content-Disposition: attachment;\n" . " filename=\"".$file_name."\"; size=".$file_size.";\n" .  
                    "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
              } 
           } 
        } 
        
        $message .= "--{$mime_boundary}--"; 
        $returnpath = "-f" . $senderEmail; 
        
        // Send email 
        $mail = mail($to, $subject, $message, $headers, $returnpath);  
        
        // Return true if email sent, otherwise return false 
        if($mail){ 
           return true; 
        }else{ 
           return false; 
        } 
    }

    if (isset($_POST['contact_submit'])){
        // removes backslashes
        $name = $_POST['student_name'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        $address = $_POST['address'];
        $message = $_POST['message'];

        $query = "INSERT into `contact` (name, email, number, address, query) 
                  VALUES ('$name', '$email', '$number', '$address', '$message')";

        if($conn->query($query) === TRUE){
            
            // Email configuration 
            $to = $email;
            $from = 'contact@miraclepublicschool.com';
            $fromName = 'Miracle Public School'; 
            
            $subject = 'Thank you for Contacting to Miracle Public School';  
            
            $htmlContent = ' 
                <center><h3>Thanks for Contacting to Miracle Public School</h3></center><hr/>
                <h4>These are the details that you have shared with us.</h4> <hr/>
                <p><b>Full Name:</b> '.$name.'</p>
                <p><b>Your Email:</b> '.$email.'</p>
                <p><b>Address:</b> '.$address.'</p>
                <p><b>Mobile Number:</b> '.$number.'</p>
                <p><b>Query:</b> '.$message.'</p><hr/>
                <p>We will contact you as soon as possible, thanks for your patience!</p>';
            
            // Attachment files 
            $files = array(); 
            
            // Call function and pass the required arguments 
            $sendEmail = multi_attach_mail($to, $subject, $htmlContent, $from, $fromName, $files); 
            // $sendEmail = multi_attach_mail('differences690@gmail.com', $subject, $htmlContent, $from, $fromName, $files); 
            
            // Email sending status 
            if($sendEmail){ 
                $_SESSION['msg'] = "Successfully Send Thanks for your query, check your mail for confirmation";
            }else{ 
                $_SESSION['msg'] = "Successfully Send Thanks for your query";
            }
        }else{
            // echo "Error: " . $query . "<br>" . $con->error;
            $_SESSION['error'] = "Registration Failed! Try Again";
        }
    }
?>



<!DOCTYPE html>
<html>
<head>
	<title>Contact Us | Miracle Public School</title>
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
  <link rel="stylesheet" type="text/css" href="inc/css/contact.css">
</head>
<body>

	<?php include_once 'inc/header.php'; ?>
 <?php include_once 'inc/navbar.php'; ?>

 <section class="padding-contact">
  <div class="container">
    <div class="row">
      <div class="col">
        <h2 class="text-white font-weight-bold text-center">Contact Us</h2>
        <p  class="text-white text-center">We are here to listen You.</p>
        
        
      </div>
    </div>
  </div>
</section>

<section class="address bg-light">
  <div class="container py-5">
    <div class="row">
      <div class="col-md" data-aos="fade-down" data-aos-duration="3000">
        <div class="card border-0 my-4">
          <i class="fas fa-home text-center card-title fa-5x mt-4 "></i>
          <div class="card-body text-center">
            <p><b>Address</b></p>
            <p>Miracle Public School, Friends Colony, Barsoi-854317, Bihar</p>
          </div>
        </div>
      </div>
      
      <div class="col-md" data-aos="fade-down" data-aos-duration="3000">
        <a href="tel:+919149233323" class="text-decoration-none text-dark">
          <div class="card border-0 my-4">
            <i class="fas fa-phone text-center card-title fa-5x mt-4 "></i>
            <div class="card-body text-center">
              <p><b>Phone</b></p>
              <p> 9149233323</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-md" data-aos="fade-down" data-aos-duration="3000">
        <div class="card border-0 my-4">
          <i class="fas fa-envelope text-center card-title fa-5x mt-4 "></i>
          <div class="card-body text-center">
            <p><b>Email</b></p>
            <p>mpsbarsoi@gmail.com</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End of address -->


<section class=" my-4 contact-detail">
 <div class="container detail">
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
  <div class="row my-4 ">
    <div class="col-md" data-aos="fade-down" data-aos-duration="3000">
      <h4 class="my-4">Way to Google map</h4>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3597.6249098523745!2d87.93295631449298!3d25.617377420812417!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39facdeb300ad493%3A0x8d98ffb3adae8cfe!2sMiracle%20Public%20School!5e0!3m2!1sen!2sin!4v1639242872220!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="border"></iframe>
      <!--  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1660.0260877310484!2d87.94917359430812!3d26.09814985095253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39e516bfd524e57f%3A0xd1be8e53c38ccf44!2sKishanganj!5e0!3m2!1sen!2sin!4v1559074648735!5m2!1sen!2sin" width="100%" height="450px;" class="border" style="border:0;" allowfullscreen></iframe> --></div>

      <div class="col-md">
        <div data-aos="fade-down" data-aos-duration="3000" class="pl-lg-5">
          <h4 class="my-4">Do You Have Any Question?</h4>
          <form method="post" action=" ">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="name">Name </label>
                <input type="text" class="form-control" id="name" name="student_name" placeholder="Enter Name" required>
              </div>
              <div class="form-group col-md-12">
                <label for="inputEmail4">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required
                >
              </div>
            </div>
            <div class="form-group">
              <label for="subject">Contact Number</label>
              <input type="tel" class="form-control" name="number" placeholder="Enter Contact Number" required>
            </div>
            <div class="form-group">
              <label for="Address">Address</label>
              <input type="text" class="form-control" name="address" placeholder="Enter Address" required>
            </div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="exampleInputEmail1">Query</label>
                <textarea name="message" class="form-control" cols="10" rows="5" required></textarea>
              </div>
            </div>
            <input type="submit" name="contact_submit" class="btn btn-primary mb-4" value="SUBMIT">
          </form>
        </div>
      </div>
    </div>
  </div>

</section>
<?php include_once 'inc/footer.php'; ?>
</body>
</html>