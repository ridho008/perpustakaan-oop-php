<?php
require 'database.php';
class Peminjaman extends Database
{
   function getPeminjamanGetByStatus($status)
   {
      $sql = $this->koneksi->query("
         SELECT * FROM peminjaman 
         INNER JOIN user ON peminjaman.id_anggota = user.id_user 
         WHERE peminjaman.status = '$status'") or die(mysqli_error($this->koneksi));

      while ($row = $sql->fetch_assoc()) {
         $data[] = $row;
      }

      return (!empty($data) ? $data : '');
   }

   function getAllPeminjamanUser()
   {
      $sql = $this->koneksi->query("
         SELECT * FROM peminjaman 
         INNER JOIN detail_pinjaman ON peminjaman.id_anggota = detail_pinjaman.id_anggota
         INNER JOIN user ON peminjaman.id_anggota = user.id_user
         ORDER BY detail_pinjaman.tgl_pinjam, detail_pinjaman.tgl_kembali ASC
         ") or die(mysqli_error($this->koneksi));

      while ($row = $sql->fetch_assoc()) {
         $data[] = $row;
      }

      return (!empty($data) ? $data : '');
   }

   function getDaftarBukuByUser($status)
   {
      $sql = $this->koneksi->query("
         SELECT *, detail_pinjaman.id_peminjaman AS id FROM detail_pinjaman
                        INNER JOIN buku ON detail_pinjaman.id_buku = buku.id_buku
                        INNER JOIN peminjaman ON detail_pinjaman.id_anggota = peminjaman.id_anggota
                        INNER JOIN user ON peminjaman.id_anggota = user.id_user
                        WHERE peminjaman.status = '$status'
         ") or die(mysqli_error($this->koneksi));

      while ($row = $sql->fetch_assoc()) {
         $data[] = $row;
      }

      return (!empty($data) ? $data : '');
   }

   function appovedBuku($id_peminjaman)
   {
      $sql = $this->koneksi->query("UPDATE peminjaman SET status = '1' WHERE id_peminjaman = '$id_peminjaman'") or die(mysqli_error($this->koneksi));
      return $this->koneksi->affected_rows;
   }

   function deleteDetailPinjamanBuku($id_peminjaman)
   {
      $findDetailPeminjaman = $this->koneksi->query("SELECT * FROM detail_pinjaman WHERE id_peminjaman = '$id_peminjaman'") or die(mysqli_error($this->koneksi));
      $resultDetailPeminjaman = $findDetailPeminjaman->fetch_assoc();
      // var_dump($resultDetailPeminjaman, $id_peminjaman); die;
      $countDetailPeminjaman = count($resultDetailPeminjaman);
      // var_dump($resultDetailPeminjaman['id_peminjaman']); die;
      $sqlPeminjaman = $this->koneksi->query("DELETE FROM peminjaman WHERE id_peminjaman = '$id_peminjaman'") or die(mysqli_error($this->koneksi));

      if($resultDetailPeminjaman) {
         for ($i=0; $i < $countDetailPeminjaman; $i++) { 
            $this->koneksi->query("DELETE FROM detail_pinjaman WHERE id_peminjaman = '$id_peminjaman'") or die(mysqli_error($this->koneksi));
            return $this->koneksi->affected_rows;
         }
      }

   }

   function daftarBukuPeminjamanUser()
   {
      $id = $_POST['id'];
      $sql = $this->koneksi->query("SELECT * FROM peminjaman WHERE id_peminjaman = '$id'") or die(mysqli_error($this->koneksi));
      $row = $sql->fetch_assoc();
      echo json_encode($row);
   }



   

   
}