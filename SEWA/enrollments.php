<?php
// Include database connection
$servername = "localhost";  // Your server name (e.g., localhost)
$username = "root";         // Your database username (default for XAMPP is 'root')
$password = "";             // Your database password (default for XAMPP is empty)
$dbname = "SEWA";  // Replace with your database name

// Start the session to access session variables
session_start();

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        // If the user is logged in, use the user_id from the session
        $user_id = $_SESSION['user_id'];
    } else {
        // If not logged in, leave user_id empty (or assign a default value if needed)
        $user_id = '';
    }

    // Get form data (assuming the course name and email are submitted)
    $course_name = $_POST['course_name'];  // The course the user is enrolling in
    $email = $_POST['email'];  // The user's email

    // Prepare SQL query to insert the enrollment data
    $sql = "INSERT INTO enrollments (enrollment_id , course_name, email) 
            VALUES ('$user_id', '$course_name', '$email')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        echo "You have successfully enrolled in the course!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>