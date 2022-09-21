<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Student  Management System|||Manage Sections</title>
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
              <h3 class="page-title"> Manage Section </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Manage Section</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">Manage Section</h4>
                      <a href="#" class="text-dark ml-auto mb-3 mb-sm-0"> View all Section</a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">S.No</th>
                            <th class="font-weight-bold">Section Name</th>
                            <th class="font-weight-bold">Action</th>
                          </tr>
                        </thead>
                        <tbody> 
                        <?php
                        include 'dbconnection.php';
                          $limit=5;
                          if(isset($_GET['page'])){
                            $page=$_GET['page'];
                            }else{
                                $page=1;
                                }
                                             
                        $offset=($page-1)*$limit;
                        $sql="select * from section order by section_id limit $offset,$limit";
                        $result=mysqli_query($link,$sql);
                        while($row=mysqli_fetch_assoc($result)){?>  
                          <tr>
                           
                            <td><?php echo $row['section_id']?></td>
                            <td><?php echo $row['sname']?></td>
                            <td>
                              <div><a href="edit-section-detail.php?sectionid=<?php echo $row['section_id']?>"><i class="icon-eye"></i></a>
                                   <a href="delete_section.php?sectionid=<?php echo $row['section_id']?>" onclick="return confirm('Do you really want to Delete ?');"><i class="icon-trash"></i></a>
                                </div>
                            </td> 
                          </tr> 
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <?php
                  $sql="select * from course";
                  $result=mysqli_query($link,$sql);
                  $total=mysqli_num_rows($result);
                  $limit=5;
                  $totalpages=ceil($total/$limit);
                  echo"<ul  class='pagination' align=''center'>";
                    
                    for($i = 1;$i <= $totalpages;$i++)

                    {
                        if($i==$page){
                            $active="active";
                
                        }else{

                            $active="";
                        }
                        echo '<li class="'.$active.'"><a href="manage_course.php?page='.$i.'">'.$i.'</a></li>';
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