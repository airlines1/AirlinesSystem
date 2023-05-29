<!DOCTYPE html>
<html>
<head>
  <title>Insert Baggage Data</title>
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

    label {
      display: block;
      margin-bottom: 5px;
      color: #555;
    }

    input[type="number"],
    input[type="text"],
    input[type="submit"],
    select {
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
    <h1>Insert Baggage Data</h1>
    <form method="post" action="baggage.php">
      <label for="weight">Weight:</label>
      <input type="number" step="0.01" name="weight" required><br>

      <label for="status">Status:</label>
      <select name="status" required>
        <option value="">Select Status</option>
        <option value="Scanned">Scanned</option>
        <option value="Loaded">Loaded</option>
        <option value="Unloaded">Unloaded</option>
      </select><br>

      <label for="passenger_id">Passenger ID:</label>
      <input type="number" name="passenger_id" required><br>

      <input type="submit" value="Submit">
    </form>
  </div>
</body>
</html>

<?php
require_once('config.php');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Prepare the SQL statement to insert the data into the baggage table
  $stmt = $conn->prepare("INSERT INTO baggage (weight, status, passenger_id) VALUES (?, ?, ?)");

  // Bind the form data to the SQL statement placeholders
  $stmt->bind_param("dsi", $_POST["weight"], $_POST["status"], $_POST["passenger_id"]);

  // Execute the SQL statement
  if ($stmt->execute() === TRUE) {
      echo "New record created successfully" . "\n";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error . "\n";
  }
}

// Close the database connection
$conn->close();
?>
