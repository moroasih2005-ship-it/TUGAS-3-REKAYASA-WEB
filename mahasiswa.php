<?php
include "config.php";
header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM mahasiswa WHERE id=$id";
            $result = $conn->query($sql);
            echo json_encode($result->fetch_assoc());
        } else {
            $sql = "SELECT * FROM mahasiswa";
            $result = $conn->query($sql);
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode($data);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $nama = $data['nama'];
        $nim = $data['nim'];
        $jurusan = $data['jurusan'];
        $sql = "INSERT INTO mahasiswa (nama, nim, jurusan, created_at, updated_at)
                VALUES ('$nama', '$nim', '$jurusan', NOW(), NOW())";
        echo json_encode(["success" => $conn->query($sql)]);
        break;

    case 'PUT':
        $id = $_GET['id'];
        $data = json_decode(file_get_contents("php://input"), true);
        $nama = $data['nama'];
        $nim = $data['nim'];
        $jurusan = $data['jurusan'];
        $sql = "UPDATE mahasiswa SET nama='$nama', nim='$nim', jurusan='$jurusan', updated_at=NOW() WHERE id=$id";
        echo json_encode(["success" => $conn->query($sql)]);
        break;

    case 'DELETE':
        $id = $_GET['id'];
        $sql = "DELETE FROM mahasiswa WHERE id=$id";
        echo json_encode(["success" => $conn->query($sql)]);
        break;

    default:
        echo json_encode(["message" => "Metode tidak dikenali"]);
        break;
}
?>
