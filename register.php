<?php
include "dbconnection.php";
if( isset($_FILES['upload'])){
  $filename=$_FILES['upload']['name'];
  $filesize=$_FILES['upload']['size'];
  $filetempname=$_FILES['upload']['tmp_name'];
  move_uploaded_file($filetempname,"images/".$filename);
}
if (isset($_POST['register'])){

  $username=$_POST['username'];
  $password=md5($_POST['password']);
  $email=$_POST['email'];
  $contact=$_POST['contact'];
  $date=date('Y-m-d');
  $sql="insert into user(username,password,email,contact,datecreated,image) values('$username','$password','$email','$contact','$date','$filename')";
  mysqli_query($link,$sql);
  header("location:http://localhost/SMS"); 
    echo "email is not sent";
  
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  
    <title>Student  Management System|| Sign up Page</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css">
   
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="images/logo.svg">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign up to continue.</h6>
                <form class="forms-sample" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">User Name</label>
                        <input type="text" name="username" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Password</label>
                        <input type="password" name="password" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Email</label>
                        <input type="email" name="email" value=""  class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Contact Number</label>
                         <input type="text" name="contact" value="" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Choose Image</label>
                         <input type="file" name="upload" value="" class="form-control" required='true'>
                      </div>
                      <div class="mt-3 mb-3">
                    <button class="btn btn-success btn-block loginbtn" name="register" type="submit">Sign up</button>
                  </div>
                  <div class="mb-2">
                    <a href="index.php" class="btn btn-block btn-facebook auth-form-btn">
                      <i class="icon-social-home mr-2"></i>Sign in </a>
                  </div>
                     
                    </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>