<?php
include("auth_session.php");
?>


<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "rootdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Retrieve the data sent via the AJAX request
$name = $_SESSION['username'];
$level = $_POST['finalLevel'];
$marks = $_POST['finalMarks'];


// Prepare the insert query
// $sql = "INSERT INTO leaderboard (userName, marks, level) VALUES ('$name', '$marks', 'level')";
$sql = "INSERT INTO leaderboard (userName, marks, level)
VALUES ('$name', '$marks', '$level')";

// Execute the insert query
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
