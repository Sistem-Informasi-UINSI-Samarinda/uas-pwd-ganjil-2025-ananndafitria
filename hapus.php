<?php
include "config/koneksi.php";

// Cek apakah ID ada di URL
if (!isset($_GET['id'])) {
    echo "<script>alert('ID tidak ditemukan!'); window.location='data.php';</script>";
    exit;
}

$id = $_GET['id'];

// Ambil data untuk cek gambar
$cek = mysqli_query($conn, "SELECT gambar FROM bunga WHERE id='$id'");
$data = mysqli_fetch_assoc($cek);

// Jika data tidak ditemukan
if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location='data.php';</script>";
    exit;
}

// Hapus gambar jika ada
if (!empty($data['gambar']) && file_exists("image/" . $data['gambar'])) {
    unlink("image/" . $data['gambar']);
}

// Hapus data dari database
$delete = mysqli_query($conn, "DELETE FROM bunga WHERE id='$id'");

if ($delete) {
    echo "<script>alert('Data berhasil dihapus!'); window.location='data.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus data!'); window.location='data.php';</script>";
}
?>
