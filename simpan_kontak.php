<?php
include "admin/koneksi.inc.php";

// Memulai sesi
session_start();

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menghindari SQL Injection
$vid = $conn->real_escape_string($_POST['id']);
$vnama = $conn->real_escape_string($_POST['nama']);
$vjkel = $conn->real_escape_string($_POST['jkel']);
$vemail = $conn->real_escape_string($_POST['email']);
$valamat = $conn->real_escape_string($_POST['alamat']);
$vkota = $conn->real_escape_string($_POST['kota']);
$vpesan = $conn->real_escape_string($_POST['pesan']);

// Prepared Statement untuk menghindari SQL Injection
$sql = "INSERT INTO kontak (id, Nama, jkel, Email, Alamat, Kota, Pesan) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssss", $vid, $vnama, $vjkel, $vemail, $valamat, $vkota, $vpesan);

if ($stmt->execute()) {
    $_SESSION['success'] = "Data berhasil disimpan";
    header("Location: cetak.php"); // Redirect ke halaman yang dapat menampilkan pesan sukses
    exit();
}

$stmt->close();
$conn->close();
?>