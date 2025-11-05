<?php
$host = "localhost";
$user = "root"; // default XAMPP
$pass = "";
$db   = "db_mahasiswa";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die(json_encode([
        "success" => false,
        "message" => "Koneksi gagal: " . $conn->connect_error
    ]));
}
?>
