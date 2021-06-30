<?php 
require '../config/anggota.php';
$db = new Anggota();

if(isset($_POST['tambah'])) {
   if($db->insertMember($_POST) > 0) {
      echo "<script>alert('Data Mahasiswa Berhasil Ditambahkan.');window.location='?page=anggota';</script>";
   } else {
      echo "<script>alert('Data Mahasiswa Gagal Ditambahkan.');window.location='?page=anggota&act=tambah';</script>";
   }
}
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Tambah Data Anggota</h1>
</div>

<form action="" method="post">
   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" required autofocus="on">
         </div>
         <div class="form-group">
            <label for="tgl_lahir">Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
         </div>
         <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="form-control"></textarea>
         </div>
         <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" id="jk" class="form-control">
               <option value="">-- Pilih Kelamin --</option>
               <option value="L">Pria</option>
               <option value="P">Wanita</option>
            </select>
         </div>
         <div class="form-group">
            <label for="no_telp">No.Telepon</label>
            <input type="number" name="no_telp" id="no_telp" class="form-control" required>
         </div>
         <div class="form-group">
            <button type="submit" name="tambah" class="btn btn-secondary">Tambah Data</button>
         </div>
      </div>
   </div>
</form>