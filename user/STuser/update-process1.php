<?php
include_once("config.php");
if(isset($_POST['update']))
{	

$id = mysqli_real_escape_string($mysqli, $_POST['id']);
$login = mysqli_real_escape_string($mysqli, $_POST['login']);
$name = mysqli_real_escape_string($mysqli, $_POST['name']);
$Address = mysqli_real_escape_string($mysqli, $_POST['Address']);
$Mobile = mysqli_real_escape_string($mysqli, $_POST['Mobile']);
$Email = mysqli_real_escape_string($mysqli, $_POST['Email']);
$NIC = mysqli_real_escape_string($mysqli, $_POST['NIC']);
$password = mysqli_real_escape_string($mysqli, $_POST['Pass']);
$Fname = mysqli_real_escape_string($mysqli, $_POST['Fname']);
		
if(empty($name) || empty($Address) || empty($Mobile)) {	
if(empty($name)) {
    header("Location: PCupdatestdetails.php?update=empty");
    exit();
}
if(empty($Address)) {
echo '<font color="red">Age field is empty.</font><br>';
}
if(empty($Email)) {
echo '<font color="red">Email field is empty.</font><br>';
}		
} else {	
$result = mysqli_query($mysqli, "UPDATE users SET name='$name',Address='$Address',Mobile='$Mobile',Email='$Email',NIC='$NIC',Fname='$Fname' WHERE id=$id");
header("Location: STprofile.php");
}
}
?>