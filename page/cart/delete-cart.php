<?php 

$id_buku = $_GET['id'];
$row = $buku->deleteCart($id_buku);
echo "<script>alert('Buku berhasil dihapus dari keranjang.');window.location='?page=cart';</script>";
?>