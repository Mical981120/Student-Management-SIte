<?php
include_once("config.php");
if(isset($_POST['update']))
{	

$id = mysqli_real_escape_string($mysqli, $_POST['id']);

$Sday = date('Y-m-d' , strtotime($_POST['Sday']));
$Cindex = mysqli_real_escape_string($mysqli, $_POST['Cindex']);
$subid = mysqli_real_escape_string($mysqli, $_POST['subid']);
$Batch = mysqli_real_escape_string($mysqli, $_POST['Batch']);
$Semester = mysqli_real_escape_string($mysqli, $_POST['Semester']);
$Subject = mysqli_real_escape_string($mysqli, $_POST['Subject']);

		
if(empty($Cindex) || empty($Batch) || empty($Semester)) {	
if(empty($Cindex)) {
    header("Location: PCupdatestdetails.php?update=empty");
    exit();
}
if(empty($Batch)) {
echo '<font color="red">Age field is empty.</font><br>';
}
if(empty($Semester)) {
echo '<font color="red">Email field is empty.</font><br>';
}		
} else {	
$result = mysqli_query($mysqli, "UPDATE pcass SET CourseI='$Cindex', login='$subid', BatchN='$Batch',Sday='$Sday', Semester='$Semester', Subject='$Subject' WHERE id=$id");
header("Location: PCassiglist.php");
}
}
?>