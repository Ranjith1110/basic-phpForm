<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $labName = $_POST['labName'];
    $timing = $_POST['timing'];
    $city = $_POST['city'];
    $state = $_POST['state'];

    $stmt = $conn->prepare("INSERT INTO bookings (name, email, phone, labName, timing, city, state) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $name, $email, $phone, $labName, $timing, $city, $state);

    if ($stmt->execute()) {
        echo "Booking successfully saved!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
