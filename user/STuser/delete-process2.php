<?php
include_once 'database.php';
$sql = "DELETE FROM stassignment WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    header("Location: STviewas.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>