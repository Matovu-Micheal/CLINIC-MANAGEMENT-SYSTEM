<?php
    $servername='localhost';
    $username='root';
    $password='';
    //specify the database name - "My_company"
    $databasename = "CLINIC_MGT_SYSTEM_DATABSE";

    // Creating the connection by specifying the connection details
    $conn = mysqli_connect($servername, $username, $password,$databasename);
    if(!$conn){
        die('Could not Connect MySql Server:' .mysql_error());
    }

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
        

        $sql = "INSERT INTO PATIENT (name,age,gender,tel,address,weight)
        VALUES ('$name','$age','$gender','$tel','$address','$weight')";
        if (mysqli_query($conn, $sql)) {
            echo "New record has been added successfully !";
        } else {
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        mysqli_close($conn);
    }
?>