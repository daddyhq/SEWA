<?php
// Include database connection
$servername = "localhost";  // Your server name (e.g., localhost)
$username = "root";         // Your database username (default for XAMPP is 'root')
$password = "";             // Your database password (default for XAMPP is empty)
$dbname = "SEWA";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare SQL query
    $sql = "INSERT INTO contact_form_submissions (name, email, message) 
            VALUES ('$name', '$email', '$message')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>