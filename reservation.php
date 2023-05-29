<!DOCTYPE html>
<html>
<head>
  <title>Add Reservation</title>
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
      width: 300px;
      margin: 100px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
    }

    input[type="number"],
    input[type="text"],
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      width: 100%;
      background-color: #4caf50;
      color: #fff;
      padding: 10px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Add Reservation</h1>
    <form action="reservation.php" method="post">
      <label for="passenger_id">Passenger ID:</label>
      <input type="number" id="passenger_id" name="passenger_id" value="<?php session_start(); if (isset($_SESSION['id'])){ echo $_SESSION['id'];} ?>"
      <?php if (isset($_SESSION['id'])){echo "readonly";} ?> required>
      
      <label for="flight_number">Flight Number:</label>
      <input type="text" id="flight_number" name="flight_number" value="<?php if (isset($_GET['flight'])){echo $_GET['flight'];} ?>"
      <?php if (isset($_GET['flight'])){echo "readonly";} ?> required>
      
      <label for="seat_number">Seat Number:</label>
      <input type="number" id="seat_number" name="seat_number" required>
      
      <input type="submit" value="Add Reservation">
    </form>
  </div>
</body>
</html>

<?php
require_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $passengerID = $_POST['passenger_id'];
    $flightNumber = $_POST['flight_number'];
    $seatNumber = $_POST['seat_number'];

    // Prepare the SQL statement
    $sql = "INSERT INTO reservations (passenger_id, flight_number, seat_number) VALUES (?, ?, ?)";

    // Create a prepared statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bind_param("iss", $passengerID, $flightNumber, $seatNumber);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Reservation added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

$conn->close();
?>
