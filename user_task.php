<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User task</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->

  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row"  style= "background: radial-gradient(circle at 10% 20%, rgb(111, 111, 219) 0%, rgb(182, 109, 246) 72.4%);">

      <div class="navbar-menu-wrapper d-flex justify-content-between align-items-center">
      <!-- Left side content (brand/logo) can go here -->
  
      <!-- Right side content (icons and user information) -->
      <ul class="navbar-nav navbar-nav-left">
  
          <li class="nav-item nav-profile dropdown">
              
                  <div class="nav-profile-text">
                      <p class="mb-1 text-white"><?php echo $_SESSION['name']?></p>
                      <p class="mb-1 text-white" style="font-size: 12px;"><?php echo $_SESSION['email']?></p>
                  </div>
             
            
          </li>
      
      </ul>
      <!-- End Right side content -->
  </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">

            <li class="nav-item">
              <a class="nav-link" href="user_index.php" data-content="dashboard">
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="user_task.php" data-content="user_task">
                <span class="menu-title">Tasks</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user_leave.php" data-content="user_leave">
                <span class="menu-title">Apply Leave</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user_leave_status.php" data-content="user_leave_status">
                <span class="menu-title">Leave Status</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">
                <span class="menu-title">Logout</span>
              </a>
            </li>


          </ul>
        </nav>
        <!-- partial -->
      <!-- partial -->

        <!-- partial -->
        <div class="main-panel" id="mainbar">
          <div class="content-wrapper">
            <div class="page-header">
            </div>

      <div class="card-body">


        <table class="table table-hover">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Task ID</th>
              <th>Description</th>
              <th>Start Date</th>
              <th>End Date</th>
              <th>Status</th>
              <th style="text-align: center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include('includes/connection.php');
              $sno=1;
                $sql = "SELECT * FROM tasks WHERE uid = $_SESSION[uid]
                ORDER BY
                  CASE
                    WHEN status = 'Not Started' THEN 1
                    WHEN status = 'In-progress' THEN 2
                    WHEN status = 'Completed' THEN 3
                    ELSE 4 
                  END;";
              $query_run=mysqli_query($conn,$sql);
              while($row=mysqli_fetch_assoc($query_run)){
                ?>
                <tr>
                <td><?php echo $sno;?></td>
                <td><?php echo $row['tid'];?></td>
                <td><?php echo $row['description'];?></td>
                <td><?php echo $row['start_date'];?></td>
                <td><?php echo $row['end_date'];?></td>
                <td><?php echo $row['status'];?></td>
                <td>
                <a href="update_task.php?id=<?php echo $row['tid']; ?>" class="btn btn-gradient-primary btn-sm">Update</a>
                </tr>
                <?php
                $sno++;
              }
              
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->





  </body>
</html>