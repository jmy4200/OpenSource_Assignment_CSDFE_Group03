<?php
require 'config.php';

$message = "";

if(isset($_POST['register'])){

    $fullname = trim($_POST['fullname']);
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = $conn->prepare("SELECT id FROM users WHERE username = ?");
    $check->bind_param("s",$username);
    $check->execute();
    $check->store_result();

    if($check->num_rows > 0){

        $message = "<p class='error'>Username already exists.</p>";

    }else{

        $stmt = $conn->prepare("INSERT INTO users(fullname,username,password)
                                VALUES(?,?,?)");

        $stmt->bind_param("sss",$fullname,$username,$password);

        if($stmt->execute()){

            $message="<p class='message'>Registration Successful</p>";

        }else{

            $message="<p class='error'>Registration Failed</p>";

        }

        $stmt->close();
    }

    $check->close();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>User Registration</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

<h2>User Registration</h2>

<?php echo $message; ?>

<form method="POST">

<input
type="text"
name="fullname"
placeholder="Full Name"
required>

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

<button name="register">
Register
</button>

</form>

<br>

<p style="text-align:center">

Already have an account?

<a href="login.php">

Login

</a>

</p>

</div>

</body>
</html>
