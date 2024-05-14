<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        /* Styles for small screens */
        @media screen and (max-width: 768px) {
            table {
                width: 100%;
                border-collapse: collapse;
            }

            th,
            td {
                padding: 8px;
            }

            button {
                padding: 8px 12px;
            }
        }

        /* Styles for medium and larger screens */
        @media screen and (min-width: 769px) {
            table {
                width: 80%;
                margin: 20px auto;
                border-collapse: collapse;
                border: 2px solid greenyellow;
                /* Added border to the table */
                border-radius: 3.5px;
            }

            th,
            td {
                padding: 12px;
            }

            button {
                padding: 10px 15px;
            }
        }


        
    </style>
</head>

<body>
    <h1>ALL Information about users</h1>
    <?php
    if(isset($_get ["msg"])){   

        $msg = $_get ["msg"];
        echo $msg;
    }
    
    ?>
    <div>
        <a href="datainserd.php">
            <button>Add New</button>
        </a>
    </div>
    <div class="container">
        <table border 2.4px solid black
        >
            <thead>
                <tr>
                    <th>id</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include ("dbcon.php");
                $sql = "SELECT * FROM `crud`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['firstname'] ?></td>
                        <td><?php echo $row['lastname'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['gender'] ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $row['id'] ?>"><button>Edit</button></a>
                            <a href="delete.php?id=<?php echo $row['id'] ?>"><button>Delete</button></a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>