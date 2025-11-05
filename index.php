<?php
header("Content-Type: application/json");

echo json_encode([
    "status" => true,
    "message" => "Selamat datang di API CRUD Mahasiswa!",
    "author" => "Moro Asih",
    "endpoints" => [
        "GET /mahasiswa.php" => "Ambil semua data mahasiswa",
        "GET /mahasiswa.php?id={id}" => "Ambil data mahasiswa berdasarkan ID",
        "POST /mahasiswa.php" => "Tambah data mahasiswa",
        "PUT /mahasiswa.php?id={id}" => "Ubah data mahasiswa",
        "DELETE /mahasiswa.php?id={id}" => "Hapus data mahasiswa"
    ]
], JSON_PRETTY_PRINT);
?>
