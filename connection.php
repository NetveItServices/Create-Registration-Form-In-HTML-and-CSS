<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$full_name = $_POST['full_name'];
$email_address = $_POST['email_address'];
$mobile_number = $_POST['mobile_number'];
$birthdate = $_POST['birthdate'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$country = $_POST['country'];
$pin = $_POST['pin'];

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO registration (full_name, email_address, mobile_number, birthdate, gender, address, country, pin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssissssi", $full_name, $email_address, $mobile_number, $birthdate, $gender, $address, $country, $pin);
    $stmt->execute();
    echo "Registration successful";
    $stmt->close();
    $conn->close();
}