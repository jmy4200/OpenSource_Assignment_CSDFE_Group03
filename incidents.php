<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

require 'config.php';

$status = $_GET['status'] ?? '';

if($status != ""){
    $stmt = $conn->prepare("SELECT * FROM incidents WHERE status=? ORDER BY created_at DESC");
    $stmt->bind_param("s", $status);
    $stmt->execute();
    $result = $stmt->get_result();
}else{
    $result = $conn->query("SELECT * FROM incidents ORDER BY created_at DESC");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Incident Reports</title>

<link rel="stylesheet"
href="css/style.css">

</head>

<body>

<div style="width:95%;margin:30px auto;">

<h2>Security Incident Reports</h2>

<table>

<tr>

<th>ID</th>
<th>Incident ID</th>
<th>Title</th>
<th>Type</th>
<th>Reporter</th>
<th>Date</th>
<th>Status</th>

</tr>

<?php while($row = $result->fetch_assoc()){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo htmlspecialchars($row['incident_id']); ?></td>

<td><?php echo htmlspecialchars($row['title']); ?></td>

<td><?php echo htmlspecialchars($row['incident_type']); ?></td>

<td><?php echo htmlspecialchars($row['reporter']); ?></td>

<td><?php echo $row['incident_date']; ?></td>

<td><?php echo $row['status']; ?></td>

</tr>

<?php } ?>

<form method="GET">

<select name="status">

<option value="">All Status</option>

<option value="Open">Open</option>

<option value="Investigating">Investigating</option>

<option value="Resolved">Resolved</option>

<option value="Closed">Closed</option>

</select>

<button type="submit">Filter</button>

</form>

<br>

</table>

<br>

<a href="dashboard.php">

← Back to Dashboard

</a>

</div>
<div>
<form method="GET">
<select name="status">
<option value="">All Status</option>
<option>Open</option>
<option>Investigating</option>
<option>Resolved</option>
<option>Closed</option>
</select>

<button type="submit">Filter</button>
</form>
</div>

</body>
</html>
