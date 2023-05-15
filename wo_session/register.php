<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include "dbconnect.php";
  $email = $_POST["email"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  // check weather username exists 
  $existSql = "SELECT * from `registration` where email = '$email'";
  $result = mysqli_query($conn, $existSql);
  $numExistRows = mysqli_num_rows($result);

  if ($numExistRows > 0) {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> Same Email already exists! Try again with different Email.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  } else {

    if (($password == $cpassword)) {
      $sql = "INSERT INTO `registration` (`id`, `email`, `password`, `time`) VALUES (NULL, '$email', '$password', current_timestamp())";
      $result = mysqli_query($conn, $sql);
      if ($result) {
      header("location: dashboard.php");
      }
    } else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Error!</strong> Password did not match!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  }
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration_Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <?php
  require "navbar.php";
  ?>
  <div class="container mt-4">
    <form action="register.php" method="post" autocomplete="off">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" maxlength="20" required>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="password" maxlength="20" required>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="cpassword" required>
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>