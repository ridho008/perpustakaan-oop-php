<?php 
require '../config/buku.php';
$db = new Buku();
$id_buku = $_GET['id'];
$buku = $db->deleteBook($id_buku);
if($id_buku) {
      echo "<script>alert('Data Buku Berhasil Dihapus.');window.location='?page=buku';</script>";
   } else {
      echo "<script>alert('Data Buku Gagal Dihapus.');window.location='?page=buku';</script>";
   }
?>