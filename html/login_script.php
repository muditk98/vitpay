<!DOCTYPE html>
<head>
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$database = "vitpay";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
echo "Connected successfully";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "SELECT * FROM User;";
$result = $conn->query($sql);
echo "<br>";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "FirstName: " . $row["FirstName"]. " - LastName: " . $row["LastName"] . "<br>";
    }
} else {
    echo "0 results";
}


$conn->close();
?>		
</body>
</html>
