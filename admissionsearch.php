<?php
if(isset($_POST['search'])){
 $date=$_POST['date'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Student  Management System|||Search Students</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="./vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="./vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="./css/style.css">
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
             <div class="page-header">
              <h3 class="page-title"> Search  Admission</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Search Admission</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <form action="admissionsearch.php" method="post" >
                                <div class="form-group">
                                  <strong>Admissions</strong>
                                  <select  name="date" class="form-control" required="true"  >
                                  <option value=""><?php echo $date ?></option>
                                  <option value="today">Today</option>
                                  <option value="15day">Last 15 day</option>
                                  <option value="30day">This Month</option>
                                  </select>
                                </div>
                        </form>
                    </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Your Searched Result</h4>
                      <a href="#" class="text-dark ml-auto mb-3 mb-sm-0">Your Searched Result</a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                    <table class="table">
                      <tbody> 
                        <thead>
                        <tr><th class="font-weight-bold">Student Details<th></tr>
                          <tr>
                            <th class="font-weight-bold">S.NO</th>
                            <th class="font-weight-bold">Student Name</th>
                            <th class="font-weight-bold">Gender</th>
                            <th class="font-weight-bold">DOB</th>
                            <th class="font-weight-bold">contact</th>
                            <th class="font-weight-bold">Admitdate</th>
                            
                          </tr>
                        </thead>
                        <?php 
                        include 'dbconnection.php';
                        if(isset($_POST['search'])){
                            $date=$_POST['date'];
                        if($date == "today"){
                            $sdate=date("Y-m-d");
                            $sql2="select * from student  where admitdate='$sdate'";
                            $result2=mysqli_query($link,$sql2);
                        while($row2=mysqli_fetch_assoc($result2)){?>
                        <tr>
                            <td><?php echo $row2['student_id']?></td>
                            <td><?php echo $row2['fname']." ".$row2['lname']?></td>
                            <td><?php echo $row2['gender']?></td>
                            <td><?php echo $row2['age']?></td>
                            <td><?php echo $row2['contact']?></td>
                            <td><?php echo $row2['admitdate']?></td> 
                        </tr>
                        <?php } }else if($date == "Last 15 day"){
                            // $cdate=date_create(date('Y-m-d'));
                            // $date1=date_format($cdate,'Y-m-d');
                            // $newdate=date_modify($cdate,"-15 days");
                            // $date2=date_format($newdate,'Y-m-d');
                            $sql2="select * from student where DATE(admitdate) >= (DATE(NOW()) - INTERVAL 15 DAY) order by admitdate";
                            $result2=mysqli_query($link,$sql2);
                        while($row2=mysqli_fetch_assoc($result2)){?>
                        <tr>
                            <td><?php echo $row2['student_id']?></td>
                            <td><?php echo $row2['fname']." ".$row2['lname']?></td>
                            <td><?php echo $row2['gender']?></td>
                            <td><?php echo $row2['age']?></td>
                            <td><?php echo $row2['contact']?></td>
                            <td><?php echo $row2['admitdate']?></td> 
                        </tr>
                        <?php } }else if($date == "This Month"){
                            $sql2="select * from student where DATE(admitdate) >= (DATE(NOW()) - INTERVAL 30 DAY) order by admitdate";
                            $result2=mysqli_query($link,$sql2);
                        while($row2=mysqli_fetch_assoc($result2)){?>
                        <tr>
                            <td><?php echo $row2['student_id']?></td>
                            <td><?php echo $row2['fname']." ".$row2['lname']?></td>
                            <td><?php echo $row2['gender']?></td>
                            <td><?php echo $row2['age']?></td>
                            <td><?php echo $row2['contact']?></td>
                            <td><?php echo $row2['admitdate']?></td> 
                        </tr>
                            
                        <?php } }?>

                    <?php }?>
                        </tbody>
                        </table>
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
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>