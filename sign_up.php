<?php

session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Trim whitespace
    $username = trim($_POST['username']);


    // Clean email of illegal letters like !
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    // Then validate the sanitized email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // show an error message
        echo("Invalid email format!");
    }


    // Hash passwords for security purposes
    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Directly stores the date input because form is date input
    $date = $_POST['date'];
    $euDate = date('d-m-Y', strtotime($date));
}

//Connect to database

//Credentials
$servername = "localhost"; // Duh
$username = "root";   // Default for XAMPP
$password = "";       // Empty if no password set
$dbname = "nocturne"; // Database name

//Connect
$conn = mysqli_connect(
    "localhost", "root", "", "nocturne");
// Check connection
if (!$conn) {
    echo("Connection failed: " . mysqli_connect_error());
}

// Add sql query placeholders bc no dropdatabase
$sql = "INSERT INTO users (username, email, password, date) VALUES (?, ?, ?, ?)"; // ?=placeholder

// prepare statement
$stmt = $conn->prepare($sql);
// check if it worked if not give error
if (!$stmt) {
    echo("Prepare failed: " . mysqli_error($conn));
}

// Bind parameters to the statement
$stmt->bind_param("ssss", $username, $email, $hash, $date);

// execute statement
if ($stmt->execute()) {
    echo "Account created successfully";
    // Redirect after success
    header("location: index.php");
} else {
    // or give error if it fails
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close(); // Closes statement
$conn->close(); // Closes connection
