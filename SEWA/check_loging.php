<?php
session_start();

if (isset($_SESSION['user'])) {
    echo "logged_in";  // User is logged in
} else {
    echo "not_logged_in"; // User is not logged in
}
?>