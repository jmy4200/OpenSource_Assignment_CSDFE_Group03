<?php
include "config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(username,password)
            VALUES('$username','$password')";

    if(mysqli_query($conn, $sql)){
        echo "DATA INSERTED SUCCESSFULLY";
    } else {
        die("SQL ERROR: " . mysqli_error($conn));
    }
}
?>
