<?php
require 'database.php';
class Buku extends Database
{
   function getAllBooks()
   {
      $data = $this->koneksi->query("SELECT * FROM buku");
      while($row = $data->fetch_assoc()){
         $hasil[] = $row;
      }
      return $hasil;
   }

   function insertBook($data)
   {
      $judul = htmlspecialchars($data["judul"]);
      $penulis = htmlspecialchars($data["penulis"]);
      $penerbit = htmlspecialchars($data["penerbit"]);
      $tahun = htmlspecialchars($data["tahun"]);

      // cek gambar
      $fotoName = $_FILES['foto_buku']['name'];
      $tmpName = $_FILES['foto_buku']['tmp_name'];
      $FotoSize = $_FILES['foto_buku']['size'];
      $FotoError = $_FILES['foto_buku']['error'];

      if($FotoError == 4) {
         $this->koneksi->query("INSERT INTO buku VALUES (null, '$judul', '$penulis', '$penerbit', '$tahun', 'default.jpg') ") or die(mysqli_error($this->koneksi));
         return 1;
      }

      $ektensiValid = ['jpg', 'png'];
      $ektensiFoto = explode('.', $fotoName);
      $ektensiFoto = strtolower(end($ektensiFoto));

      if($FotoSize > 1000000) {
         echo "<script>alert('Ukuran foto harus dibawah 1MB.')</script>";
         return false;
      }

      // acak nama foto
      $namaFileBaru = uniqid();
      $namaFileBaru .= '.';
      $namaFileBaru .= $ektensiFoto;

      move_uploaded_file($tmpName, '../uploads/buku/' . $namaFileBaru);
      $this->koneksi->query("INSERT INTO buku VALUES (null, '$judul', '$penulis', '$penerbit', '$tahun', '$namaFileBaru') ") or die(mysqli_error($this->koneksi));
      return $namaFileBaru;
      return $this->koneksi->affected_rows;
   }

   function getByIdBook($id_buku)
   {
      $query = mysqli_query($this->koneksi,"SELECT * FROM buku WHERE id_buku = '$id_buku'");
      return $query->fetch_assoc();
   }

   function updateBook($data)
   {
      $id_buku = htmlspecialchars($data["id_buku"]);
      $judul = htmlspecialchars($data["judul"]);
      $penulis = htmlspecialchars($data["penulis"]);
      $penerbit = htmlspecialchars($data["penerbit"]);
      $tahun = htmlspecialchars($data["tahun"]);

      // cek gambar
      $fotoName = $_FILES['foto_buku']['name'];
      $tmpName = $_FILES['foto_buku']['tmp_name'];
      $FotoSize = $_FILES['foto_buku']['size'];
      $FotoError = $_FILES['foto_buku']['error'];

      if($FotoError == 4) {
         $this->koneksi->query("UPDATE buku SET judul = '$judul', penulis = '$penulis', penerbit = '$penerbit', tahun = '$tahun', foto_buku = 'default.jpg' WHERE id_buku = '$id_buku'") or die(mysqli_error($this->koneksi));
         return 1;
      }

      $ektensiValid = ['jpg', 'png'];
      $ektensiFoto = explode('.', $fotoName);
      $ektensiFoto = strtolower(end($ektensiFoto));

      if($FotoSize > 1000000) {
         echo "<script>alert('Ukuran foto harus dibawah 1MB.')</script>";
         return false;
      }

      // acak nama foto
      $namaFileBaru = uniqid();
      $namaFileBaru .= '.';
      $namaFileBaru .= $ektensiFoto;

      move_uploaded_file($tmpName, '../uploads/buku/' . $namaFileBaru);
      $this->koneksi->query("UPDATE buku SET judul = '$judul', penulis = '$penulis', penerbit = '$penerbit', tahun = '$tahun', foto_buku = '$namaFileBaru' WHERE id_buku = '$id_buku'") or die(mysqli_error($this->koneksi));
      return $namaFileBaru;
      return $this->koneksi->affected_rows;
   }

   function deleteBook($id_buku)
   {
      $this->koneksi->query("DELETE FROM buku WHERE id_buku = '$id_buku'") or die(mysqli_error($this->koneksi));
   }

   function getJoinByIdMemberUser($id_user)
   {
      $query = mysqli_query($this->koneksi,"SELECT * FROM anggota INNER JOIN user ON anggota.id_user = user.id_user WHERE anggota.id_user = '$id_user'") or die(mysqli_error($this->koneksi));
      return $query->fetch_assoc();
   }

   // Keranjang Belanja
   public function checkSaleBook($id_buku, $idUser)
   {
      //di cek dulu apakah barang yang di beli sudah ada di tabel keranjang
      // $sql = $this->koneksi->query("SELECT id_buku FROM peminjaman WHERE id_buku = '$id_buku'") or die(mysqli_error($this->koneksi));
      //    $ketemu = $sql->num_rows;
      //    if ($ketemu == 0){
      //       // kalau barang belum ada, maka di jalankan perintah insert
      //       $this->koneksi->query("INSERT INTO peminjaman VALUES (null, '$idUser', '$id_buku')") or die(mysqli_error($this->koneksi));
      //    } else {
      //       echo "<script>alert('Buku sudah anda pinjam, tidak bisa meminjam lagi.');window.location='?page=checkout';</script>";
      //    }
 
         // header('Location: ?page=checkout');


   }

   public function cekSaja($id_buku, $idUser)
   {
      // $cekPeminjaman = $this->koneksi->query("SELECT id_anggota FROM peminjaman WHERE id_anggota = '$idUser'") or die(mysqli_error($this->koneksi));
      // $result = $cekPeminjaman->num_rows;
      // apakah transaksi peminjaman sudah ada ditable peminjaman ??
      // if($result == 0) {
         
      // } else {
      //    echo "<script>alert('Buku sudah anda pinjam, tidak bisa meminjam lagi.');window.location='index.php';</script>";
      // }
      $sql = $this->koneksi->query("SELECT * FROM buku WHERE id_buku = '$id_buku'") or die(mysqli_error($this->koneksi));
         $result = $sql->fetch_object();

         $idBuku = $result->judul;
         $judulBuku = $result->judul;
         $fotoBuku = $result->foto_buku;
         // var_dump($judulBuku, $fotoBuku);

         $_SESSION['cart'][$id_buku] = [
            "id" => $id_buku,
            "judul" => $judulBuku,
            "foto" => $fotoBuku,
         ];
         var_dump($_SESSION['cart']);
   }

   public function deleteCart($id_buku)
   {
      unset($_SESSION['cart'][$id_buku]);
   }

   public function insertPeminjaman($data, $id_user)
   {
      $tgl_transaksi = date('Y-m-d');
      $cekPeminjaman = $this->koneksi->query("SELECT id_anggota FROM peminjaman WHERE id_anggota = '$id_user'") or die(mysqli_error($this->koneksi));
      $result = $cekPeminjaman->num_rows;
      if($result == 0) {
         $sql = $this->koneksi->query("INSERT INTO peminjaman (id_anggota, tgl_transaksi, status) VALUES ('$id_user', '$tgl_transaksi', '0')") or die(mysqli_error($this->koneksi));

         if($sql) {
            $current_id_peminjaman = $this->koneksi->insert_id;
            foreach($_SESSION['cart'] as $cart => $val) {
               $tgl_pinjam = $data['tgl_pinjam'];
               $tgl_kembali = $data['tgl_kembali'];
               $this->koneksi->query("INSERT INTO detail_pinjaman (id_peminjaman, id_anggota, id_buku, tgl_pinjam, tgl_kembali) VALUES ('$current_id_peminjaman', '$id_user', '$cart', '$tgl_pinjam', '$tgl_kembali')") or die(mysqli_error($this->koneksi));
            }
            echo "<script>alert('Berhasil transaksi peminjaman buku.');window.location='index.php';</script>";
            // menghapus smua isi keranjang
            unset($_SESSION['cart']);
         }
      } else {
         echo "<script>alert('Anda masih ada transaksi yang belum disetujui admin. silahkan tunggu...!');window.location='index.php';</script>";
         unset($_SESSION['cart']);
      }
      
   }

   function getDataCart($id_user)
   {
      $query = $this->koneksi->query("SELECT * FROM peminjaman INNER JOIN anggota ON anggota.id_user = peminjaman.id_anggota INNER JOIN buku ON buku.id_buku = peminjaman.id_buku WHERE peminjaman.id_anggota = '$id_user'") or die(mysqli_error($this->koneksi));
      while($row = $query->fetch_object()) {
         $hasil[] = $row;
      }
      return $hasil;
   }

   // ini function utk mengambil smua tb peminjaman
   /*
   id_anggota itu sama saja dgn id_user, karna salah tulis di tbnya
   */
   public function getAllPeminjamanWhereIdUser($id_user)
   {
      $data = [];
      $sql = $this->koneksi->query("SELECT * FROM peminjaman WHERE id_anggota = '$id_user'") or die(mysqli_error($this->koneksi));
      while($row = $sql->fetch_array()){
         $data[] = $row;
      }
      return $data;
   }

   public function saveDateTransaction($data, $jml)
   {
      for ($i = 1; $i < $jml; $i++){
         $tgl_pinjam = $data['tgl_pinjam'][$i];
         $tgl_kembali = $data['tgl_kembali'][$i];
         $id_anggota = $pinjam[$i]['id_anggota'];
         $id_buku = $pinjam[$i]['id_buku'];
         var_dump($id_anggota,$id_buku, $tgl_pinjam, $tgl_kembali);
         $this->koneksi->query("INSERT INTO peminjaman VALUES (null, '$id_anggota', '$id_buku')") or die(mysqli_error($this->koneksi));
         echo "berhasil";
      }
   }

   // Pembelian
   public function getPeminjamanBukuByUser($id_user)
   {
      $sql = $this->koneksi->query("
         SELECT * FROM detail_pinjaman 
         INNER JOIN peminjaman ON detail_pinjaman.id_anggota = peminjaman.id_anggota
         INNER JOIN buku ON detail_pinjaman.id_buku = buku.id_buku
         WHERE detail_pinjaman.id_anggota = '$id_user'") or die(mysqli_error($this->koneksi));

      while ($row = $sql->fetch_assoc()) {
         $data[] = $row;
      }

      return (!empty($data) ? $data : '');
   }

   public function konfirmasiSemuaBuku($id_peminjaman)
   {
      $pembelian = $this->koneksi->query("UPDATE peminjaman SET status = '2' WHERE id_peminjaman = '$id_peminjaman'") or die(mysqli_error($this->koneksi));
      if($pembelian) {
         echo "<script>alert('Terima Kasih Sudah Mengkonfirmasi Kepada kami.');window.location='?page=pembelian';</script>";
      } else {
         echo "<script>alert('Gagal Konfirmasi.');window.location='?page=pembelian';</script>";
      }
   }
   // ?page=pembelian&act=konfirmasi&id=1

   public function getPeminjamanByIdUser($id_user)
   {
      $query = $this->koneksi->query("SELECT id_anggota, status FROM peminjaman WHERE id_anggota = '$id_user'");
      return $query->fetch_assoc();
   }
}