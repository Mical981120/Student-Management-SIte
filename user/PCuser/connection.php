<?php
$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "abcinstitute";
 $con = new mysqli($hostName, $userName, $password, $databaseName);
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
?>