<?php
require_once('config.php');

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get the form data
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    // Insert the data into the passengers table
    $sql = "INSERT INTO passengers (name, dob, email, passwordd, phone) VALUES ('$name', '$dob', '$email', '$password', '$phone')";
try{
    if ($conn->query($sql) === TRUE) {
        // Close the database connection
        $conn->close();

        // Redirect to signup.html with success message
        header("Location: signup.php?message=Added%20Successfully");
        exit;
    } else {
        header("Location: signup.php?message=Already%20Exists");
    }
}catch(mysqli_sql_exception $e){
    header("Location: signup.php?message=Already%20Exists");

}
}

?>
