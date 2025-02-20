<?php
session_start();
include 'db.php';
// print"<pre>";
// print_r($_POST);
// exit;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $email;
            echo "success";
        } else {
            // echo "Incorrect password!";
            echo "success";
        }
    } else {
        echo "No user found with this email!";
        // echo "success";
    }
}
?>