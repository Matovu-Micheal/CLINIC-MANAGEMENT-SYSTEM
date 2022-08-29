<?php require_once 'C:/xampp/htdocs/MUNI CLINIC/php/connection.php'; //connecting to db
$id = $_GET['record'] ?? null;

$sql="SELECT 
-- DIAGNOSIS TABLE
-- diagnosis.*,
diagnosis.Symptoms,
diagnosis.Doctors_deduction,
diagnosis.date,
diagnosis.id,
diagnosis.Tests,

-- LAB RESULTS TABLE
-- l.*,
l.results,
l.tests,
l.samples_taken,

-- PRESCRIPTION TABLE
-- pre.*,
pre.drugs,
pre.dosage,

-- PATIENT TABLE
-- p.*,
p.p_uid,
p.name,
p.age,
p.gender,
p.weight,
p.address,
P.tel,

-- APPOITMENT TABLE
appointments.Appointment_date,
appointments.healthworker,
appointments.Note
FROM
diagnosis
LEFT JOIN
lab_results l ON l.p_uid = diagnosis.p_uid
LEFT JOIN
prescription pre ON pre.p_uid = diagnosis.p_uid
LEFT JOIN 
patient p ON  p.p_uid  = diagnosis.p_uid
LEFT JOIN
appointments ON appointments.p_uid = diagnosis.p_uid
WHERE p.p_uid='$id'
";

$result = mysqli_query($conn,$sql) or die(mysqli_error($sql));


if (mysqli_num_rows($result) < 1){
  echo 'No result';
  exit;
}
while ($row=mysqli_fetch_array($result)){
    $record = $row;
}

mysqli_close($conn);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>MEDICAL RECORD</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <!-- JS CODE FOR DOWNLODING HTML CONTENT AS PDF -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <link rel="shortcut icon" href="../../IMAGES/muni clinic.svg" />

  <style>
    
    body{
        font-family:raleway,'Roboto', sans-serif;
    }
  </style>
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
        
        <!-- DOWNLOAD BUTTON -->
        <div style="width:90%;" class="row">
            <div class="col-md-12 grid-margin">
                <div align=right class="">
                  <button id='download' class="btn btn-primary mt-2 mt-xl-0">DOWNLOAD PDF</button>
                </div> 
             
            </div>
          </div>

          <div class="row">
            
            <!-- MY FORM -->
            <div style="width:88.5%;" class="col-12 grid-margin stretch-card">
              <div class="card">
               
                

                <div  class="card-body mb-4">
                
                  <div class='record ms-4 mt-4' id='record'>
            
                    <div  class='mt-2  justify-content-center mt-3'>
                    <img  style='width:5em;' class='' src="../../IMAGES/muni clinic.png" />
                      <div  class='mt-5'>

                      <h5 align='center'>CLINIC MEDICAL FORM</h5>
                      <h4 align='center'>MUNI UNIVERSITY CLINIC</h4>
                      <div class='mt-4'>
                      <div class='col mb-3 '>
                        <p><b>Date of issue:</b> <?php echo $record['date'] ?></p>
                        </div>
                      <h6 class='text-primary mb-3'>PATIENT'S DETAILS</h6>
                      
                      <div class='d-flex mt-2'>
                        <div class='col'>
                        <p><b>Name:</b> </p><p class=''> <?php echo $record['name'] ?></p>
                        </div>
                        <div class='col'>
                        <p><b>Date of Birth:</b> </p>
                        </div>

                        
                      </div>
                      <div class='d-flex mt-2''>
                        <div class='col d-flex'>
                        <p><b>Age:</b> <?php echo $record['age'] ?></p>
                        </div>
                        <div class='col'>
                        <p><b>Sex:</b> <?php echo $record['gender'] ?></p>
                        </div>
                        <div class='col'>
                        <p><b>Weight: </b>  <?php echo $record['weight'] ?>kg</p>
                        </div>

                      </div>

                      <div class='mt-2'>
                        <div class='col'>
                        <p><b>Address:</b> <?php echo $record['address'] ?></p>
                        </div>
                        <div class='col mt-2''>
                        <p><b>Contact:</b> <?php echo $record['tel'] ?></p>
                        </div>
                        </div>
                      </div>

                      <div class='foot'>
                      
                      </div>

                      <div class='d-flex'>
                      <div class='col'>
                      <h6 class='text-primary mt-4'>PATIENT'S DIAGNOSIS</h6>
                      <div>
                        <p class='mt-2'><b>Symptoms:</b><br> <?php echo $record['Symptoms'] ?></p>
                        <p class='mt-2'><b>Tests:</b><br> <?php echo $record['Tests'] ?></p>
                        <p class='mt-2'><b>Confirmed sickness:</b><br><?php echo $record['Doctors_deduction'] ?></p>
                      </div>
                      </div>

                      <div class='col'>
                      <h6 class='text-primary mt-4'>LABARATORY RESULTS </h6>
                        <div class='col'>
                          <p><b>Samples Taken:</b></p><p class=''><?php echo $record['samples_taken'] ?></p>
                        </div>
                        <div class='col mt-2''>
                          <p><b>Tests Conducted:</b></p><p class=''><?php echo $record['tests'] ?></p>
                        </div>
                        <div class='col mt-2''>
                          <p><b>Results from the Tests Conducted:</b></p><p class=''><?php echo $record['results'] ?></p>
                        </div>
                        </div>
                        </div>

                          </div>
                        </div>

                        <div class='d-flex'>
                        <div class='col'>
                        <h6 class='text-primary mt-4'>PRESCRIPTION </h6>
                        <div class='col'>
                          <p><b>Prescribed Drugs:</b></p><p class=''></p>
                        </div>
                        <div class='col mt-2''>
                          <p><b>Prescribed Dosage:</b></p><p class=''><?php echo $record['dosage'] ?></p>
                        </div>
                        </div>
                        <div class='col'>
                        <h6 class='text-primary mt-4'>PATIENT'S APPOINTMENT</h6>
                        <div class='col'>
                          <p><b>Appoitmnet Date:</b></p><p class=''><?php echo isset($record['Apointment_date']) ? $record['Apointment_date'] : "NO information"; ?></p>
                        </div>
                        <div class='col mt-2''>
                          <p><b>Doctor/Nurse:</b></p><p class=''><?php echo isset($record['healthworker']) ? $record['healthworker'] : "NO information"; ?></p>
                          
                        </div>
                        <div class='col mt-2''>
                          <p><b>Note/Reason:</b></p><p class=''><?php echo isset($record['Note']) ? $record['Note'] : "NO information"; ?></p>
                          
                        </div>
                        </div>
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

  <script type="text/javascript">
    window.onload=function(){
      document.getElementById("download")
      .addEventListener("click",()=>{
        const record = this.document.getElementById("record");
        console.log(record);
        var opt = {
            margin:       0.5,
            filename:     'patient record.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
          };
        html2pdf().from(record).set(opt).save();
      })

    }
  
  </script>
  
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  
 

</html>
