<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Progress</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/styles.css">
</head>

<body>


  <?php
  include 'auth.php';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];

    if ($action == "login") {
      $email = $_POST["email"];
      $password = $_POST["password"];

      if (login($email, $password, $conn)) {
        echo "Login successful!\n";
      } else {
        echo "Login failed.\n";
      }
    } elseif ($action == "register") {
      $name = $_POST["name"];
      $familyname = $_POST["familyname"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      $check_password = $_POST["check_password"];

      if (register($name, $familyname, $email, $password, $check_password, $conn)) {
        echo "Registration successful!\n";
      } else {
        echo "Registration failed.\n";
      }
    } elseif ($action == "logout") {
      if (logout()) {
        echo "Logout successful!\n";
      } else {
        echo "Logout failed.\n";
      }
    }
  }
  ?>


  <h1>Login</h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="hidden" name="action" value="login">

    <label>Email</label><br>
    <input type="email" name="email"><br>

    <label>Password</label><br>
    <input type="password" name="password"><br>

    <input type="submit" name="submit" value="Login">
  </form>

  <h1>Register</h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="hidden" name="action" value="register">

    <label>Name</label><br>
    <input type="text" name="name"><br>

    <label>Familyame</label><br>
    <input type="text" name="familyname"><br>

    <label>Email</label><br>
    <input type="email" name="email"><br>

    <label>Password</label><br>
    <input type="password" name="password"><br>

    <label>Retype the Password</label><br>
    <input type="password" name="check_password"><br>

    <input type="submit" name="submit" value="Register">
  </form>

  <h1>Logout</h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <input type="hidden" name="action" value="logout">
    <input type="submit" name="submit" value="Logout">
  </form>

</body>

</html>
