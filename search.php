<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

require 'config.php';

$record = null;
$message = "";

if(isset($_POST['search'])){

    $incident_id = trim($_POST['incident_id']);

    $stmt = $conn->prepare(
        "SELECT * FROM incidents WHERE incident_id = ?"
    );

    $stmt->bind_param("s", $incident_id);
    $stmt->execute();

    $result = $stmt->get_result();

    if($result->num_rows == 1){
        $record = $result->fetch_assoc();
    }else{
        $message = "<p class='error'>No incident found.</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Search Incident</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

<h2>Search Incident</h2>

<?php echo $message; ?>

<form method="POST">

<input type="text" name="incident_id"
placeholder="Enter Incident ID (e.g. INC001)"
required>

<button name="search">Search</button>

</form>

<?php if($record){ ?>

<hr>

<h3>Result</h3>

<p><b>Incident ID:</b> <?php echo htmlspecialchars($record['incident_id']); ?></p>
<p><b>Title:</b> <?php echo htmlspecialchars($record['title']); ?></p>
<p><b>Description:</b> <?php echo htmlspecialchars($record['description']); ?></p>
<p><b>Type:</b> <?php echo htmlspecialchars($record['incident_type']); ?></p>
<p><b>Reporter:</b> <?php echo htmlspecialchars($record['reporter']); ?></p>
<p><b>Date:</b> <?php echo $record['incident_date']; ?></p>
<p><b>Status:</b> <?php echo $record['status']; ?></p>

<?php } ?>

<br>

<a href="dashboard.php">← Back to Dashboard</a>

</div>

</body>
</html>
