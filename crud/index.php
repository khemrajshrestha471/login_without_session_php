<?php

require "connect.php";
if (!$conn) {
  echo "Something went wrong";
}

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
if (isset($_POST['send'])) {
  $time_range = $_POST['time_range'];
  $going_to_do = $_POST['going_to_do'];

  $send = "INSERT INTO `informations` (`sn`, `time_range`, `going_to_do`, `time`) VALUES (NULL, '$time_range', '$going_to_do', current_timestamp())";

  $query = mysqli_query($conn, $send);
  if ($query) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Data inserted into the database successfully!!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  } else {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Something went wrong, Try again later!!!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
  }
}

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My today's schedule</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
  <div class="container mt-4">
    <h3>My today's schedule</h3>
    <form method="post" autocomplete="off">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Time Range</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="time_range" required>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Going to do</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="going_to_do" required>
      </div>
      <button type="submit" class="btn btn-success" name="send">Set</button>
    </form>
    <div class="container mt-4">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">SN</th>
            <th scope="col">Time Range</th>
            <th scope="col">Going to do</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM `informations`";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <tr>
              <td><?php echo $row['sn']; ?></td>
              <td><?php echo $row['time_range']; ?></td>
              <td><?php echo $row['going_to_do']; ?></td>

              <td><button class="btn-primary btn"><a href="update.php?sn=<?php echo $row['sn']; ?>" class="text-white" style='text-decoration:none'> Update </a> </button></td>

              <td><button class="btn-danger btn"><a href="delete.php?sn=<?php echo $row['sn']; ?>" class="text-white" style='text-decoration:none'> Delete </a> </button></td>
            </tr>
          <?php
          }
          ?>

        </tbody>
      </table>


    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>