<!DOCTYPE html>
<html>

<head>
    <title>Students in Grade 11</title>
</head>

<body>
    <h2>Students in Grade 11:</h2>
    <?php
    include '2.php';
    $sql = "SELECT * FROM studentrecords WHERE grade = 11";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Grade</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["grade"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No students found in Grade 11";
    }
    $conn->close();
    ?>
</body>

</html>