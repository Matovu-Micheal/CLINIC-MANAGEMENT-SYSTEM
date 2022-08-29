<?php
include 'C:/xampp/htdocs/MUNI CLINIC/php/connection.php'; //connecting to db');
$id = (int) $_GET['select'] ?? null;

$sql = "SELECT * FROM patient WHERE `p_uid`=$id";

$result = mysqli_query($conn,$sql) or die (mysqli_error($sql));

if (!mysqli_num_rows($result) < 1){
  
}
while ($row=mysqli_fetch_array($result)){
    $user = $row;
}


// var_dump($user);

$sql2 = "SELECT * FROM next_of_kin WHERE `nk_id`=$id";
  
$result2 = mysqli_query($conn,$sql2) or die (mysqli_error($sql2));

if (!mysqli_num_rows($result2) < 1){
  
}
while ($row=mysqli_fetch_array($result2)){
    $kin = $row;
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PATIENT INFORMATION</title>
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
        
        <div  class="row">
            <div style="width:90%;" class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between flex-wrap">
                <div class="p-2 align-items-end flex-wrap">
                                      
                     <div class="logo"><img style="width:6em;"  src="../../images/muni clinic.svg" alt="logo"></div>

                  <div class="d-flex mt-4">
                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Clinic Dashboard&nbsp;</p>
                    
                  </div>
                </div>
                <div class="d-flex justify-content-between align-items-end flex-wrap">
                  
                  <a href='add_patient.php' class="btn btn-primary mt-2 mt-xl-0">ADD PATIENT</a>
                </div>
              </div>
            </div>
          </div>

          <div class="row"> 

          
            
            <div style="width:90%;" class="col-12 grid-margin stretch-card">
              <div class="card ">
                
                <div  class="card-body">
                  <div class="card-title ms-5"><h4>PATIENT INFORMATION</h4></div>
                  <div class="m-5 d-flex">
                  <div class="image col col-sm-2"> 
                  <img style='width: 180px; border-radius: 10px;' class='rounded img-fluid' src='../../profiles/default2.png'>"
                  <?php 
                    // if (empty($user['picture'])){
                    //   echo "<img style='width: 180px; border-radius: 10px;' class='rounded img-fluid' src='../../profiles/default2.png'>";
                    // }else{
                    //   echo "<img class='rounded-0 img-fluid img-thumbnail' src='../../profiles/".$user['picture']."'>";
                    // }
                  
                    ?>

                    
                    
                  </div>
                  
                  <div class='col ms-4'>
                    <h5 class='text-success'>PERSONAL DETAILS</h5>
                    <ul style="font-size:1rem;" class="list-style-none list-unstyled">
                      <li><span >ID:</span><span class="text-primary ms-2"><?php echo $user['p_uid']; ?></span></li>
                      <li><span>Name:</span><span class="text-primary ms-2"><?php echo $user['name']; ?></span></li>
                      <li><span>Age:</span><span class="text-primary ms-2"><?php echo $user['age']; ?></span></li>
                      <li><span>Gender:</span><span class="text-primary ms-2 "><?php echo $user['gender']; ?></span></li>
                      <span>Contact:</span><span class="text-primary ms-2"><?php echo $user['tel']; ?></span></li>
                      <li><span>Weight:</span><span class="text-primary ms-2"><?php echo $user['weight']; ?></span></li>
                    </ul>
                    <h5 class='btn btn-primary'>NEXT OF KIN</h5>
                    <ul style="font-size:1rem;" class="list-style-none list-unstyled">
                      <li><span >Name:</span><span class="text-primary ms-2"><?php echo isset($kin['fname'],$kin['lname']) ? $kin['fname'].$kin['lname'] : ""; ?></span></li>
                      <li><span>Age:</span><span class="text-primary ms-2"><?php echo $kin['age']; ?></span></li>
                      <li><span>Gender:</span><span class="text-primary ms-2 "><?php echo $kin['gender']; ?></span></li>
                      <span>Contact:</span><span class="text-primary ms-2"><?php echo $kin['contact']; ?></span></li>
                      <li><span>Address:</span><span class="text-primary ms-2"><?php echo $kin['address']; ?></span></li>
                      <li><span>Relationship:</span><span class="text-primary ms-2"><?php echo $kin['relationship']; ?></span></li>
                    </ul>
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
