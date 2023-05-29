<!DOCTYPE html>
<html>
<head>
  <title>Signup</title>
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

    input[type="text"],
    input[type="date"],
    input[type="email"],
    input[type="tel"],
    input[type="password"],
    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      background-color: #4caf50;
      color: #fff;
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
  <?php
  if (isset($_GET['message'])) {
    echo"<h1>".$_GET['message']."</h1>";
  }
  ?>  
  <h1>Sign Up</h1>
    <form action="passenger.php" method="POST">
      <input type="text" name="name" placeholder="Name" required>
      <input type="date" name="dob" placeholder="Date of Birth" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <input type="tel" name="phone" placeholder="Phone Number" required>
      <input type="submit" value="Sign Up">
    </form>
  </div>
</body>
</html>
