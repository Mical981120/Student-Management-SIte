<?php
include_once("config.php");
if(isset($_POST['update']))
{	
  $error = array('Fname'=>'','Batch'=>'','Cindex'=>'',);
  $id = mysqli_real_escape_string($mysqli, $_POST['id']);
  
  $Fname = mysqli_real_escape_string($mysqli, $_POST['Fname']);
  $Batch = mysqli_real_escape_string($mysqli, $_POST['Batch']);
  $Cindex = mysqli_real_escape_string($mysqli, $_POST['Cindex']);
  $Ptime = mysqli_real_escape_string($mysqli, $_POST['Ptime']);
  $Jday = date('Y-m-d' , strtotime($_POST['Jday']));
  $Course = mysqli_real_escape_string($mysqli, $_POST['Course']);
  $Branch = mysqli_real_escape_string($mysqli, $_POST['Branch']);


		
if(empty($Fname) || empty($Batch) || empty($Cindex)) {	
if(empty($_POST['Fname'])) {
   $error['Fname'] = '<font color="red">Username field is empty.</font><br>';
    exit();
}
if(empty($Batch)) {
echo '<font color="red">Age field is empty.</font><br>';
}
if(empty($Cindex)) {
echo '<font color="red">Email field is empty.</font><br>';
}		
} else {	
$result = mysqli_query($mysqli, "UPDATE stdetails SET Fname='$Fname',BatchN='$Batch',CourseI='$Cindex',Pdtime='$Ptime',Jday='$Jday',Course='$Course',Branch='$Branch' WHERE id=$id");
header("Location: PCviewstdetails.php");
}
}
?>