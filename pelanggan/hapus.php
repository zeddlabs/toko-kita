<?php

include '../config/koneksi.php';

$id = $_GET['id'];

$query_pelanggan = "SELECT * FROM pelanggan WHERE id = $id";
$result_pelanggan = mysqli_query($conn, $query_pelanggan);

$pelanggan = mysqli_fetch_assoc($result_pelanggan);

$query = "DELETE FROM users WHERE id = $pelanggan[user_id]";
$result = mysqli_query($conn, $query);

if ($result) {
  echo "<script>alert('Data berhasil dihapus!'); window.location.href = '/pelanggan/index.php';</script>";
} else {
  echo "<script>alert('Data gagal dihapus!'); window.location.href = '/pelanggan/index.php';</script>";
}