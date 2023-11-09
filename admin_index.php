<?php
  session_start();
  if(isset($_SESSION['email'])){
    include('includes/connection.php');?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Page</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top" style="background: radial-gradient(circle at 10% 20%, rgb(111, 111, 219) 0%, rgb(182, 109, 246) 72.4%);">

  <div class="navbar-menu-wrapper d-flex justify-content-between align-items-center">
      <!-- Left side content (brand/logo) can go here -->
  
      <!-- Right side content (icons and user information) -->
      <ul class="navbar-nav navbar-nav-left">
  
          <li class="nav-item nav-profile dropdown">
              
                  <div class="nav-profile-text">
                      <p class="mb-1 text-white">Admin</p>
                      <p class="mb-1 text-white" style="font-size: 12px;">admin@gmail.com</p>
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
              <a class="nav-link" href="admin_index.php" data-content="dashboard" id="logout_link">
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="create_task.php" data-content="create_task" id="create_task">
                <span class="menu-title">Create Task</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manage_task.php" data-content="manage_task" id="manage_task">
                <span class="menu-title">Manage Tasks</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="leave_app.php" data-content="leave_app"  id="view_leave">
                <span class="menu-title">Leave Applications</span>
              </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" id="logout_link"  href="logout.php"  onclick="confirmLogout()">
                <span class="menu-title">Logout</span>
            </a>
            </li>


          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel" id="mainbar">
          <div class="content-wrapper">
            <div class="page-header">
            </div>

            <div class="row">
              <div class="col-md-6 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">
                      Completed Tasks <i class="mdi mdi-alarm-check float-right"></i>
                      <br>
                      <h2 style="font-weight: bolder;">
                        <?php
                          $sql="SELECT COUNT(*) as total_count FROM tasks WHERE status='Completed'";
                          $result=mysqli_query($conn,$sql);
                          if($result){
                            $row=mysqli_fetch_assoc($result);
                            $ccount=$row['total_count'];
                            echo $ccount;
                          }
                        ?>
                      </h2>
                    </h4>
                    <h2 class="mb-5"></h2>
                    
                  </div>
                </div>
              </div>

              <div class="col-md-6 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Ongoing Tasks <i class="mdi mdi-alarm float-right"></i>
                    <br>
                      <h2 style="font-weight: bolder;">
                        <?php
                          
                          $sql="SELECT COUNT(*) as total_count FROM tasks WHERE status='In-progress' OR status='Not started'";
                          $result=mysqli_query($conn,$sql);
                          if($result){
                            $row=mysqli_fetch_assoc($result);
                            $pcount=$row['total_count'];
                            echo $pcount;
                          }
                        ?>
                      </h2>
                    </h4>
                    <h2 class="mb-5"></h2>
                    
                  </div>
                </div>
              </div>

            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Recent Tasks</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> Assignee </th>
                            <th> Task ID </th>
                            <th> Status </th>
                            <th> Start Date </th>
                            <th> End Date </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $sql="SELECT * FROM tasks
                            ORDER BY
                              CASE
                                WHEN status = 'Not Started' THEN 1
                                WHEN status = 'In-progress' THEN 2
                                WHEN status = 'Completed' THEN 3
                                ELSE 4 
                              END;";
                            $query_run=mysqli_query($conn,$sql);
                            if($query_run){
                              while($row=mysqli_fetch_assoc($query_run)){
                                ?>
                                <tr>
                                  <td><?php 
                                    $sql1="SELECT name FROM users WHERE uid=$row[uid]";
                                    $query_run1=mysqli_query($conn,$sql1);
                                    while($row1=mysqli_fetch_assoc($query_run1)){
                                      echo $row1['name'];
                                    }
                                  ?></td>
                                  <td><?php echo $row['tid']?></td>
                                  <td><?php echo $row['status']?></td>
                                  <td><?php echo $row['start_date']?></td>
                                  <td><?php echo $row['end_date']?></td>
                                </tr>
                                <?php
                              }
                            }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid d-flex justify-content-between">
              <span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © Task Management System</span>

            </div>
          </footer>
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

    <script>
  function confirmLogout() {
    if (window.confirm("Are you sure you want to log out?")) {
      // User confirmed, perform the logout and redirection here.
      window.location.href = "login.php"; // Redirect to the logout page.
    }
  }
</script>



  </body>
</html>
<?php
  }
  else{
    header('Location:login.php');
  }
?>