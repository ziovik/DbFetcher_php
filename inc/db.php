<?php

//db details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'db_1c8';

//Connect and select the database
$con = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Change character set to utf8
mysqli_set_charset($con,"utf8");

?>

