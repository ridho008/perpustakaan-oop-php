<?php  
require '../config/peminjaman.php';
$db = new Peminjaman();
$id_peminjaman = $_GET['id'];
if($db->appovedBuku($id_peminjaman) > 0) {
   echo "<script>alert('Buku Berhasil Di Setujui.');window.location='?page=peminjaman';</script>";
} else {
   echo "<script>alert('Buku GAGAL Di Setujui.');window.location='?page=peminjaman&act=edit';</script>";
}
?>