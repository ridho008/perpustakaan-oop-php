<?php 
require '../config/anggota.php';
$db = new Anggota();
$idUser = $_SESSION['id'];
$anggota = $db->getJoinByIdMemberUser($idUser);

if(isset($_POST['simpan'])) {
   if($db->updateMember($_POST) > 0) {
      echo "<script>alert('Data Diri Berhasil Diedit.');window.location='?page=data-diri';</script>";
   } else {
      echo "<script>alert('Data Diri Gagal Diedit.');window.location='?page=data-diri';</script>";
   }
}
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Data Diri <u><?= $_SESSION['nama']; ?></u></h1>
</div>

<div class="alert alert-info"><strong>Peringatan</strong>, jika anda ingin melakukan transaksi peminjaman buku. harap isi data diri anda dengan benar.</div>
<form action="" method="post">
   <input type="hidden" name="id_anggota" class="form-control" value="<?= $anggota['id_anggota'] ?>" required>
   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" disabled value="<?= $anggota['username'] ?>" required>
         </div>
         <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" value="<?= $anggota['tgl_lahir'] ?>" required>
         </div>
         <div class="form-group">
            <label for="no_hp">No.Telepon</label>
            <input type="number" name="no_hp" id="no_hp" class="form-control" value="<?= $anggota['no_hp'] ?>" required>
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control" required><?= $anggota['alamat'] ?></textarea>
         </div>
         <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control" required>
               <option value="">-- Pilih Kelamin --</option>
               <option value="L" <?= ($anggota['jk'] === 'L' ? 'selected' : '') ?>>Pria</option>
               <option value="P" <?= ($anggota['jk'] === 'P' ? 'selected' : '') ?>>Wanita</option>
            </select>
         </div>
         <div class="form-group">
            <button type="submit" name="simpan" class="btn btn-primary btn-block">Simpan</button>
         </div>
      </div>
   </div>
</form>