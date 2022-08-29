<?php
include 'C:/xampp/htdocs/MUNI CLINIC/php/connection.php'; //connecting to db');
$id = $_GET['edit'] ?? null;
$info="";

$sql = "SELECT * FROM useraccount WHERE `e_id`='$id'";
$result = mysqli_query($conn,$sql) or die (mysqli_error($sql));
if (!mysqli_num_rows($result) < 1){
  $info="No result found";
}
while ($row=mysqli_fetch_array($result)){
    $user = $row;
}
// var_dump($user);

if(isset($_POST['update']))
 {    
     $e_id = $id;
     $username = $_POST['username'];
     

     if($_POST['new_password1']==$_POST['new_password2']){
       $password = $_POST['new_password1'];
       $update = "UPDATE useraccount SET `password` = '$password' WHERE `e_id` =  '$e_id' ";
      
       $result = mysqli_query($conn, $update) or die (mysqli_error($update));

       if ($result) {
        $info ="<p class='text-success'>A Employee $username account has been updated successfully !</p>";
        
       } else {
           // echo "Error: " . $sql . ":-" . mysqli_error($conn);
           $info = ""; "<p class='text-danger'>An error has occured !</p>";
           
       }
     }else{
       echo "<p class='text-danger'>Umatching passwords!</p>";
     }
     
     
   }else{
     echo "<p class='text-danger'>Fill the form to change user's credentials</p>";
   }




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>EDIT USERACCOUNT</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../IMAGES/muni clinic.svg" />

  <style>body{
        font-family:raleway,'Roboto', sans-serif;
     
    }</style>
    
    
  
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
        
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-4 w-100">
          <li class="nav-item nav-search d-none d-lg-block w-100">
            <div class="php mt-3 h1 text-uppercase">
            <?php require_once 'C:/xampp/htdocs/MUNI CLINIC/php/connection.php'; //connecting to db

                //include_once 'db.php';
                if(isset($_POST['submit']))
                {    
                    $name = $_POST['name'];
                    $age = $_POST['age'];
                    $gender = $_POST['gender'];
                    $tel = $_POST['contact'];
                    $address = $_POST['address'];
                    $weight = $_POST['weight'];
                    // $next_of_kin= $_POST['next_of_kin'];
                    
                    $UUID= uniqid ('P',true); // unique id generating function
                    $sql = "INSERT INTO PATIENT (name,age,gender,tel,address,weight,p_uid)
                    VALUES ('$name','$age','$gender','$tel','$address','$weight','$UUID')";

                    if (mysqli_query($conn, $sql)) {
                      echo "<p class='text-success'>A patient $name has been added successfully !</p>";
                    } else {
                        // echo "Error: " . $sql . ":-" . mysqli_error($conn);
                        echo "<p class='text-danger'>An error has occured !</p>";
                    }
                    mysqli_close($conn);
                }
            ?>
          
          </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
            <img src="../../images/icons8-user-60.png">
              <span class="nav-profile-name">user</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav style="font-family:raleway,'Roboto', sans-serif; font: weight 500px;" class="sidebar  sidebar-offcanvas" id="sidebar">
        <ul class="nav">

          <li class="nav-item">
           
            <a class="nav-link" href="../../index.html">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <!-- PATIENT -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <img class="icons" src="../../images/icons8-patient-32.png">
              <span class="menu-title">PATIENT</span>
              <i class="menu-arrow  "></i>
            </a>
            <div class="collapse" id="">
              <ul class="nav flex-column sub-menu" style="list-style:none;">
                <li class="nav-item"><a class="nav-link" href="add_patient.php">ADD PATIENT</a></li>
                <li class="nav-item"> <a class="nav-link" href="search_patient.php">CHECK PATIENT</a></li>
                <li class="nav-item"> <a class="nav-link" href="medical_records.php">MEDICAL RECORD</a></li>
              </ul>
            </div>
          </li>

          <!-- EMPLOYEE -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <!-- <i class="mdi mdi-account-multiple-outline menu-icon"></i> -->
              <img src="../../images/icons8-name-tag-32.png">
              <span class="menu-title">EMPLOYEES</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="">
              <ul class="nav flex-column sub-menu list-unstyled">
               <li  class="nav-item list-unstyled "><div class="d-flex"><a class="nav-link" href="add_employee.php">ADD EMPLOYEE</a></div</li>
                <li class="nav-item"> <a class="nav-link" href="search_employee.php">CHECK EMPLOYEE</a></li>
              </ul>
            </div>
          </li>

          <!-- APPOINTMENTS -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <img src="../../images/icons8-appointment-32.png">
              <span class="menu-title">APPOINTMENTS</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="appointments.php">CREATE APPOINTMENT</a></li>
                <li class="nav-item"> <a class="nav-link" href="#">CHECK APPOINTMENT LIST</a></li>
              </ul>
            </div>
          </li>

          <!-- USERS -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <img src="../../images/icons8-member-skin-type-7-32.png">
              <span class="menu-title">USERS</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="user_accounts.php">CREATE USER ACCOUNT</a></li>
                <li class="nav-item"> <a class="nav-link" href="account_edit.php">EDIT USER ACCOUNT</a></li>
              </ul>
            </div>
          </li>


          <!-- DOCTOR -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <img class="icons" src="../../images/hospital-box.png">
              <span class="menu-title">DOCTOR/NURSE</span>
              <i class="menu-arrow  "></i>
            </a>
            <div class="collapse" id="">
              <ul class="nav flex-column sub-menu" style="list-style:none;">
                <li class="nav-item"><a class="nav-link" href="diagnosis.php">DIAGNOSIS</a></li>
                <li class="nav-item"> <a class="nav-link" href="prescription.php">PRESCRIPTION</a></li>
              </ul>
            </div>
          </li>

          <!-- LAB -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <img class="icons" src="../../images/icons8-lab-32.png">
              <span class="menu-title">LABARATORY</span>
              <i class="menu-arrow  "></i>
            </a>
            <div class="collapse" id="">
              <ul class="nav flex-column sub-menu" style="list-style:none;">
                <li class="nav-item"><a class="nav-link" href="labresullts.php">LAB RESULTS</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="#">#</a></li> -->
              </ul>
            </div>
          </li>
         

          <!-- NEXT OF KIN -->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <img class="icons" src="../../images/icons8-joining-queue-32.png">
              <span class="menu-title">NEXT OF KIN</span>
              <i class="menu-arrow  "></i>
            </a>
            <div class="collapse" id="">
              <ul class="nav flex-column sub-menu" style="list-style:none;">
                <li class="nav-item"><a class="nav-link" href="pages/forms/next_of_kin.php">EMPLOYEE NEXT OF KIN </a></li>
                <li class="nav-item"><a class="nav-link" href="pages/forms/patient_next_of_kin.php">PATIENT NEXT OF KIN </a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/forms/next_of_kin_record.php">NEXT OF KIN RECORDS</a></li>
              

              </ul>
            </div>
          </li>
         
        </ul>
      </nav>

      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
        
        <div style="width:60em;" class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="p-2 align-items-end flex-wrap">
                                      
                     <div class="logo"><img style="width:6em;"  src="../../images/muni clinic.svg" alt="logo"></div>

                  <div class="d-flex mt-4">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Clinic Dashboard&nbsp;</p>
                    
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                  
                  <a href='account_edit.php' class="btn btn-primary mt-2 mt-xl-0">USERACCOUNTS</a>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
          
            
            <!-- MY FORM -->
            <div style="width:90%;" class="col-12 grid-margin stretch-card">
              <div class="card">
                <div  class="card-body">
                  <h4 class="ms-5">EDIT USERACCOUNT</h4>
                  
                  <div class="m-5 d-flex">
                  <div class="col col-sm-2"> 
                  <img style='width: 180px; border-radius: 10px;' class='rounded img-fluid' src='../../profiles/default2.png'>
                  <?php 
                    // if (empty($user['picture'])){
                    //   echo "<img style='width: 180px; border-radius: 10px;' class='rounded img-fluid' src='../../profiles/default2.png'>";
                    // }else{
                    //   echo "<img class='rounded-0 img-fluid img-thumbnail' src='../../profiles/".$user['picture']."'>";
                    // }
                  
                    ?>

                    
                    
                  </div>
                  <div class="col col-sm   ms-2 mb-3">
                  <form  method="POST"  >
                  <p class="card-description">
                    Change users account credentials.
                  </p>
            <div class="form-group mb-3">
                <input type="hidden" name="id" value="<?= $user['e_id'] ?>">
                <label for="name" class="form-label">Username</label>
                <input type="text" class="form-control"  id="name" name="username" value="<?= $user['username']  ?>" required>
            </div>
            <div class="form-group mb-3">
                <label for="gender" class="form-label">Old Password</label>
                <input type="int" class="form-control" disabled name="old_password" value="<?= $user['password']  ?>">
            </div>

            <div class="form-group mb-3">
                <label for="gender" class="form-label"> New Password</label>
                <input type="password" class="form-control" name="new_password1" >
            </div>

            <div class="form-group mb-3">
                <label for="gender" class="form-label"> Confirm Password</label>
                <input type="password" class="form-control" name="new_password2">
            </div>

            <input type="submit" class="btn btn-success" name="update" value="Update">
        </form>
        <p class=""><?php echo  empty($info) ? '' : $info;  ?></p>
        </div>
        </div>


                </div>
              </div>
            </div>
            

            <!-- MY FORM ENDS HERE -->
            
            
           
            
            
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href="#" target="_blank">MUNI UNIVERSITY </a>2022</span>
    
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
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
