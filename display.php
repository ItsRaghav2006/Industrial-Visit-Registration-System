<?php 
$server = 'localhost'; 
$username = 'root';
$password = '';

$con = mysqli_connect($server, $username, $password);

if(!$con) {
    die("Connection to this database failed due to" . mysqli_connect_error());
}

// Fetch the latest submitted record
$sql = "SELECT * FROM trip.trip ORDER BY dt DESC LIMIT 1"; // Get the latest entry
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display User Data</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <h1>Submitted Data</h1>
    <div class="container_display">
        <?php
        if ($result != null) {
            $row = $result->fetch_assoc();

            // Display the latest form submission
            echo "<p><strong>Roll No:</strong> " . htmlspecialchars($row['rollno']) . "</p>";
            echo "<p><strong>Name:</strong> " . htmlspecialchars($row['name']) . "</p>";
            echo "<p><strong>Age:</strong> " . htmlspecialchars($row['age']) . "</p>";
            echo "<p><strong>Gender:</strong> " . htmlspecialchars($row['gender']) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>";
            echo "<p><strong>Phone:</strong> " . htmlspecialchars($row['phone']) . "</p>";
        } else {
            echo "<p>No data found!</p>";
        }

        // Close the connection
        $con->close();
        ?>
        <a href="data.php"><button class="btn">See All Data</button></a>
    </div>
</body>
</html>



























<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display User Data</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <h1>Submitted Data</h1>
    <div class="container_display">
        <?php
        // Check if form data is received
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the submitted form data
            $name = htmlspecialchars($_POST['name']);
            $age = htmlspecialchars($_POST['age']);
            $gender = htmlspecialchars($_POST['gender']);
            $email = htmlspecialchars($_POST['email']);
            $phone = htmlspecialchars($_POST['phone']);


            // Display the data
            echo "<p><strong>Name:</strong> $name</p>";
            echo "<p><strong>Age:</strong> $age</p>";
            echo "<p><strong>Gender:</strong> $gender</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>Phone:</strong> $phone</p>";
            echo "<a href='data.php'><button class='btn'>See All Data</button></a>";

        } else {
            echo "<p>No data submitted!</p>";
        }
        ?>
    </div>
</body>
</html> -->
