<!DOCTYPE html>
<html>
<head>
    <title>View Photos</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: aqua;">

<header style="background-color: greenyellow; color: white; text-align: center; padding: 20px;">
    <h1>View Photos</h1>
</header>

<nav style="background-color: red; padding: 10px; text-align: center;">
    <a href="admin_panel.html" style="color: yellow; text-decoration: none; margin: 0 15px;">Admin Panel</a>
</nav>

<div style="text-align: center; margin-top: 50px;">
    <h2>Photo Table</h2>
    <?php
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'test');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //view photo table
    $sql = "SELECT * FROM photo";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1' style='margin: 0 auto;'>";
        echo "<tr><th>Photo ID</th><th>Photo Type</th><th>Photo Price</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['photo_ID']}</td>
                    <td>{$row['photo_type']}</td>
                    <td>{$row['photo_price']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No photo data found</p>";
    }

    // Closing the connection
    $conn->close();
    ?>
</div>

</body>
</html>
