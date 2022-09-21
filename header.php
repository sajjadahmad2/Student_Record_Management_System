 <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="dashboard.php">
            <strong style="color: white;">SMS</strong>
          </a>
          <a class="navbar-brand brand-logo-mini" href="dashboard.php"><img src="images/logo-mini.svg" alt="logo" /></a>
        </div>
        <?php
         include 'dbconnection.php';
         session_start();
         if(isset($_SESSION['username'])){
            $id=$_SESSION['userid'];
         }
$sql="SELECT * from user where user_id=$id";
$result=mysqli_query($link,$sql);
while($row=mysqli_fetch_assoc($result))
{?>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex"><?php  echo $row['username'];?> Welcome dashboard!</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ml-2" src="images/<?php  echo $row['image'];?>" alt="Profile image"> <span class="font-weight-normal"> <?php  echo $row['username'];?> </span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-sm rounded-circle" src="images/<?php  echo $row['image'];?>" alt="Profile image">
                  <p class="mb-1 mt-3"><?php  echo $row['username'];?></p>
                  <p class="font-weight-light text-muted mb-0"><?php  echo $row['email'];?></p>
                </div>
                <a class="dropdown-item" href="profile.php"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile</a>
                <a class="dropdown-item" href="change-password.php"><i class="dropdown-item-icon icon-energy text-primary"></i> Setting</a>
                <a class="dropdown-item" href="logout.php"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
              </div>
            </li>
          </ul>
          <?php } ?>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>