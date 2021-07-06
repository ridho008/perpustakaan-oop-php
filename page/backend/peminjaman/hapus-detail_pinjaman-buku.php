<?php  
require '../config/peminjaman.php';
$db = new Peminjaman();
$id_peminjaman = $_GET['id'];
if($db->deleteDetailPinjamanBuku($id_peminjaman) > 0) {
   echo "<script>alert('Transaksi Peminjaman Buku Berhasil Di Hapus.');window.location='?page=peminjaman';</script>";
} else {
   echo "<script>alert('Transaksi Peminjaman Buku GAGAL Di Hapus.');window.location='?page=peminjaman';</script>";
}
?>