<?php 
require '../config/buku.php';
$db = new Buku();
// $data_buku = $db->getAllBooks();

if(isset($_POST['tambah'])) {
   if($db->insertBook($_POST) > 0) {
      echo "<script>alert('Data Buku Berhasil Ditambahkan.');window.location='?page=buku';</script>";
   } else {
      echo "<script>alert('Data Buku Gagal Ditambahkan.');window.location='?page=buku&act=tambah';</script>";
   }
}
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Tambah Data Buku</h1>
</div>

<form action="" method="post" enctype="multipart/form-data">
   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
            <label for="judul">Judul Buku</label>
            <input type="text" name="judul" id="judul" class="form-control" required autofocus="on">
         </div>
         <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" name="penulis" id="penulis" class="form-control" required>
         </div>
         <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input type="text" name="penerbit" id="penerbit" class="form-control" required>
         </div>
         <div class="form-group">
            <label for="tahun">Tahun Terbit</label>
            <select name="tahun" id="tahun" class="form-control">
               <option value="">-- Pilih Tahun --</option>
               <?php for($i = 2018; $i <= date('Y'); $i++) : ?>
                  <option value="<?= $i ?>"><?= $i ?></option>
               <?php endfor; ?>
            </select>
         </div>
         <div class="form-group">
            <label for="foto_buku">Foto</label>
            <input type="file" name="foto_buku" id="foto_buku" class="form-control-file">
         </div>
         <div class="form-group">
            <button type="submit" name="tambah" class="btn btn-secondary">Tambah Data</button>
         </div>
      </div>
   </div>
</form>