<?php 
require '../config/pengguna.php';
$db = new Pengguna();
$id_user = $_GET['id'];
$user = $db->deleteUser($id_user);
if($user) {
      echo "<script>alert('Data Pengguna Berhasil Dihapus.');window.location='?page=pengguna';</script>";
   } else {
      echo "<script>alert('Data Pengguna Gagal Dihapus.');window.location='?page=pengguna';</script>";
   }
?>