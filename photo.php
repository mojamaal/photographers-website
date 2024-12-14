<?php
// Checking if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $Photo_ID = $_POST['Photo_ID'];
    $photo_type = $_POST['photo_type'];
    $photo_price = $_POST['photo_price'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'test');

     // Checking connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

 
    $stmt = $conn->prepare("INSERT INTO photo (Photo_ID, photo_type, photo_price) VALUES (?, ?, ?)");

    // Bind parameters and execute the statement
    $stmt->bind_param("iss", $Photo_ID, $photo_type, $photo_price);
    $stmt->execute();

    // Checking if the insertion was successful
    if ($stmt->affected_rows > 0) {
        echo "Photo details successfully uploaded!";
    } else {
        echo "Error: Unable to upload photo details.";
    }

    // Closing the statement and database connection
    $stmt->close();
    $conn->close();
} else {
  // Redirect to the form page If the form isn't  submitted
    header("Location: photo.html");
    exit();
}
?>
