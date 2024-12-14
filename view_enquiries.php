<!DOCTYPE html>
<html>
<head>
    <title>View Enquiries</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: aqua;">

<header style="background-color: greenyellow; color: white; text-align: center; padding: 20px;">
    <h1>View Enquiries</h1>
</header>

<nav style="background-color: red; padding: 10px; text-align: center;">
    <a href="admin_panel.html" style="color: yellow; text-decoration: none; margin: 0 15px;">Admin Panel</a>
</nav>

<div style="text-align: center; margin-top: 50px;">
    <h2>Enquiries</h2>

    <?php
    

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'test');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
// view enquiries table
    $sql = "SELECT contact_details, location, date, enquiry_ID, user_ID, email FROM enquiries";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1' style='margin: 0 auto;'>";
        echo "<tr><th>Contact Details</th><th>Location</th><th>Date</th><th>Enquiry ID</th><th>User ID</th><th>Email</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['contact_details']}</td>
                    <td>{$row['location']}</td>
                    <td>{$row['date']}</td>
                    <td>{$row['enquiry_ID']}</td>
                    <td>{$row['user_ID']}</td>
                    <td>{$row['email']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p> enquiries not found</p>";
    }
    
    // Closing the connection
    $conn->close();
    ?>
</div>

</body>
</html>
