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
  $Address = mysqli_real_escape_string($db, $_POST['Address']);
  $Mobile = mysqli_real_escape_string($db, $_POST['Mobile']);
  $Email = mysqli_real_escape_string($db, $_POST['Email']);
  $Bday = date('Y-m-d' , strtotime($_POST['Bday']));
  $Course = mysqli_real_escape_string($db, $_POST['Course']);
  
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
		$sql = "INSERT INTO stdetails (login, Fname,  Address, Mobile, Email, Bday, Course, name, size)
		 VALUES ('$login', '$Fname', '$Address', '$Mobile', '$Email', '$Bday', '$Course','$filename', $size)";
		if (mysqli_query($conn, $sql)) {
			echo "File uploaded successfully";
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
 
  if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM pcass WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));
        readfile('uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }

}

if (isset($_POST['addsubmit'])) {
  // receive all input values from the form
  $login = mysqli_real_escape_string($db, $_POST['login']);
  $subid = mysqli_real_escape_string($db, $_POST['subid']);
  $Batch = mysqli_real_escape_string($db, $_POST['Batch']);
  $Cindex = mysqli_real_escape_string($db, $_POST['Cindex']);
  $Semester = mysqli_real_escape_string($db, $_POST['Semester']);
  
  $Sday = date('Y-m-d' , strtotime($_POST['Sday']));
  $Subject = mysqli_real_escape_string($db, $_POST['Subject']);
  

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
    $sql = "INSERT INTO stassignment (login, SubjecID, BatchN, CourseI, Sday, Semester, Subject, name, size)
     VALUES ('$login','$subid', '$Batch', '$Cindex',  '$Sday', '$Semester', '$Subject','$filename', $size)";
    if (mysqli_query($conn, $sql)) {
      echo "File uploaded successfully";
      header("Location: STviewas.php");
    }
  } else {
    echo "Failed to upload file.";
  }
}
}



if (isset($_POST['payR'])) {
  // receive all input values from the form
  $Mid = mysqli_real_escape_string($db, $_POST['Mid']);
  $Amount = mysqli_real_escape_string($db, $_POST['Amount']);
  $Month = mysqli_real_escape_string($db, $_POST['Month']);
  $Pday = date('Y-m-d' , strtotime($_POST['Pday']));
  $login = mysqli_real_escape_string($db, $_POST['login']);
  $Status = mysqli_real_escape_string($db, $_POST['Status']);
  $Method = mysqli_real_escape_string($db, $_POST['Method']);

  if(empty($Mid) || empty($login) || empty($Month)) {	
    if(empty($_POST['Mid'])) {
       $error['Mid'] = '<font color="red">Username field is empty.</font><br>';
        exit();
    }
    if(empty($login)) {
    echo '<font color="red">Age field is empty.</font><br>';
    }
    if(empty($Month)) {
    echo '<font color="red">Email field is empty.</font><br>';
    }		
    } else {
      $sql = "INSERT INTO paymentrecords (MID, Amount, PaymentDate, Month, Pmethod, Status, login)
       VALUES ('$Mid','$Amount', '$Pday',  '$Month',  '$Method',  '$Status',  '$login')";
      if (mysqli_query($conn, $sql)) {
        echo "File uploaded successfully";
        header("Location: STpaymentrecords.php");
      }
    } 
  }
?>

