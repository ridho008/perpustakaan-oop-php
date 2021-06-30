<?php 
require '../config/anggota.php';
$db = new Anggota();
$id_anggota = $_GET['id'];
$anggota = $db->deleteMember($id_anggota);
if($anggota) {
      echo "<script>alert('Data Mahasiswa Berhasil Dihapus.');window.location='?page=anggota';</script>";
   } else {
      echo "<script>alert('Data Mahasiswa Gagal Dihapus.');window.location='?page=anggota';</script>";
   }
?>