<?php
$host = "localhost";
$user = "root";
$password = ""; // your password if any
$dbname = "projekti_web";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $name = isset($_POST["name"]) ? $conn->real_escape_string($_POST["name"]) : '';
    $email = isset($_POST["email"]) ? $conn->real_escape_string($_POST["email"]) : '';
    $message = isset($_POST["message"]) ? $conn->real_escape_string($_POST["message"]) : '';

    if ($name == '' || $email == '' || $message == '') {
        echo "Error: All fields are required.";
    } else {
        $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";
        if ($conn->query($sql) === TRUE) {
            echo "Message sent successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>