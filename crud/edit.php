<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        .form-container {
            margin: 20px;
        }

        .form-control {
            margin-bottom: 10px;
        }

        .form-control label {
            display: block;
            margin-bottom: 5px;
        }

        .form-control input[type="text"],
        .form-control input[type="email"],
        .form-control input[type="radio"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-control input[type="radio"] {
            width: auto;
            margin-right: 10px;
        }

        .form-control input[type="file"] {
            margin-top: 5px;
        }

        .submit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #45a049;
        }

        .cancle-btn {
            background-color: red;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .cancle-btn:hover {
            background-color: royalblue;
        }
    </style>
</head>

<body>
    <?php
    include ("dbcon.php");
    $id = $_GET['id'];

    if (isset($_POST["submit"])) {
        $firstname = $_POST['Fname'];
        $lastname = $_POST['Lname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];

        $sql = "UPDATE `crud` SET `firstname`='$firstname', `lastname`='$lastname', `email`='$email', `gender`='$gender' WHERE id=$id";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("location: index.php?msg=Record updated successfully");
            exit();
        } else {
            echo "Failed: " . mysqli_error($conn);
        }
    }

    $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <div class="navbar">
        <h1>Edit User Data</h1>
        <h2>Click update when changing anything</h2>
    </div>

    <div class="form-container">
        <form method="post">
            <div class="form-control">
                <label for="fname">Firstname:</label>
                <input type="text" id="fname" name="Fname" value="<?php echo $row['firstname']; ?>">
            </div>
            <div class="form-control">
                <label for="lname">Lastname:</label>
                <input type="text" id="lname" name="Lname" value="<?php echo $row['lastname']; ?>">
            </div>
            <div class="form-control">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>">
            </div>
            <div class="form-control">
                <label for="gender">Gender:</label>
                <input type="radio" id="male" value="Male" <?php echo ($row['gender'] == 'Male') ? "checked" : ""; ?>
                    name="gender"> Male
                <input type="radio" id="female" value="Female" <?php echo ($row['gender'] == 'Female') ? "checked" : ""; ?> name="gender"> Female
            </div>
            <button type="submit" class="submit-btn" name="submit">Update</button>
            <a href="index.php"><button type="button" class="cancel-btn">Cancel</button></a>
        </form>
    </div>
</body>

</html>