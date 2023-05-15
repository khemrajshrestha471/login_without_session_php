<?php

// connecting to the database

$servername = "localhost";
$username = "root";
$password = "";
$database = "crud";

// query for making connection to the database

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn){

    die("Error". mysqli_connect_error());
}

?>