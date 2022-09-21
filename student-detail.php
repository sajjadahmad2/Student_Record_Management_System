<?php
include 'dbconnection.php';
if(isset($_GET['studentid'])){
    $id=$_GET['studentid'];
}
$sql1="select * from student where student_id=$id";
$result1=mysqli_query($link,$sql1);
while($row1=mysqli_fetch_assoc($result1)){

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Student  Management System|||Result of <?php echo $row1['fname']." ".$row1['lname']?></title>
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
             <div class="page-header">
              <h3 class="page-title"> Result of <?php echo $row1['fname']." ".$row1['lname']?> </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Result <?php echo $row1['fname']." ".$row1['lname']?></li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Result</h4>
                      <a href="#" class="text-dark ml-auto mb-3 mb-sm-0">Result <?php echo $row1['fname']." ".$row1['lname']?></a>
                    </div>
                    <?php } ?>
                    <div class="table-responsive border rounded p-1">
                    <table class="table">
                      <tbody> 
                        <thead>
                        <tr><th class="font-weight-bold">Student Details<th></tr>
                          <tr>
                            <th class="font-weight-bold">S.NO</th>
                            <th class="font-weight-bold">Student Name</th>
                            <th class="font-weight-bold">Gender</th>
                            <th class="font-weight-bold">Course</th>
                            <th class="font-weight-bold">Total</th>
                            <th class="font-weight-bold">Obtained</th>
                            <th class="font-weight-bold">Status</th>
                            
                          </tr>
                        </thead>
                        <?php 
                        include 'dbconnection.php';
                        $id=$_GET['studentid'];
                        $sql2="select st.student_id,st.fname,st.lname,st.gender,c.cname,sum(totalmarks) as tmarks,sum(marks) as ototal from result r  
                        left join student st on st.student_id=r.student_id 
                        left join subject sb on r.subject_id=sb.subject_id
                        left join course c on c.course_id=sb.course_id
                        where st.student_id=$id";
                        $result2=mysqli_query($link,$sql2);
                        while($row2=mysqli_fetch_assoc($result2)){?>
                        <tr>
                            <td><?php echo $row2['student_id']?></td>
                            <td><?php echo $row2['fname']." ".$row2['lname']?></td>
                            <td><?php echo $row2['gender']?></td>
                            <td><?php echo $row2['cname']?></td>
                            <td><?php echo $row2['tmarks']?></td>
                            <td><?php echo $row2['ototal']?></td> 
                            <?php 
                            if ($row2['ototal'] >  $row2['tmarks']/2){?>
                            <td><?php echo "Pass"?></td>
                            <?php 
                            }else { ?>
                            <td><?php echo "Fail" ?></td>
                            <?php }
                            ?> 
                        </tr>
                          
                        <?php } ?>
                        </tbody>
                      </table>
                    <table class="table">
                      <tbody> 
                        <thead>
                          <tr><th class="font-weight-bold">Subjects Details<th></tr>
                          <tr>
                            <th class="font-weight-bold">Subject Name</th>
                            <th class="font-weight-bold"> Marks</th>
                            <th class="font-weight-bold">Total</th>
                            <th class="font-weight-bold">Status</th>
                            
                          </tr>
                        </thead>
                        <?php
                        include 'dbconnection.php';
                        $id=$_GET['studentid'];
                          $limit=5;
                          if(isset($_GET['page'])){
                            $page=$_GET['page'];
                            }else{
                                $page=1;
                                }
                                             
                        $offset=($page-1)*$limit;
                        $sql="select st.student_id,st.fname,st.lname,st.gender,sb.subname,r.marks,r.totalmarks from result r  
                        left join student st on st.student_id=r.student_id 
                        left join subject sb on r.subject_id=sb.subject_id
                        where st.student_id=$id
                        limit $offset,$limit";
                        $result=mysqli_query($link,$sql);
                        $totalrows=mysqli_num_rows($result);
                        while($row=mysqli_fetch_assoc($result)){?>
                        <tr>
                            <td><?php echo $row['subname']?></td>
                            <td><?php echo $row['marks']?></td>
                            <td><?php echo $row['totalmarks']?></td> 
                            <?php 
                            if ($row['marks'] > $row['totalmarks']/2){?>
                            <td><?php echo "Pass"?></td>
                            <?php 
                            }else { ?>
                            <td><?php echo "Fail" ?></td>
                            <?php }
                            ?> 
                          </tr>
                          
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <?php
                  $limit=5;
                  $totalpages=ceil($totalrows/$limit);
                  echo"<ul  class='pagination' align=''center'>";
                    
                    for($i = 1;$i <= $totalpages;$i++)

                    {
                        if($i==$page){
                            $active="active";
                
                        }else{

                            $active="";
                        }
                        echo '<li class="'.$active.'"><a href="result.php?page='.$i.'">'.$i.'</a></li>';
                    }
                      
                  echo'</ul>';
                  ?>
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