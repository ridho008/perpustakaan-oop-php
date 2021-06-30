<?php 
require '../config/anggota.php';
$db = new Anggota();

// Ambil data berdasarkan id buku
$id_anggota = $_GET['id'];
if(!is_null($id_anggota))
{
   $anggota = $db->getByIdMember($id_anggota);
}
else
{
   echo "<script>alert('Id tidak ditemukan, periksa kembali.');window.location='?page=anggota';</script>";
}

if(isset($_POST['edit'])) {
   if($db->updateMember($_POST) > 0) {
      echo "<script>alert('Data Mahasiswa Berhasil Diedit.');window.location='?page=anggota';</script>";
   } else {
      echo "<script>alert('Data Mahasiswa Gagal Diedit.');window.location='?page=anggota&act=edit';</script>";
   }
}
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Edit Data Mahasiswa <?= $anggota['nama'] ?></h1>
</div>

<form action="" method="post">
   <input type="hidden" name="id_anggota" id="id_anggota" class="form-control" required  value="<?= $anggota['id_anggota'] ?>">
   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" required autofocus="on" value="<?= $anggota['nama'] ?>">
         </div>
         <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required value="<?= $anggota['tgl_lahir'] ?>">
         </div>
         <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control"><?= $anggota['alamat'] ?></textarea>
         </div>
         <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control">
               <option value="">-- Pilih Kelamin --</option>
               <option value="L" <?= ($user['jk'] === 'L' ? 'selected' : '') ?>>Pria</option>
               <option value="P" <?= ($user['jk'] === 'P' ? 'selected' : '') ?>>Wanita</option>
            </select>
         </div>
         <div class="form-group">
            <label for="no_hp">No.Telepon</label>
            <input type="number" name="no_hp" id="no_hp" class="form-control" required value="<?= $anggota['no_hp'] ?>">
         </div>        
         <div class="form-group">
            <button type="submit" name="edit" class="btn btn-secondary">Edit Data</button>
         </div>
      </div>
   </div>
</form>