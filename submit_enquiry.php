<?php
// Checking if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from form
    $contact_details = $_POST['contact_details'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $enquiry_ID = $_POST['enquiry_ID'];
    $user_ID = $_POST['user_ID'];
    $email = $_POST['email'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'test');

    // Checking connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO enquiries (contact_details, location, date, enquiry_ID, user_ID, email) VALUES (?, ?, ?, ?, ?, ?)");

    // Bind parameters and execute the statement
    $stmt->bind_param("sssiis", $contact_details, $location, $date, $enquiry_ID, $user_ID, $email);
    $stmt->execute();

    // Checking if the insertion was successful
    if ($stmt->affected_rows > 0) {
        echo "Enquiry submitted successfully!";
    } else {
        echo "Error: Unable to submit enquiry.";
    }


    $stmt->close();
    $conn->close();
} else {
    // Redirect to the form page If the form isn't  submitted
    header("Location: enquiryform.html");
    exit();
}
?>
