<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Insert Record</title>
</head>

<body>
    <?php
    // session_start(); // Start the session to use session variables

    include '2.php'; // Your database connection file

    // Check if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $name = $_POST['name'];
        $grade = $_POST['grade'];
        $sql = "INSERT INTO studentrecords (name, grade) VALUES ('$name', '$grade')";

        $result = mysqli_query($conn, $sql);

        // Execute and check
        if ($result) {
            $_SESSION['message'] = "Record inserted successfully!";
            
        } else {
            $_SESSION['message'] = "Error: " . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
    }

    // Check if there is a message in the session
    if (isset($_SESSION['message'])) {
        echo "<p>" . $_SESSION['message'] . "</p>";
        unset($_SESSION['message']); // Clear the message so it doesn't keep appearing
    }
    ?>

    <h2>Insert Record</h2>
    <form method="post" action="">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="grade">Grade:</label><br>
        <input type="text" id="grade" name="grade" required><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>
