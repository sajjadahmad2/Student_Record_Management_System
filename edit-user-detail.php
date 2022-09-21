<?php
include "dbconnection.php";
if(isset($_GET['userid'])){
  $userid=$_GET['userid'];

}
if(isset($_FILES['new-image'])){
  if(($_FILES['new-image']['name'])){
      $filename=$_FILES['new-image']['name'];
      $filesize=$_FILES['new-image']['size'];
      $filetempname=$_FILES['new-image']['tmp_name'];
      move_uploaded_file($filetempname,"images/.$filename");
      
  }
  else{
      $filename=$_POST['old-image'];
        
  }
  }
if (isset($_POST['submit'])){

  $username=$_POST['username'];
  $email=$_POST['email'];
  $contact=$_POST['contact'];
  $sql="update user set username='$username',email='$email',contact='$contact',image='$filename' where user_id=$userid";
  mysqli_query($link,$sql);
  header("location:http://localhost/SMS/manage_user.php"); 
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Student  Management System|| Update User</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
    
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include 'header.php';?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
      <?php include 'sidebar.php';?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Update User </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Update User</li>
                </ol>
              </nav>
            </div>
            <div class="row">
            <?php
            if(isset($_GET['userid'])){
                $userid=$_GET['userid'];

            }
            $sql="select * from user where user_id=$userid"; 
            $result=mysqli_query($link,$sql);
             while($row=mysqli_fetch_assoc($result)){?>
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Update User</h4>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">User Name</label>
                        <input type="text" name="username" value="<?php echo $row['username'] ?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Email</label>
                        <input type="email" name="email" value="<?php echo $row['email'] ?>"  class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Contact Number</label>
                         <input type="text" name="contact" value="<?php echo $row['contact'] ?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputCity1">Choose Image</label>
                         <input type="file" name="new-image">
                         <img  src="images/<?php echo $row['image'];?>" height="150px">
                        <input type="hidden" name="old-image" value="<?php echo $row['image'];?>">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Update</button>
                     
                    </form>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include 'footer.php';?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>