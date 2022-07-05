<?php
include_once("config.php");
if(isset($_POST['update']))
{	
    $id = mysqli_real_escape_string($mysqli, $_POST['id']);
$login = mysqli_real_escape_string($mysqli, $_POST['login']);

$Cindex = mysqli_real_escape_string($mysqli, $_POST['Cindex']);

$name = mysqli_real_escape_string($mysqli, $_POST['Fname']);
$Batch = mysqli_real_escape_string($mysqli, $_POST['Batch']);
$Semester = mysqli_real_escape_string($mysqli, $_POST['Semester']);
$Subject = mysqli_real_escape_string($mysqli, $_POST['Subject']);
$Rday = date('Y-m-d' , strtotime($_POST['Rday']));
$Result = mysqli_real_escape_string($mysqli, $_POST['Result']);
$Grade = mysqli_real_escape_string($mysqli, $_POST['Grade']);
$Feedback = mysqli_real_escape_string($mysqli, $_POST['Feedback']);
$Semester = mysqli_real_escape_string($mysqli, $_POST['Semester']);
$Sindex = mysqli_real_escape_string($mysqli, $_POST['Sindex']);


		
if(empty($login) || empty($Cindex) || empty($Semester)) {	
if(empty($login)) {
    header("Location: PCupdatestdetails.php?update=empty");
    exit();
}
if(empty($Cindex)) {
echo '<font color="red">Age field is empty.</font><br>';
}
if(empty($Semester)) {
echo '<font color="red">Email field is empty.</font><br>';
}		
} else {	
$result = mysqli_query($mysqli, "UPDATE result SET StudentI='$Sindex', Feedback='$Feedback', Fname='$name', CourseI='$Cindex', login='$login', BatchN='$Batch', Rday='$Rday', Semester='$Semester', Subject='$Subject', Result='$Result', Grade='$Grade' WHERE id=$id");
header("Location: PCresltlist.php");
}
}
?>