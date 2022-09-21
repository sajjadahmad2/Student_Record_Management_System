<?php

// session_start();
include 'dbconnection.php'; 
// if(isset($_SESSION['username'])){
        
//   header("location:http://localhost/SMS/dashboard.php");
    
//     }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Student  Management System|||Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css">
    <!-- End layout styles -->
   
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
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5 class="font-weight-semibold">Report Summary</h5> <span class="ml-auto">Updated Report</span> <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">Total Student</span>
                          <?php 
                          $sql="select Count(*)as total from student";
                          $result=mysqli_query($link,$sql);
                          $row=mysqli_fetch_assoc($result)
                          ?>
                          <h4><?php echo $row['total']?></h4>
                          <a href="manage_student.php"><span class="report-count"> View Students</span></a>
                        </div>
                        <div class="inner-card-icon bg-success">
                          <i class="icon-user"></i>
                          
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">Total Course</span>
                          <?php
                          $sql="select Count(*)as total from course";
                          $result=mysqli_query($link,$sql);
                          $row=mysqli_fetch_assoc($result)
                          ?>
                          <h4><?php echo $row['total']?></h4>
                          <a href="manage_course.php"><span class="report-count"> View Courses</span></a>
                        </div>
                        <div class="inner-card-icon bg-danger">
                        <i class="icon-doc"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">Total Subjects</span>
                          <?php
                          $sql="select Count(*)as total from subject";
                          $result=mysqli_query($link,$sql);
                          $row=mysqli_fetch_assoc($result)
                          ?>
                          <h4><?php echo $row['total']?></h4>
                          <a href="manage_subject.php"><span class="report-count"> View Subjects</span></a>
                        </div>
                        <div class="inner-card-icon bg-warning">
                          <i class="icon-doc"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">Total Sections</span>
                          <?php
                          $sql="select Count(*)as total from section";
                          $result=mysqli_query($link,$sql);
                          $row=mysqli_fetch_assoc($result)
                          ?>
                          <h4><?php echo $row['total']?></h4>
                          <a href="manage_section.php"><span class="report-count"> View Sections</span></a>
                        </div>
                        <div class="inner-card-icon bg-primary">
                          <i class="icon-home"></i>
                        </div>
                      </div>
                    </div>
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
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/moment/moment.min.js"></script>
    <script src="vendors/daterangepicker/daterangepicker.js"></script>
    <script src="vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>