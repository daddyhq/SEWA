<?php
// Database connection
$servername = "localhost";
$username = "root"; // default username for XAMPP
$password = ""; // default password for XAMPP is empty
$dbname = "SEWA"; // replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// print"<pre>";
// print_r($dbname);
// exit;
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Handle signup request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input data
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists
    $sql = "SELECT id FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Email already exists!";
    } else {
        // Insert new user into the database
        $sql = "INSERT INTO users (full_name, email, phone_number, password) 
                VALUES ('$full_name', '$email', '$phone', '$hashed_password')";
        
        if ($conn->query($sql) === TRUE) {
            echo "success"; // Return success message
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>