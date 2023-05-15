<?php

require "connect.php";

$sn = $_GET['sn'];

$dlt = "DELETE from `informations` where `sn` = $sn";

$check = mysqli_query($conn, $dlt);
header("location: index.php");
?>