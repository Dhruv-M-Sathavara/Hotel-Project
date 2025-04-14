<?php
$conn = new mysqli("localhost", "root", "12345678", "hotel_booking");

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $email, $password);
$stmt->execute();

header("Location: loginpage.html");
?>
