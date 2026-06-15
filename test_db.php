<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect("localhost", "root", "", "incident_reporting_db");

if(!$conn){
    die("FAILED: " . mysqli_connect_error());
}

echo "DATABASE CONNECTION SUCCESS";
?>
