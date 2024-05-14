<!DOCTYPE html>
<html>

<head>
    <title>Users Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid red;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: green;
        }
    </style>
</head>

<body>
    <center>
        <h2>Users Table</h2>
    </center>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
        </tr>
        <?php
       include("condb.php");
        $sql = "SELECT name, email, phonenumber FROM users";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["name"] . "</td>
                        <td>" . $row["email"] . "</td>
                        <td>" . $row["phonenumber"] . "</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No users found</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>

</html>