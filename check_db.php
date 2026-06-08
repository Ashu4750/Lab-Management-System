<?php
// Database connection parameters
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "lab";

// Create connection
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "<h2>Connection successful!</h2>";

// Check users table structure
$sql = "DESCRIBE users";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "<p>Error getting users table structure: " . mysqli_error($conn) . "</p>";
} else {
    echo "<h3>Users Table Structure:</h3>";
    echo "<table border='1'>";
    echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th></tr>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['Field'] . "</td>";
        echo "<td>" . $row['Type'] . "</td>";
        echo "<td>" . $row['Null'] . "</td>";
        echo "<td>" . $row['Key'] . "</td>";
        echo "<td>" . ($row['Default'] === NULL ? 'NULL' : $row['Default']) . "</td>";
        echo "<td>" . $row['Extra'] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
}

// Check if there are any users in the table
$sql = "SELECT COUNT(*) as total FROM users";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo "<p>Total users in database: " . $row['total'] . "</p>";

// Close connection
mysqli_close($conn);
?> 