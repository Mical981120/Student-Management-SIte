<?php


$db = mysqli_connect('localhost', 'root', '', 'abcinstitute');


$sql = "SELECT * FROM users";
$sql = "SELECT * FROM stdetails";
$result = mysqli_query($db, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// initializing variables
$login = "";
$role = "";
$name = "";
$errors = array(); 



// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'abcinstitute');
$conn = mysqli_connect('localhost', 'root', '', 'abcinstitute');
// REGISTER USER
if (isset($_POST['createbtn'])) {
  // receive all input values from the form
  $login = mysqli_real_escape_string($db, $_POST['login']);
  $role = mysqli_real_escape_string($db, $_POST['role']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $conpassword = mysqli_real_escape_string($db, $_POST['conpassword']);
  $lname = mysqli_real_escape_string($db, $_POST['lname']);
  $Address = mysqli_real_escape_string($db, $_POST['Address']);
  $Mobile = mysqli_real_escape_string($db, $_POST['Mobile']);
  $Email = mysqli_real_escape_string($db, $_POST['Email']);
  $nic = mysqli_real_escape_string($db, $_POST['nic']);
  

  $filename = $_FILES['myfile']['name'];
  $destination = 'uploads/' . $filename;// name of the uploaded file
  $extension = pathinfo($filename, PATHINFO_EXTENSION);

   // destination of the file on the server
   $file = $_FILES['myfile']['tmp_name'];
   $size = $_FILES['myfile']['size'];
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($login)) { array_push($errors, "Username is required"); }
  
  if (empty($password)) { array_push($errors, "Password is required"); }
  if ($password != $conpassword) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  

  // Finally, register user if there are no errors in the form
  

  if (!in_array($extension, ['zip', 'pdf', 'docx','jpg','png','jpeg',])) {
    echo "You file extension must be .zip, .pdf or .docx";
  } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
    echo "File too large!";
  } else {
    // move the uploaded (temporary) file to the specified destination
    if (move_uploaded_file($file, $destination)) {
      $sql = "INSERT INTO users (login, name,  password, role, Fname,  Address, Mobile, Email, NIC, Pname, size)
       VALUES ('$login', '$name', '$password', '$role', '$lname', '$Address', '$Mobile', '$Email', '$nic', '$filename', $size)";
      if (mysqli_query($conn, $sql)) {
        echo "File uploaded successfully";
      }
    } else {
      echo "Failed to upload file.";
    }
  }
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

// ... 





include("connection.php");

$db= $con;
$tableName="developers";
$columns= ['id', 'fullName','gender','email','mobile', 'address','city','state'];
$fetchData = fetch_data($db, $tableName, $columns);

function fetch_data($db, $tableName, $columns){
 if(empty($db)){
  $msg= "Database connection error";
 }elseif (empty($columns) || !is_array($columns)) {
  $msg="columns Name must be defined in an indexed array";
 }elseif(empty($tableName)){
   $msg= "Table Name is empty";
}else{

$columnName = implode(", ", $columns);
$query = "SELECT ".$columnName." FROM $tableName"." ORDER BY id DESC";
$result = $db->query($query);

if($result== true){ 
 if ($result->num_rows > 0) {
    $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
    $msg= $row;
 } else {
    $msg= "No Data Found"; 
 }
}else{
  $msg= mysqli_error($db);
}
}
return $msg;
}



// initializing variables
$login = "";
$Fname = "";
$Address = "";
$Mobile = "";
$Email = "";
$Bday = "";
$Course = "";
$fileName = "";

$errors = array(); 

$statusMsg = '';
// File upload path


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'abcinstitute');
$conn = mysqli_connect('localhost', 'root', '', 'abcinstitute');

// REGISTER USER
if (isset($_POST['addst'])) {
  // receive all input values from the form
  $login = mysqli_real_escape_string($db, $_POST['login']);
  $Fname = mysqli_real_escape_string($db, $_POST['Fname']);
  $Batch = mysqli_real_escape_string($db, $_POST['Batch']);
  $Cindex = mysqli_real_escape_string($db, $_POST['Cindex']);
  $Ptime = mysqli_real_escape_string($db, $_POST['Ptime']);
  $Jday = date('Y-m-d' , strtotime($_POST['Jday']));
  $Course = mysqli_real_escape_string($db, $_POST['Course']);
  $Branch = mysqli_real_escape_string($db, $_POST['Branch']);
  
  $filename = $_FILES['myfile']['name'];
  $destination = 'uploads/' . $filename;// name of the uploaded file
  $extension = pathinfo($filename, PATHINFO_EXTENSION);

   // destination of the file on the server
   $file = $_FILES['myfile']['tmp_name'];
   $size = $_FILES['myfile']['size'];

   // get the file extension
   
   

   // the physical file on a temporary uploads directory on the server
   

   if (!in_array($extension, ['zip', 'pdf', 'docx','jpg','png','jpeg',])) {
	echo "You file extension must be .zip, .pdf or .docx";
} elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
	echo "File too large!";
} else {
	// move the uploaded (temporary) file to the specified destination
	if (move_uploaded_file($file, $destination)) {
    $sql = "INSERT INTO stdetails (login, Fname,  BatchN, CourseI, Pdtime, Jday, Course, Branch, name, size)
    VALUES ('$login', '$Fname', '$Batch', '$Cindex', '$Ptime', '$Jday', '$Course', '$Branch','$filename', $size)";
		if (mysqli_query($conn, $sql)) {
			header("Location: MSstdetails.php");
		}
	} else {
		echo "Failed to upload file.";
	}
}
}

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  
  
  error_reporting(0);
  $conn = mysqli_connect("localhost","root","","abcinstitute");
  if(isset($_POST['save'])) {
  $login=$_POST['login'];
  $result = mysqli_query($conn,"SELECT * FROM stdetails where login='$login' ");
  }

  // Finally, register user if there are no errors in the form
 
?>

