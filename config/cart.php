<?php 
require 'database.php';
class Keranjang extends Database
{
   public function getByIdCart($id_buku)
   {
      $query = mysqli_query($this->koneksi,"SELECT * FROM buku WHERE id_buku = '$id_buku'");
      return $query->fetch_object();
   }
}