<?php
include_once 'database.php';
$sql = "DELETE FROM result WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    header("Location: PCresltlist.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>