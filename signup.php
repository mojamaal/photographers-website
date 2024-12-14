
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$User_ID = (int) $_POST['User_ID'];
$Username = $_POST['Username'];
$Password = $_POST['Password'];
$Email = $_POST['Email'];



// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO `sign up` (User_ID, Username, Password, Email) VALUES (?, ?, ?, ?)");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("isss", $User_ID, $Username, $Password, $Email);

    $execval = $stmt->execute();
    if ($execval === false) {
        die("Execute failed: " . $stmt->error);
    } else {
        echo $execval;
        echo "Sign up successful...";
    }

    $stmt->close();
    $conn->close();
}
?>
