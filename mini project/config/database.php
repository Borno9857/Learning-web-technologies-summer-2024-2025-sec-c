<?php
// Database configuration
define('DB_SERVER', 'localhost');  // Database server (usually localhost)
define('DB_USERNAME', 'your_database_username');  // Replace with your MySQL username
define('DB_PASSWORD', 'your_database_password');  // Replace with your MySQL password
define('DB_DATABASE', 'your_database_name');  // Replace with your database name

// Establish the database connection using PDO
try {
    // PDO connection string for MySQL
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_DATABASE, DB_USERNAME, DB_PASSWORD);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Optional: Uncomment this if you want to see when the connection is successful
    // echo "Connected successfully to the database.";
    
} catch (PDOException $e) {
    // If there is an error during connection, display the error message
    die("Connection failed: " . $e->getMessage());
}
?>
