<?php 
require '../config/pengguna.php';
$db = new Pengguna();

if(isset($_POST['tambah'])) {
   if($db->insertUser($_POST) > 0) {
      echo "<script>alert('Data Pengguna Berhasil Ditambahkan.');window.location='?page=pengguna';</script>";
   } else {
      echo "<script>alert('Data Pengguna Gagal Ditambahkan.');window.location='?page=pengguna&act=tambah';</script>";
   }
}
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Tambah Data Pengguna</h1>
</div>

<form action="" method="post">
   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" required autofocus="on">
         </div>
         <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required>
         </div>
         <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
         </div>
         <div class="form-group">
            <label for="level">Level</label>
            <select name="level" id="level" class="form-control">
               <option value="">-- Pilih Level --</option>
               <option value="0">Admin</option>
               <option value="1">User</option>
            </select>
         </div>
         <div class="form-group">
            <button type="submit" name="tambah" class="btn btn-secondary">Tambah Data</button>
         </div>
      </div>
   </div>
</form>