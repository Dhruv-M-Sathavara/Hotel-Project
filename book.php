<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to book.");
}

$conn = new mysqli("localhost", "root", "12345678", "hotel_booking");

$fullName = $_POST['fullName'];
$idNo = $_POST['idNo'];
$person = $_POST['Person'];
$address = $_POST['address'];
$arrivingDate = $_POST['arrivingDate'];
$roomType = $_POST['roomType'];
$meal = isset($_POST['mealOption']) ? 1 : 0;
$user_id = $_SESSION['user_id'];

$stmt = $conn->prepare("INSERT INTO bookings (user_id, full_name, id_no, person_count, address, arriving_date, room_type, meal_included) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ississsi", $user_id, $fullName, $idNo, $person, $address, $arrivingDate, $roomType, $meal);
$stmt->execute();

echo "Booking successful!";
?>
