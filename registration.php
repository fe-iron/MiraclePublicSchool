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

    if (isset($_POST['student_name'])){
        // removes backslashes
        $name = $_POST['student_name'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $class = $_POST['class'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile1'];

        if(isset($_POST['mobile2'])){
          $mobile2 = $_POST['mobile2'];
        }else{
          $mobile2 = "";
        }

        if(isset($_POST['suggestion'])){
          $suggestion = $_POST['suggestion'];
        }else{
          $suggestion = "";
        }

        $target_dir = "admin-panel/upload/admission/";
        
        $flag1 = false;
        $flag2 = false;
        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png");

        //saving first image
        $img1 = $_FILES['photo']['name'];
        // echo $_FILES['photo']['name'];
        $target_file1 = $target_dir . basename($_FILES["photo"]["name"]);
        // Select file type
        $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
        
        
        // Check extension
        if(in_array($imageFileType1,$extensions_arr) ){
        // Upload file
            if(move_uploaded_file($_FILES['photo']['tmp_name'],$target_dir.$img1)){
                // Insert record
                $flag1 = true;
            }
        }else{
            // echo $kyc;
            $_SESSION['error'] = 'Photo Saving Failed! try again';
            header("Location: registration.php");
        }

        //saving second image
        $img2 = $_FILES['signature']['name'];
        // echo $_FILES['photo']['name'];
        $target_file1 = $target_dir . basename($_FILES["signature"]["name"]);
        // Select file type
        $imageFileType1 = strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
        
        
        // Check extension
        if(in_array($imageFileType1,$extensions_arr) ){
        // Upload file
            if(move_uploaded_file($_FILES['signature']['tmp_name'],$target_dir.$img2)){
                // Insert record
                $flag2 = true;
            }
        }else{
            // echo $kyc;
            $_SESSION['error'] = 'Signature Saving Failed! try again';
            header("Location: registration.php");
        }

        $query = "INSERT into `users` (class, student_name, father_name, mother_name, address, mobile1, mobile2, suggestion, photo, signature) 
                  VALUES ('$class', '$name', '$fname', '$mname', '$address', '$mobile', '$mobile2', '$suggestion', '$img1', '$img2')";

        if($conn->query($query) === TRUE){
            
            // Email configuration 
            $to = "differences690@gmail.com";
            $from = 'contact@miraclepublicschool.com';
            $fromName = 'Miracle Public School'; 
            
            $subject = 'Thank you for registration with Miracle Public School';  
            
            $htmlContent = ' 
                <center><h3>Thanks for Registration with Miracle Public School</h3></center><hr/>
                <h4>These are the details that you have shared with us.</h4> <hr/>
                <p><b>Full Name:</b> '.$name.'</p>
                <p><b>Father Name:</b> '.$fname.'</p>
                <p><b>Mother Number:</b> '.$mname.'</p>
                <p><b>Class:</b> '.$class.'</p>
                <p><b>Address:</b> '.$address.'</p>
                <p><b>Mobile Number:</b> '.$mobile.'</p>
                <p><b>Alternate Mobile Number:</b> '.$mobile2.'</p>
                <p><b>Suggestion:</b> '.$suggestion.'</p>
                <p><b>Photo and Signature are attached to this mail</p>';
            
            // Attachment files 
            $files = array(
                'admin/upload/admission/'. $img1,
                'admin/upload/admission/'. $img2
            ); 
            
            // Call function and pass the required arguments 
            $sendEmail = multi_attach_mail($to, $subject, $htmlContent, $from, $fromName, $files); 
            // $sendEmail = multi_attach_mail('differences690@gmail.com', $subject, $htmlContent, $from, $fromName, $files); 
            
            // Email sending status 
            if($sendEmail){ 
                $_SESSION['msg'] = "Successfully registered! Thank you for registration";
            }else{ 
                $_SESSION['msg'] = "Successfully registered!";
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
  <title>Admission</title>
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
  <link rel="stylesheet" type="text/css" href="inc/css/registration.css">
</head>
<body> <?php include_once 'inc/header.php'; ?>
<?php include_once 'inc/navbar.php'; ?> 
<section class="paddding-gallery">
  <div class="container">
    <div class="row">
      <div class="col">
        <h3 class="py-2 text-white font-weight-bold text-center">Registration</h3>
        <p class="text-white"></p>
        <!--  <button  type="button" class="btn btn-success" >Apply Now</button> -->
      </div>
    </div>
  </div>
</section>
<!-- end of upper  section -->
<section class="py-5">


  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="col-md p-0">
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
          <form action=" " enctype="multipart/form-data" method="post" >
            <h5 class="pb-3" style="font-family: 'Raleway', sans-serif;letter-spacing: 1.5px;">Note <span class="text-danger h4">*</span>: Fill The Form Very Carefully</h5>
            <div class="form-row">
              <div class="form-group col-md mb-3">
                <label  for="inputState">Class Apply For <span class="text-danger h4">*</span></label>
                <select id="inputState" class="form-control" name="class" required="">
                  <option selected>Select</option>
                  <option value="1">1st Class </option>
                  <option value="2">2nd Class </option>
                  <option value="3">3rd Class </option>
                  <option value="4">4th Class </option>
                  <option value="5">5th Class </option>
                  <option value="6">6th Class </option>
                  <option value="7">7th Class </option>
                  <option value="8">8th Class </option>
                  <option value="9">9th Class </option>
                  <option value="10">10th Class </option>
                </select>
              </div>

              <div class="form-group col-md mb-3">
                <label  for="inputEmail4">Name Of Student <span class="text-danger h4">*</span></label>
                <input type="text" class="form-control" id="inputEmail4" required="required" placeholder="Enter Name" name="student_name">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md mb-3">
                <label  for="inputPassword4">Father's Name <span class="text-danger h4">*</span></label>
                <input type="text" class="form-control" id="inputPassword4" required="required" placeholder="Enter Father Name" name="fname">
              </div>
              <div class="form-group col-md mb-3">
                <label  for="inputPassword4">Mother's Name <span class="text-danger h4">*</span></label>
                <input type="text" class="form-control" id="inputPassword4" required="required" placeholder="Enter Mother Name" name="mname">
              </div>
            </div>
            <div class="form-row ">
              <div class="form-group col-md mb-3">
                <label  for="inputAddress">Address <span class="text-danger h4">*</span></label>
                <input type="text" class="form-control" id="inputAddress" required="required" placeholder="1234 Main St" name="address">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md mb-3">
                <label  for="inputAddress2">Mobile No <span class="text-danger h4">*</span></label>
                <input type="tel" class="form-control" id="inputAddress2" required="required" placeholder="Enter Mobile No." name="mobile1">
              </div>
              <div class="form-group col-md mb-3">
                <label  for="inputAddress2">Mobile No <span class=" h6">(Alternate)</span></label>
                <input type="tel" class="form-control" id="inputAddress2"  placeholder="Enter Mobile No" name="mobile2">
              </div>
            </div>
            <div class="form-row mb-3">
              <div class="form-group col-md mb-3">
                <label  for="exampleFormControlTextarea1">Any Suggestion</label>
                <textarea class="form-control" rows="3" name="suggestion">Message</textarea>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md mb-3">
                <label  for="inputCity">Upload Photo (passport Size)* <span class="text-danger">*</span></label>
                <input type="file" class="form-control" id="inputCity" required="required" placeholder="Upload Photo" name="photo">
              </div>
              <div class="form-group col-md mb-3">
                <label  for="inputState">Upload Signature* <span class="text-danger">*</span></label>
                <input type="file" id="inputState" class="form-control" required="required" placeholder="Upload Signature" name="signature">
              </div>
            </div>

            <div class="form-row">
             <div class="form-group col-md mb-2">
              <input type="submit" name="submit" id="" value="Submit" class="btn btn-success" >
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
</section> 
<?php include_once 'inc/footer.php'; ?>
</body>
</html>