<?php
include '2.php';
$sql = "DELETE FROM studentrecords WHERE id = 3";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully!";
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();