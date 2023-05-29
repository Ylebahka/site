<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "user_db";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$con) {
    die("Could not connect to database: " . mysqli_connect_error());
}