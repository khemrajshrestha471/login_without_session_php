<?php

require "connect.php";

if (isset($_POST['send'])) {
    $sn = $_GET['sn'];
    $time_range = $_POST['time_range'];
    $going_to_do = $_POST['going_to_do'];

    $send = "UPDATE `informations` SET `sn`='$sn',`time_range`='$time_range',`going_to_do`='$going_to_do' WHERE `sn`='$sn'";

    $query = mysqli_query($conn, $send);

    header('location:index.php');
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notes Saving Website</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <!-- <h3>Notes Saving Website</h3> -->
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Time Range</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="time_range" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Going to do</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="going_to_do" required>
            </div>
            <button type="submit" class="btn btn-success" name="send">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>