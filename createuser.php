<?php
// Your database connection information
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "people";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming data is sent via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bugTitle = $_POST['bugTitle'];
    $bugDescription = $_POST['bugDescription'];
    $bugSeverity = $_POST['bugSeverity'];
    $issueTitle = $_POST['issueTitle'];
    $issueDescription = $_POST['issueDescription'];
    $issueSeverity = $_POST['issueSeverity'];

    // Using prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO Bugstore (BugTitle, BugDescription, Severity, IssueTitle, IssueDescription, Severity2) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $bugTitle, $bugDescription, $bugSeverity, $issueTitle, $issueDescription, $issueSeverity);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>