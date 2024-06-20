<?php
// Pengaturan koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "RentalKomik";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>
