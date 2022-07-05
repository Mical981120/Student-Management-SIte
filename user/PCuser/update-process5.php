<?php
include_once("config.php");
if(isset($_POST['update']))
{	

$id = mysqli_real_escape_string($mysqli, $_POST['id']);

$Pday = date('Y-m-d' , strtotime($_POST['Pday']));
$Amount = mysqli_real_escape_string($mysqli, $_POST['Amount']);
$Month = mysqli_real_escape_string($mysqli, $_POST['Month']);
$Mid = mysqli_real_escape_string($mysqli, $_POST['Mid']);


		
if(empty($Mid) || empty($Amount) || empty($Month)) {	
if(empty($Mid)) {
    header("Location: PCupdatestdetails.php?update=empty");
    exit();
}
if(empty($Amount)) {
echo '<font color="red">Age field is empty.</font><br>';
}
if(empty($Month)) {
echo '<font color="red">Email field is empty.</font><br>';
}		
} else {	
$result = mysqli_query($mysqli, "UPDATE pcpayment SET MID='$Mid', Amount='$Amount', Month='$Month',Ldate='$Pday' WHERE id=$id");
header("Location: PCpaymentlist.php");
}
}
?>