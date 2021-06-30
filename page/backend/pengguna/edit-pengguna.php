<?php 
require '../config/pengguna.php';
$db = new Pengguna();

// Ambil data berdasarkan id buku
$id_user = $_GET['id'];
if(!is_null($id_user))
{
   $user = $db->getByIdUser($id_user);
}
else
{
   echo "<script>alert('Id tidak ditemukan, periksa kembali.');window.location='?page=pengguna';</script>";
}

if(isset($_POST['edit'])) {
   if($db->updateUser($_POST) > 0) {
      echo "<script>alert('Data Pengguna Berhasil Diedit.');window.location='?page=pengguna';</script>";
   } else {
      echo "<script>alert('Data Pengguna Gagal Diedit.');window.location='?page=pengguna&act=edit';</script>";
   }
}
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Edit Data Pengguna <?= $user['nama'] ?></h1>
</div>

<form action="" method="post">
   <input type="hidden" name="id_user" id="id_user" class="form-control" required  value="<?= $user['id_user'] ?>">
   <div class="row">
      <div class="col-md-6">
         <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" name="nama" id="nama" class="form-control" required autofocus="on" value="<?= $user['nama'] ?>">
         </div>
         <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" required value="<?= $user['username'] ?>">
         </div>
         <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" required placeholder="Masukan password baru anda...">
         </div>
         <div class="form-group">
            <label for="level">Level</label>
            <select name="level" id="level" class="form-control">
               <option value="">-- Pilih Level --</option>
               <option value="0" <?= ($user['level'] == 0 ? 'selected' : '') ?>>Admin</option>
               <option value="1" <?= ($user['level'] == 1 ? 'selected' : '') ?>>User</option>
            </select>
         </div>         
         <div class="form-group">
            <button type="submit" name="edit" class="btn btn-secondary">Edit Data</button>
         </div>
      </div>
   </div>
</form>