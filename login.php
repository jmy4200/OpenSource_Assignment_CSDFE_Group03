<?php
session_start();
require 'config.php';

$message = "";

if(isset($_POST['login'])){

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, fullname, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows == 1){

        $user = $result->fetch_assoc();

        if(password_verify($password, $user['password'])){

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];

            header("Location: dashboard.php");
            exit();

        }else{

            $message = "<p class='error'>Invalid password.</p>";

        }

    }else{

        $message = "<p class='error'>Username not found.</p>";

    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">

<h2>User Login</h2>

<?php echo $message; ?>

<form method="POST">

<input
type="text"
name="username"
placeholder="Username"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<button name="login">

Login

</button>

</form>

<br>

<p style="text-align:center">

Don't have an account?

<a href="register.php">

Register

</a>

</p>

</div>

</body>
</html>
