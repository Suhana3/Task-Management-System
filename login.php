<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login page</title>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
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
    <style>
        /* Style for the modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
        }
        .modal-content {
            background-color: #fff;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 60%;
        }
        /* Style for the close button */
        .close {
            color: #888;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
    </style>


</head>
<div class="col-lg-12">
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <!-- partial -->
      <div class="content-wrapper bg-gradient-danger">
  
    <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh; padding-bottom: 75px;">
    
      <div class="card bg-gradient-danger card-img-holder text-white" style="width: 450px; height: 400px;">
      
        <div class="card-body" style="display: flex; align-items: center;">
         
        <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 50vh; width: 50vw; padding: 20px;">
  <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 20px;">
    <button type="button" class="btn btn-gradient-danger btn-fw" onclick="openModal('login_home_page')" style="width: 100px; height: 60px;">Admin Login</button>
    <button type="button" class="btn btn-gradient-success btn-fw" onclick="openModal('register_home_page')" style="width: 100px; height: 60px;">Sign Up</button>
    <button type="button" class="btn btn-gradient-info btn-fw" onclick="openModal('user_login')" style="width: 100px; height: 60px;">User Login</button>
  </div>
  <div style="display: flex; align-items: center;">
  <button type="button" class="btn btn-social-icon-text btn-linkedin"><i class="mdi mdi-linkedin"></i>Linkedin</button>
                      <button type="button" class="btn btn-social-icon-text btn-google"><i class="mdi mdi-google-plus"></i>Google</button>
  </div>
</div>

      <div id="login_home_page" class="modal">
        <div class="modal-content">
          <form action="login.php" method="post">
        
            <span class="close" onclick="closeModal('login_home_page')">&times;</span>
            <div class="form-group">
             <input type="email" class="form-control form-control-md" placeholder="Enter E-Mail" name="email" required autocomplete="off">
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-md" placeholder="Enter Password" name="password" required autocomplete="off">
            </div>
              <input type="submit" name="adminLogin" value="Login" class="btn btn-block btn-gradient-success btn-md font-weight-medium auth-form-btn">
            
              <a href="login.php" button type="button" class="btn btn-block btn-gradient-danger btn-lg font-weight-medium auth-form-btn">   Cancel</button></a>  
          </form>
        </div>
      </div>




      <div id="register_home_page" class="modal">
        <div class="modal-content">
        <form action="login.php" method="post">
          <span class="close" onclick="closeModal('register_home_page')">&times;</span>
          <div class="form-group">
              <input type="text" class="form-control form-control-md" id="exampleInputUsername1" name="name" placeholder="Username" required autocomplete="off">
          </div>
          
          <div class="form-group">
              <input type="email" class="form-control form-control-md" id="exampleInputEmail1" name="email" placeholder="Email" required autocomplete="off">
          </div>
          <div class="form-group">
              <input type="password" class="form-control form-control-md" id="exampleInputPassword1" name="password" placeholder="Password" required autocomplete="off">
          </div>
          <div class="form-group">
              <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="mobile" placeholder="Mobile Number" required autocomplete="off">
          </div>
          <input type="submit" name="userRegistration" value="Sign-up" class="btn btn-block btn-gradient-success btn-md font-weight-medium auth-form-btn">
                
          <a href="login.php" button type="button" class="btn btn-block btn-gradient-danger btn-md font-weight-medium auth-form-btn">Cancel</button></a>
      </form>

        </div>
      </div>
             
      <div id="user_login" class="modal">
        <div class="modal-content">
          <form action="login.php" method="post">
            <span class="close" onclick="closeModal('user_login')">&times;</span>
            <div class="form-group">
              <input type="email" class="form-control form-control-md" id="exampleInputEmail1" name="email" placeholder="Email"  required autocomplete="off">
            </div>
            <div class="form-group">
              <input type="password" class="form-control form-control-md" id="exampleInputPassword1" name="password" placeholder="Password"  required autocomplete="off">
            </div>
            <input type="submit" class="btn btn-block btn-gradient-success btn-md font-weight-medium auth-form-btn" name="userLogin" value="Login">
            <button type="button" class="btn btn-block btn-gradient-danger btn-md font-weight-medium auth-form-btn">Cancel</button>
          </form>
        </div>
      </div>
         
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
</div>
</div>








<script>
    var currentModal; // Global variable to track the currently open modal

    // Function to open a specific modal
    function openModal(modalId) {
        // Close the currently open modal if any
        if (currentModal) {
            document.getElementById(currentModal).style.display = 'none';
        }
        // Open the requested modal
        var modal = document.getElementById(modalId);
        modal.style.display = 'block';
        currentModal = modalId; // Update the currentModal variable
    }

    // Function to close the currently open modal
    function closeModal(modalId) {
        var modal = document.getElementById(modalId);
        modal.style.display = 'none';
        currentModal = null; // Reset the currentModal variable
    }
</script>






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
    
    <!-- register -->
    <?php
      include('includes/connection.php');
      if(isset($_POST['userRegistration'])){
        $sql="INSERT INTO users VALUES(null,'$_POST[name]','$_POST[email]','$_POST[password]',$_POST[mobile])";
        $query_run=mysqli_query($conn,$sql);
        if($query_run){
            echo "<script type='text/javascript'>
                alert('User registered Successfully...');
                window.location.href='login.php';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>
                alert('Error.. Please Try Again!');
                window.location.href='login.php'
            </script>";
        }
      }
    ?>
    
    <!-- admin login code -->
    <?php
      include('includes/connection.php');
      if(isset($_POST['adminLogin'])){
        $sql="SELECT * from admins WHERE email = '$_POST[email]' AND password ='$_POST[password]'";
        $query_run=mysqli_query($conn,$sql);
        if(mysqli_num_rows($query_run)){
          while($row=mysqli_fetch_assoc($query_run)){
            $_SESSION['email']=$row['email'];
            $_SESSION['name']=$row['name'];
            $_SESSION['id']=$row['id'];
          }   
          echo "<script type='text/javascript'>
                window.location.href='admin_index.php';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>
                alert('Invalid Email or Password');
                window.location.href='login.php';
            </script>";
        }
      }
    ?>
    <!-- user login code php -->
    <?php
      
      include('includes/connection.php');
      if(isset($_POST['userLogin'])){
        $sql="SELECT * from users WHERE email = '$_POST[email]' AND password ='$_POST[password]'";
        $query_run=mysqli_query($conn,$sql);
        if(mysqli_num_rows($query_run)){
          while($row=mysqli_fetch_assoc($query_run)){
            $_SESSION['email']=$row['email'];
            $_SESSION['name']=$row['name'];
            $_SESSION['uid']=$row['uid'];
            
          } 
          echo "<script type='text/javascript'>
                window.location.href='user_index.php';
            </script>";
        }
        else{
            echo "<script type='text/javascript'>
                alert('Invalid Email or Password');
                window.location.href='login.php';
            </script>";
        }
      }
    ?>
</body>
</html>