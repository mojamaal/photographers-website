<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connection successful.<br>";
}

// Test query
$sql = "SELECT contact_details, location, date, enquiry_ID, user_ID, email FROM enquiries";
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        echo "Query executed successfully.<br>";
        while($row = $result->fetch_assoc()) {
            echo "Contact: " . $row['contact_details'] . " - Location: " . $row['location'] . "<br>";
        }
    } else {
        echo "No records found.<br>";
    }
} else {
    echo "Error in query execution: " . $conn->error . "<br>";
}

$conn->close();
?>
