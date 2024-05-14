
<!DOCTYPE html>
<html>

<head>
    <title>Update User Info</title>
</head>

<body>
    <h2>Update User Info</h2>
    <?php
    // Database connection
    include 'condb.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Update user information in the database
        $sql = "UPDATE users SET name=?, email=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $name, $email, $id);

        if ($stmt->execute()) {
            echo "User information updated successfully!";
        } else {
            echo "Error updating user information: " . $stmt->error;
        }
    }
    ?>
    <?php
    // Database connection
    include 'condb.php';

    // Check if ID is set and not empty
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        // Retrieve user information based on ID
        $sql = "SELECT * FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $email = $row['email'];
            // Display user information in a form for updating
            echo "<form method='POST' action=''>";
            echo "<label for='name'>Name:</label>";
            echo "<input type='text' id='name' name='name' value='$name'><br><br>";
            echo "<label for='email'>Email:</label>";
            echo "<input type='email' id='email' name='email' value='$email'><br><br>";
            echo "<input type='hidden' name='id' value='$id'>";
            echo "<input type='submit' value='Update'>";
            echo "</form>";
        } else {
            echo "No user found with the provided ID.";
        }
    } else {
        echo "Invalid ID.";
    }
    ?>
</body>

</html>