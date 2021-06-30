<?php 
require '../config/buku.php';
$db = new Buku();

// Ambil data berdasarkan id buku
$id_buku = $_GET['id'];
if(!is_null($id_buku))
{
   $buku = $db->getByIdBook($id_buku);
}
else
{
   echo "<script>alert('Id tidak ditemukan, periksa kembali.');window.location='?page=buku';</script>";
}

if(isset($_POST['edit'])) {
   if($db->updateBook($_POST) > 0) {
      echo "<script>alert('Data Buku Berhasil Diedit.');window.location='?page=buku';</script>";
   } else {
      echo "<script>alert('Data Buku Gagal Diedit.');window.location='?page=buku&act=edit';</script>";
   }
}
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Edit Data Buku <?= $buku['judul'] ?></h1>
</div>

<form action="" method="post" enctype="multipart/form-data">
   <input type="hidden" name="id_buku" id="id_buku" class="form-control" required  value="<?= $buku['id_buku'] ?>">
   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
            <label for="judul">Judul Buku</label>
            <input type="text" name="judul" id="judul" class="form-control" required autofocus="on" value="<?= $buku['judul'] ?>">
         </div>
         <div class="form-group">
            <label for="penulis">Penulis</label>
            <input type="text" name="penulis" id="penulis" class="form-control" required value="<?= $buku['penulis'] ?>">
         </div>
         <div class="form-group">
            <label for="penerbit">Penerbit</label>
            <input type="text" name="penerbit" id="penerbit" class="form-control" required value="<?= $buku['penerbit'] ?>">
         </div>
         <div class="form-group">
            <label for="tahun">Tahun Terbit</label>
            <select name="tahun" id="tahun" class="form-control">
               <option value="">-- Pilih Tahun --</option>
               <?php for($i = 2018; $i <= date('Y'); $i++) : ?>
                  <?php if($i == $buku['tahun']) : ?>
                  <option value="<?= $i ?>" selected><?= $i ?></option>
                  <?php else : ?>
                  <option value="<?= $i ?>"><?= $i ?></option>
                  <?php endif; ?>
               <?php endfor; ?>
            </select>
         </div>
         <div class="form-group">
            <label for="foto_buku">Foto</label><br>
            <img src="../uploads/buku/<?= $buku['foto_buku']; ?>" class="img-fluid" width="200">
            <input type="file" name="foto_buku" id="foto_buku" class="form-control-file">
         </div>
         <div class="form-group">
            <button type="submit" name="edit" class="btn btn-secondary">Edit Data</button>
         </div>
      </div>
   </div>
</form>