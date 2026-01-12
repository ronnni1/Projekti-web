<?php
$host = "localhost";
$user = "root";
$password = ""; // ose passwordi yt
$dbname = "projekti_web";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Lidhja dështoi: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    $name = isset($_POST["name"]) ? $conn->real_escape_string($_POST["name"]) : '';
    $email = isset($_POST["email"]) ? $conn->real_escape_string($_POST["email"]) : '';
    $message = isset($_POST["message"]) ? $conn->real_escape_string($_POST["message"]) : '';

    if ($name == '' || $email == '' || $message == '') {
        echo "Gabim: Të gjitha fushat janë të detyrueshme.";
    } else {
        $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";
        if ($conn->query($sql) === TRUE) {
            echo "Mesazhi u dërgua me sukses!";
        } else {
            echo "Gabim: " . $conn->error;
        }
    }
}
?>