<?php
//specify the server name and here it is localhost
$server_name = "localhost";

//specify the username - here it is root
$user_name = "root";

//specify the password - it is empty
$password = "";

//specify the database name - "My_company"
$database_name = "CLINIC_MGT_SYSTEM_DATABSE";

// Creating the connection by specifying the connection details
$conn = mysqli_connect($server_name, $user_name, $password,$database_name);



$table1 = "CREATE TABLE IF NOT EXISTS `NEXT OF KIN` (
  id INT(6) UNSIGNED AUTO_INCREMENT,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  age INT(4) NOT NULL,
  contact INT(15),
  gender VARCHAR(30) NOT NULL,
  address VARCHAR(30) NOT NULL,
  relationship VARCHAR(30) NOT NULL,
  PRIMARY KEY (id)

  )";
  
  if ($conn->query($table1) === TRUE) {
    echo "Table Next of kin created successfully";
  } else {
    echo "Error creating table: " . $conn->error;
  }

 $table2="CREATE TABLE IF NOT EXISTS `PATIENT`(
  id INT(6) UNSIGNED AUTO_INCREMENT,
  name VARCHAR(30) NOT NULL,
  age INT(4) NOT NULL,
  gender VARCHAR(30) NOT NULL,
  tel INT(15),
  address VARCHAR(30) NOT NULL,
  weight int(5),
  PRIMARY KEY (id),
  FOREIGN KEY (id) REFERENCES `NEXT OF KIN` (id)
  
  )";

if ($conn->query($table2) === TRUE) {
  echo "Table patient created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$table3="CREATE TABLE IF NOT EXISTS `PRESCRIPTION`(
  id INT(6) UNSIGNED AUTO_INCREMENT,
  date date,
  drugs VARCHAR(255) NOT NULL,
  dosage VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id) REFERENCES PATIENT (id)
  )";

if ($conn->query($table3) === TRUE) {
  echo "Table prescription created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$table4="CREATE TABLE IF NOT EXISTS `medical_record`(
  id INT(6) UNSIGNED AUTO_INCREMENT,
  date date,
  diagnosis VARCHAR(255) NOT NULL,
  labresults VARCHAR(255) NOT NULL,
  recommendation VARCHAR(255) NOT NULL, 
  PRIMARY KEY (id),
  FOREIGN KEY (id) REFERENCES PATIENT (id),
  FOREIGN KEY (id) REFERENCES PRESCRIPTION (id)
  )";

if ($conn->query($table4) === TRUE) {
  echo "Table Medical record created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$table5="CREATE TABLE IF NOT EXISTS `ROLES`(
  id INT(6) UNSIGNED AUTO_INCREMENT,
  role VARCHAR(255) NOT NULL,  
  PRIMARY KEY (id)
  )";

if ($conn->query($table5) === TRUE) {
  echo "Table roles created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$table6="CREATE TABLE IF NOT EXISTS `EMPLOYEE`(
  id INT(6) UNSIGNED AUTO_INCREMENT,
  name VARCHAR(255) NOT NULL,
  age INT(4) NOT NULL,
  gender VARCHAR(255) NOT NULL,
  contact INT(15),
  FOREIGN KEY (id) REFERENCES `NEXT OF KIN` (id),
  FOREIGN KEY (id) REFERENCES ROLES (id),
  PRIMARY KEY (id)
  )";

if ($conn->query($table6) === TRUE) {
  echo "Table employee created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$table7="CREATE TABLE IF NOT EXISTS `PHARMARCY`(
  id INT(6) UNSIGNED AUTO_INCREMENT,
  date date,
  drug VARCHAR(255) NOT NULL,
  quantity INT(20),
  purchase_date date,
  expiry_date date,
  PRIMARY KEY (id)
  )";

if ($conn->query($table7) === TRUE) {
  echo "Table pharmarcy created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$table8="CREATE TABLE IF NOT EXISTS `USERACCOUNT`(
  id INT(6) UNSIGNED AUTO_INCREMENT,
  username VARCHAR(255) NOT NULL,
  password1 VARCHAR(255) NOT NULL,
  password2 VARCHAR(255) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (id) REFERENCES EMPLOYEE (id)
  )";

if ($conn->query($table8) === TRUE) {
  echo "Table useraccount created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

//close the connection
mysqli_close($conn);
?>



