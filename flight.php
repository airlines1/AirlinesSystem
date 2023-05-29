<!DOCTYPE html>
<html>
<head>
  <title>Add Flight</title>
  <style>
    body {
      background-image: url("imgs/login.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
      text-align: center;
      color: #333;
    }

    label {
      display: block;
      margin-bottom: 5px;
      color: #555;
    }

    input[type="text"],
    input[type="datetime-local"],
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      box-sizing: border-box;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: #fff;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Add Flight</h2>
    <form action="flight.php" method="post">
      <label for="flight_number">Flight Number:</label>
      <input type="text" id="flight_number" name="flight_number" required>
      
      <label for="origin">Origin:</label>
      <input type="text" id="origin" name="origin" required>
      
      <label for="destination">Destination:</label>
      <input type="text" id="destination" name="destination" required>
      
      <label for="departure_time">Departure Time:</label>
      <input type="datetime-local" id="departure_time" name="departure_time" required>
      
      <label for="arrival_time">Arrival Time:</label>
      <input type="datetime-local" id="arrival_time" name="arrival_time" required>
      
      <input type="submit" value="Add Flight">
    </form>
  </div>
</body>
</html>


<?php
require_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $flight_number = $_POST["flight_number"];
    $origin = $_POST["origin"];
    $destination = $_POST["destination"];
    $departure_time = $_POST["departure_time"];
    $arrival_time = $_POST["arrival_time"];

    $sql = "INSERT INTO flights (flight_number, origin, destination, departure_time, arrival_time) 
            VALUES ('$flight_number', '$origin', '$destination', '$departure_time', '$arrival_time')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Flight added successfully";
    } else {
        echo "Error adding flight: " . $conn->error;
    }
}

$conn->close();
?>
