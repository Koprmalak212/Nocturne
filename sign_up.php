<?php
session_start(); // Start a new session or resume the existing one

require 'db.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database credentials
    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "nocturne";

    // Input sanitization & validation
    $username = trim($_POST['username']); // Remove spaces from beginning and end of username
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL); // Sanitize the email address

    // Check if the email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }

    // Check if the password field is empty
    if (empty($_POST['password'])) {
        die("Password cannot be empty.");
    }

    // Hash the password for secure storage
    $passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Check if the date is provided
    if (empty($_POST['date'])) {
        die("Date is required.");
    }

    $dateInput = $_POST['date'];
    $formattedDate = date('Y-m-d', strtotime($dateInput)); // Format date to SQL format (YYYY-MM-DD)

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO users (username, email, password, date) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Preparation failed: " . $conn->error);
    }

    // Bind the parameters to the statement
    $stmt->bind_param("ssss", $username, $email, $passwordHash, $formattedDate);

    // Execute and check for success
    if ($stmt->execute()) {
        // Redirect to index.php if successful
        $stmt->close();
        $conn->close();
        header("Location: index.php");
        exit;
    } else {
        echo "Error creating account: " . $stmt->error;
    }

    // Clean up resources
    $stmt->close();
    $conn->close();
}