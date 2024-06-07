<?php
$servername = "localhost";
$username = "root";
$password = "022531";
$dbname = "hotel_reservations";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
