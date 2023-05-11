<?php
$insert = false;
if (isset($_POST['name'])) {



    $server = "localhost";
    $username = "root";
    $password = "";

    //create a database connection
    $con = mysqli_connect($server, $username, $password);
    if (!$con) {
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "connection successful"; 

    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $sql = "INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `address`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$number', '$address', 'current_timestamp()');";
    // echo $sql;


    
    if ($con->query($sql) == True) {
        // echo "successfully inserted";
        $insert = true;

    } else {
        echo "ERROR: $sql <br> $con->error";

    }
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to the form</title>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <img src="Manipal.jpg" alt="">
    <div class="container">
        <h2>Welcome to MUJ California trip form</h2>
        <p>Enter your details to confirm your participation on the trip!</p>
        <?php
       
       if ($insert == true) {
            echo "<p class='submitmsg'>Thanks for submitting the form, we'll be happy to see you onboard!</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="enter your email">
            <input type="number" name="number" id="number" placeholder="enter your number">
            <input type="text" name="address" id="address" placeholder="enter your address">
            <button class="btn">Submit</button>


        </form>
    </div>
    <script src="index.js"></script>

    <!-- INSERT INTO `trip` (`s.no`, `name`, `age`, `gender`, `email`, `phone`, `address`, `dt`) VALUES ('1', 'test', '20', 'test1', 'test@test.com', '', 'test vihar', current_timestamp()); -->
</body>

</html>