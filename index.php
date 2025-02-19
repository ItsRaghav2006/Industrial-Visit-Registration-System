<?php
$insert = false;
if(isset($_POST['name'])) {
    //set connection variables
$server = "localhost";
$username = "root";
$password = "";

//create a database connection
$con = mysqli_connect($server, $username, $password);

//check for connection variables
if(!$con) {
    die("Connection to this database failed due to" . mysqli_connect_error());
}
// echo "Success connecting to db";

//collect post variables
$rollno = $_POST['rollno'];
$name = $_POST['name'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];

$sql = "INSERT INTO `trip`.`trip` (`rollno`,`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$rollno','$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;

//execute the query
if($con->query($sql) == true) { //object operator
    // echo "Successfully inserted";

    //flag for successful insertion
    $insert = true;
    header("Location: display.php");
    exit();
}
else {
    echo "ERROR: $sql <br> $con->error";
}

//close the database connection
$con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img src="assets/bg.jpg" alt="vapm" class="bgsrc">
    <div class="container">
        <h1>Welcome to VAPM Industrial Visit</h1>
        <p>Enter your details and submit this form to confirm your participation in the industial trip</p>
        <?php
        if($insert == true) {
            echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining industrial trip</p>";
        }
        ?>
        <div class="logo">
            <img src="assets/logo.png" alt="vapm logo">
        </div>
        <form action="index.php" method="POST">
            <input type="text" name="rollno" id="rollno" placeholder="Enetr your Roll Number">
            <input type="text" name="name" id="name" placeholder="Enetr your Name">
            <input type="text" name="age" id="age" placeholder="Enetr your age">
            <input type="text" name="gender" id="gender" placeholder="Enetr your gender">
            <input type="email" name="email" id="email" placeholder="Enetr your Email">
            <input type="text" name="phone" id="phone" placeholder="Enetr your Phone">
            <textarea name="desc" id="desc" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>