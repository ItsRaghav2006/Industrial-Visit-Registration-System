<?php
$server = 'localhost'; 
$username = 'root';
$password = '';

$con = mysqli_connect($server, $username, $password);

if(!$con) {
    die("Connection to this database failed due to" . mysqli_connect_error());
}

// SQL query to fetch data from the table
$sql = "SELECT rollno, name ,age ,gender ,email ,phone ,other ,dt FROM trip.trip";
$result = $con->query($sql);
// $result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Data from Database</title>
    <link rel="stylesheet" href="style1.css">
    <style>
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Users Table</h2>
    <table>
        <thead>
            <tr>
                <th>Roll No</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone no</th>

            </tr>
        </thead>
        <tbody>
            <?php
            // Loop through the result and display the rows
            if ($result != null) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['rollno']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['age']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }

            $con->close();
            ?>
        </tbody>
    </table>
    <a href="index.php"><button class="btn">Go Back</button></a>

</body>
</html>
