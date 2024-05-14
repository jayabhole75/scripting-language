<?php
include ("dbcon.php");

$id = $_GET['id'];
$sql = "DELETE FROM `crud` WHERE id=$id"; // Use backticks around table name

$result = mysqli_query($conn, $sql);

if ($result) {
    header("location: index.php?msg=Record deleted successfully");
    exit(); // Exit to prevent further execution
} else {
    echo "Failed: " . mysqli_error($conn);
}

mysqli_close($conn);
?>