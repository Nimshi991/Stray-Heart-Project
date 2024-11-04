<?php

$server="localhost";
$username="root";
$password="";
$dbname="";

$connection=mysqli_connect($server, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

?>