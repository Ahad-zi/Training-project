<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "training";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("SELECT * FROM user WHERE UserID = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Successful login
        header("Location: home.php"); // Replace with your home page
        exit;
    } else {
        // Invalid credentials
        echo "Invalid username or password";
    }

    $stmt->close();
}

$conn->close();
?>
