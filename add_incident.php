<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

require 'config.php';

$message = "";

if(isset($_POST['submit'])){

    $incident_id = trim($_POST['incident_id']);
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $incident_type = trim($_POST['incident_type']);
    $reporter = trim($_POST['reporter']);
    $incident_date = $_POST['incident_date'];
    $status = $_POST['status'];

    $check = $conn->prepare(
        "SELECT id FROM incidents WHERE incident_id=?"
    );

    $check->bind_param("s",$incident_id);
    $check->execute();
    $check->store_result();

    if($check->num_rows > 0){

        $message = "<p class='error'>
                    Incident ID already exists.
                    </p>";

    }else{

        $stmt = $conn->prepare(
            "INSERT INTO incidents
            (incident_id,title,description,
             incident_type,reporter,
             incident_date,status)
             VALUES(?,?,?,?,?,?,?)"
        );

        $stmt->bind_param(
            "sssssss",
            $incident_id,
            $title,
            $description,
            $incident_type,
            $reporter,
            $incident_date,
            $status
        );

        if($stmt->execute()){

            $message="<p class='message'>
                      Incident Recorded Successfully
                      </p>";

        }else{

            $message="<p class='error'>
                      Failed to save incident
                      </p>";

        }

        $stmt->close();
    }

    $check->close();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Record Incident</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

<h2>Record Security Incident</h2>

<?php echo $message; ?>

<form method="POST">

<input
type="text"
name="incident_id"
placeholder="Incident ID (INC001)"
required>

<input
type="text"
name="title"
placeholder="Incident Title"
required>

<textarea
name="description"
placeholder="Incident Description"
required></textarea>

<select name="incident_type" required>

<option value="">
Select Type
</option>

<option>
Malware
</option>

<option>
Phishing
</option>

<option>
Unauthorized Access
</option>

<option>
Data Breach
</option>

<option>
Denial of Service
</option>

<option>
Other
</option>

</select>

<input
type="text"
name="reporter"
placeholder="Reporter Name"
required>

<input
type="date"
name="incident_date"
required>

<select name="status" required>

<option value="">
Select Status
</option>

<option>
Open
</option>

<option>
Investigating
</option>

<option>
Resolved
</option>

<option>
Closed
</option>

</select>

<button name="submit">

Save Incident

</button>

</form>

<br>

<a href="dashboard.php">

← Back to Dashboard

</a>

</div>

</body>
</html>
