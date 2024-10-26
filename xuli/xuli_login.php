<?php
session_start(); // Start the session at the very beginning

include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!$conn) {
        die("Database connection failed!");
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM dangki WHERE tendangnhap = ? AND matkhau = ?");
    if ($stmt === false) {
        die("Error preparing the query: " . $conn->error);
    }

    // Bind parameters and execute the statement
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if login is successful
    if ($result->num_rows > 0) {
        // Store the username in the session
        $_SESSION['username'] = $username;

        // Redirect to main page
        header("Location: ../main.php");
        exit(); // Always call exit() after a redirect
    } else {
        echo "<script>alert('Invalid username or password!');</script>";
    }

    // Close the statement
    $stmt->close();
}
?>
