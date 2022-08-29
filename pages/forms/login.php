<?php require_once 'C:/xampp/htdocs/MUNI CLINIC/php/connection.php'; //connecting to db

if (!empty($_POST['username'])) {
  $name=$_POST['username'];
  $password=$_POST['password'];

  $sql = " SELECT * FROM useraccount WHERE `username` = '$name' AND `password` = '$password' ";
  $result = $conn->query($sql) or die(mysqli_error($conn)); 
        }                         
else {
  echo "<p class='text-primary'>ENTER YOUR LOGIN CREDENTIALS</p>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>LOGIN</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/hospital-box.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div align="center" class="brand-logo">
                <img src="../../images/CLINIC LOGO.png" alt="logo">
              </div>
              <!-- <h4>Hello! let's get started</h4> -->

              
              <h3 align="center" class="font-weight-light">Sign In</h3>

              <!-- PHP CODE -->
              <div>
                <?php
                 if ((mysqli_num_rows($result) > 0) && (!empty($name))){
                  
                  header("Location: http://localhost/MUNI%20CLINIC/index.html");
                  }elseif((mysqli_num_rows($result) == 0) || (empty($name))){
                    echo "<p align='center'  class='text-danger text-capitalize'><img src='../../images/alert.png' alt='logo'> ENTER VALID USERNAME OR PASSWORD</p>";
                  }
                ?>
              </div>

              <form  method="post" class="pt-3">
                <div class="form-group">
                  <input type="text" name="username" class="form-control " id="exampleInputEmail1" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control " id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button style="width:100%;" type="submit" name="submit" class="btn btn-block btn-primary  font-weight-medium">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
               
                <div class=" mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Contact Admin</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
</body>

</html>
