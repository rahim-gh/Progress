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
  require '../Control/db.php';

  $email = $_POST['email'];
  $password = $_POST['password'];

  if (strlen($password) < 8) {
    $error = "Password must be at least 8 characters long";
    header('Location: login.html?error=' . urlencode($error));
    exit;
  }

  // Prepare the SQL query
  $sql = "SELECT password FROM users WHERE email = ?";
  $stmt = mysqli_prepare($con, $sql);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {
    $hashedPassword = $row['password'];
    if (password_verify($password, $hashedPassword)) {
      $_SESSION['loggedin'] = true;
      header('Location: ../index.html');
      exit;
    } else {
      $error = "Wrong password";
    }
  } else {
    header('Location: login.html?error=No User Found.');
    exit;
  }

  ?>


  <form method="get">
    <label for="email">Email:</label>
    <input type="text" name="email" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br>
    <input type="submit" value="Register">
  </form>
</body>

</html>
