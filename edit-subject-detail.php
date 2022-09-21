<?php
include "dbconnection.php";
$subid=$_GET['subjectid'];
if (isset($_POST['submit'])){

  $name=$_POST['sname'];
  $course=$_POST['course'];
  $sql="update subject set subname='$name',course_id='$course' where subject_id=$subid";
  mysqli_query($link,$sql);
  header("location:http://localhost/SMS/manage_subject.php"); 
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Student  Management System|| Update Subject</title>
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
              <h3 class="page-title"> Update Subject </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Update Subject</li>
                </ol>
              </nav>
            </div>
            <div class="row">
            <?php
                $subid=$_GET['subjectid'];
                $couid=$_GET['courseid'];
            $sql="select * from subject left join course on subject.course_id=course.course_id where subject_id=$subid"; 
            $result=mysqli_query($link,$sql);
             while($row=mysqli_fetch_assoc($result)){?> 
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Update Subject</h4>
                   
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      
                      <div class="form-group">
                        <label for="exampleInputName1">Subject Name</label>
                        <input type="text" name="sname" value="<?php echo $row['subname']?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Course</label>
                        <select  name="course" class="form-control" required='true'>
                          <option value="">Select Course</option>
                          <?php
                            $sql="select * from course";
                            $result=mysqli_query($link,$sql);
                            while($row=mysqli_fetch_assoc($result)){?>
                            <?php
                            if($row['course_id'] == $couid){
                            $selected="selected";
                            }else{
                            $selected="";
                            }
                            ?>
                                <option <?php echo $selected ?> value="<?php echo $row['course_id'] ?>"> <?php echo $row['cname'] ?></option>
                            <?php
                            }

                            ?>
                        </select>
                      </div>
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Update</button>
                     
                    </form>
                    <?php }?>
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
</html>option value=""></option>