<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
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
<?php 
// include ("dbcon.php");
// if (isset($_POST["submit"])) {
//     $firstname=$_POST['Fname'];
//     $lastname=$_POST['Lname'];
//     $email=$_POST['email'];
//     $gender=$_POST['gender'];

//     $sql= "INSERT INTO `crud`( `firstname`, `lastname`, `email`, `gender`) VALUES ('$firstname','$lastname',' $email','$gender',)";

//     $result=mysqli_query($conn,$sql);
//     if($result){
//         header("location: index.php?msg=New record created successfully");
//         exit();
//     }
//     else{
//         echo"failed: ".mysqli_error( $conn);}




// }


include("dbcon.php");

if (isset($_POST["submit"])) {
    $firstname = $_POST['Fname'];  
    $lastname = $_POST['Lname'];   
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO `crud`(`firstname`, `lastname`, `email`, `gender`) VALUES ('$firstname', '$lastname', '$email', '$gender')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("location: index.php?msg=New record created successfully");
        exit(); 
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}


?>

<body>
    <div class="navbar">
        <h1>Insert All Data</h1>
    </div>
    <div class="form-container">
        <form action="datainserd.php" method="post">
            <div class="form-control">
                <label for="fname">Firstname:</label>
                <input type="text" id="fname" name="Fname" placeholder="Enter your First name...">
            </div>
            <div class="form-control">
                <label for="lname">Lastname:</label>
                <input type="text" id="lname" name="Lname" placeholder="Enter your last name...">
            </div>
            <div class="form-control">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email...">
            </div>
            <div class="form-control">
                <label for="gender">Gender:</label>
                <input type="radio" id="male" value="Male" name="gender"> Male
                <input type="radio" id="female" value="Female" name="gender"> Female
            </div>
            <!-- <div class="form-control">
                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="image">
            </div> -->
            <button type="submit" class="submit-btn" name="submit">Submit</button>
            <button type="cancle" class="cancle-btn"><a href="index.php">Cancle</a></button>
        </form>
    </div>
</body>

</html>