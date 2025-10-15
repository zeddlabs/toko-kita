<?php

include '../config/koneksi.php';

$id = $_GET['id'];

$query = "DELETE FROM produk WHERE id = $id";
$result = mysqli_query($conn, $query);

if ($result) {
  echo "<script>alert('Data berhasil dihapus!'); window.location.href = '/produk/index.php';</script>";
} else {
  echo "<script>alert('Data gagal dihapus!'); window.location.href = '/produk/index.php';</script>";
}