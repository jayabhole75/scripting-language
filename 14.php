<!DOCTYPE html>
<html>

<head>
    <title>Delete Users</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <center>
        <h2>Delete Users</h2>
    </center>
    <?php
   include("condb.php");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
        $id = $_POST['id'];
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "User deleted successfully!";
        } else {
            echo "Error deleting user: " . $conn->error;
        }
    }
    $sql = "SELECT id, name FROM users";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $name = $row['name'];
            echo "<tr><td>$name</td><td><form method='post' action=''>
                  <input type='hidden' name='id' value='$id'>
                  <input type='submit' name='delete' value='Delete' onclick='return confirm(\"Are you sure you want to delete $name?\");'>
                  </form></td></tr>";
        }
        echo "</table>";
    } else {
        echo "No users found.";
    }
    $conn->close();
    ?>
</body>

</html>