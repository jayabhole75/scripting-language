<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP form</title>
</head>

<body>
    <h2>Contact Form</h2>
    <form method="POST" action="">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="phonenumber">Phone Number:</label><br>
        <input type="tel" id="phonenumber" name="phonenumber" pattern="[0-9]{10}" required><br><br>
        <input type="submit" name="submit" value="Submit"><br>
    </form>
</body>

</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully to database $dbname";
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phonenumber'];
    if (!preg_match("/^\S+@\S+\.\S+$/", $email)) {
        echo "Invalid email format.";
        exit;
    }
    $stmt = $conn->prepare("INSERT INTO contacts (name, email, phonenumber) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $phone);
    if ($stmt->execute()) {
        echo "<br>Record inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>