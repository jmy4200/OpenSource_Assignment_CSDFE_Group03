<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<link rel="stylesheet" href="css/style.css">

<style>

.menu{

    width:700px;
    margin:40px auto;
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 0 15px rgba(0,0,0,.2);

}

.menu a{

    display:block;
    padding:15px;
    margin:10px 0;
    background:#0d6efd;
    color:white;
    text-align:center;
    border-radius:5px;

}

.menu a:hover{

    background:#084298;

}

</style>

</head>

<body>

<div class="menu">

<h2>

Welcome,
<?php echo htmlspecialchars($_SESSION['fullname']); ?>

</h2>

<br>

<a href="add_incident.php">

Record Security Incident

</a>

<a href="incidents.php">

View Incident Reports

</a>

<a href="search.php">

Search Incident

</a>

<a href="logout.php">

Logout

</a>

</div>

</body>
</html>
