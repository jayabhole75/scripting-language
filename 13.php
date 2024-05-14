<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Retrieve and Update User Info</title>
</head>

<body>
    <h2>Retrieve and Update User Info</h2>
    <form method="POST" action="">
        <label for="id">Select ID:</label>
        <select id="id" name="id">
            <option value="">Select ID</option>
            <?php
            include ("condb.php");

            $sql = "SELECT id FROM users";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row["id"] . "'>" . $row["id"] . "</option>";
                }
            }
            ?>
        </select><br><br>
        <button type="submit" name="action" value="retrieve">Retrieve Data</button>
        <input type="submit" name="submit" value="Update">
        <br><br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && isset($_POST['id'])) {
            $selected_id = $_POST['id'];
            // Sanitize the input
            $selected_id = mysqli_real_escape_string($conn, $selected_id);
            $sql = "SELECT * FROM users WHERE id='$selected_id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $name = $row['name'];
                $email = $row['email'];
                $phonenumber = $row['phonenumber'];
                echo "
                <label for='name'>Name:</label>
                <input type='text' id='name' name='name' value='$name'><br><br>
                <label for='email'>Email:</label>
                <input type='email' id='email' name='email' value='$email'><br><br>
                <label for='phonenumber'>Phone Number:</label>
                <input type='text' id='phonenumber' name='phonenumber' value='$phonenumber' disabled><br><br>
                <input type='hidden' name='retrievedid' value='$selected_id'><br><br>";
            } else {
                echo "No user found with the selected ID.";
            }
        }
        ?>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            if (!empty($_POST['name']) && !empty($_POST['email'])) {
                $id = $_POST['retrievedid'];
                $name = mysqli_real_escape_string($conn, $_POST['name']); // Sanitize input
                $email = mysqli_real_escape_string($conn, $_POST['email']); // Sanitize input
                $sql = "UPDATE users SET name='$name', email='$email' WHERE id='$id'";
                if ($conn->query($sql) === TRUE) {
                    echo "User information updated successfully!";
                } else {
                    echo "Error updating user information: " . $conn->error;
                }
            } else {
                echo "Error: Name, and email are required to update user information.";
            }
        }
        $conn->close();
        ?>
    </form>
</body>

</html>