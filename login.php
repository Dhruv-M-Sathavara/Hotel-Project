<?php
session_start();
$conn = new mysqli("localhost", "root", "12345678", "hotel_booking");

$email = $_POST['email'];
$password = $_POST['password'];

$result = $conn->query("SELECT * FROM users WHERE email = '$email'");
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    header("Location: book.html");
} else {
    echo "Invalid credentials.";
}
?>
