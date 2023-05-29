<!DOCTYPE html>
<html>
<head>
  <title>Home Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url("imgs/login.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      width: 800px;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Welcome, <?php session_start(); $n=$_SESSION['name'];echo $n; ?></h1>
    <table>
      <tr>
        <th>Flight Number</th>
        <th>Arrival Time</th>
        <th>Departure Time</th>
        <th>Origin</th>
        <th>Destination</th>
        <th>Reservation</th>
      </tr>
      <?php

      require_once('config.php');

      // Retrieve flight data from the database
      $sql = "SELECT flight_number, arrival_time, departure_time, origin, destination FROM flights";
      $result = $conn->query($sql);

      // Display the flight data in the table
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo "<td>".$row['flight_number']."</td>";
          echo "<td>".$row['arrival_time']."</td>";
          echo "<td>".$row['departure_time']."</td>";
          echo "<td>".$row['origin']."</td>";
          echo "<td>".$row['destination']."</td>";
          echo "<td><a href='reservation.php?flight=".$row['flight_number']."'>Reserve</a></td>";
          echo "</tr>";
        }
      } else {
        echo "<tr><td colspan='6'>No flights available.</td></tr>";
      }

      // Close the database connection
      $conn->close();
      ?>
    </table>
  </div>
</body>
</html>
