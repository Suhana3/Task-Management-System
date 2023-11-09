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
    <title>Create Tasks</title>
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
              <a class="nav-link" href="admin_index.php" data-content="dashboard">
                <span class="menu-title">Dashboard</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="create_task.php" data-content="create_task">
                <span class="menu-title">Create Task</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manage_task.php" data-content="manage_task">
                <span class="menu-title">Manage Tasks</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="leave_app.php" data-content="leave_app">
                <span class="menu-title">Leave Applications</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="logout.php">
                <span class="menu-title">Logout</span>
              </a>
            </li>


          </ul>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper">

            <div class="row">
              <div class="col-md-9 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">

                    <form class="forms-sample" method="post" action="create_task.php">
                    <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Employee</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="id">
                                <option>-Select-</option>
                                <?php
                                  include('includes/connection.php');
                                  $sql="SELECT uid,name From users";
                                  $query_run=mysqli_query($conn,$sql);
                                  if(mysqli_num_rows($query_run)){
                                    while($row=mysqli_fetch_assoc($query_run)){
                                      ?>
                                      <option value="<?php echo $row['uid']?>"><?php echo $row['name'];?></option>
                                      <?php
                                    }
                                  }
                                ?>
                              </select>
                            </div>
                          </div>

                      <div class="form-group">
                        <label for="exampleTextarea1">Task</label>
                        <textarea class="form-control" id="exampleTextarea1" name="description"rows="4" required>Mention The Task</textarea>
                      </div>
                      <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Start Date</label>
                            <div class="col-sm-9">
                              <input type="date" class="form-control" name="start_date" placeholder="dd/mm/yyyy" />
                            </div>
                     </div>
                     <div class="form-group row">
                            <label class="col-sm-3 col-form-label">End Date</label>
                            <div class="col-sm-9">
                              <input type="date" class="form-control" name="end_date" placeholder="dd/mm/yyyy" />
                            </div>
                     </div>
                      <input type="submit" class="btn btn-gradient-primary me-2" name="create_task" value="Create">
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
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

    <?php
      include('includes/connection.php');
      if(isset($_POST['create_task'])){
        $sql="INSERT INTO tasks VALUES(null,$_POST[id],'$_POST[description]','$_POST[start_date]','$_POST[end_date]','Not Started')";
        $query_run=mysqli_query($conn,$sql);
        if($query_run){
          echo "<script type='text/javascript'>
              alert('Task created Successfully...');
              window.location.href='create_task.php';
          </script>";
        }
        else{
          echo "<script type='text/javascript'>
              alert('Error.. Please Try Again!');
              window.location.href='create_task.php'
          </script>";
        }
      }
    ?>
  
  

  </body>
</html>
<?php
  }
  else{
    header('Location:login.php');
  }
?>