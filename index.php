<?php

include 'config/db_conn.php';

$errors = ['username' => '', 'password' => '', 'connection'=>''];

$username = $password = '';


if (isset($_POST['submit'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];


  if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    $errors['username'] = "Email is not correct";
  }
  if (!preg_match('/^[a-zA-Z\sî]+$/', $password)) {
    $errors['password'] = "Password is not correct";
  }


  $sql = "SELECT * FROM login where email = '$username' and password = '$password'";

  $query = mysqli_query($conn, $sql);

  $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
  $result = mysqli_num_rows($query);

  if ($result == 1) {
    echo 'Success!';
  }
  else{
    $errors['connection'] = "Invalid Email or Password";
  }


  if (!array_filter($errors)) {
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./main.css">
  <title>Login</title>
</head>

<body>
  <div class="reg-log">
    <a id="login" class="link" href="#" class="">Login</a>
    <a id="sign-up" class="link" href="#">Signup</a>
  </div>
  <div class="container">
    <div class="form">
      <form action="index.php" id="container" method="POST">
        <div class="form-group">
          <p>Email:</p>
          <input type="text" name="username" placeholder="username/email" value="<?php echo htmlspecialchars($username); ?>">
          <div><?php echo $errors["username"] ?> </div>
        </div>
        <div class="form-group">
          <p>Password:</p>
          <input type="password" name="password" placeholder="xxxxxxxx" value="<?php echo htmlspecialchars($password); ?>">
          <div><?php echo $errors["password"]; ?> </div>

        </div>
        <div class="form-group">
          <input type="checkbox"> <span>remember me</span>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" value="Login" class="button">
          <div><?php echo $errors["connection"] ?> </div>
        </div>

      </form>



      <div class="img">
        <img src="./img/Space.svg" alt="">
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="main.js"></script>
</body>

</html>