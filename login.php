<?php
require_once('config.php');
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    session_unset();
    session_destroy();
    $email = $_POST['email'];
    $pass = $_POST['password'];
    
    if ($email == "admin" && $pass == "admin") {
        header("Location: admin.html");
        exit();
    } 

    $query = "SELECT * FROM passengers WHERE email = ? AND passwordd = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $email, $pass);    
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        session_start();
        
        $user = $result->fetch_assoc();
        $_SESSION['name']  = $user["name"];
        $_SESSION['email'] = $user["email"];
        $_SESSION['phone'] = $user["phone"];
        $_SESSION['id'] = $user["id"];

        header("Location: home.php");
        $conn->close();
        exit();
    } else {
        header("Location:login1.php?message=Wrong%20email%20or%20password");
    }
    
    //Close the database connection
    $conn->close();
}

?>