<?php 
require '../../config/auth.php';
$db = new Auth();

if(isset($_POST['tambah'])) {
   if($db->register($_POST) > 0) {
      echo "<script>alert('Anda Berhasil Mendaftar, Silahkan Login.');window.location='login.php';</script>";
   } else {
      echo "<script>alert('Gagal Mendaftar!');window.location='register.php';</script>";
   }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar - Pepustakaan</title>

    

    <!-- Bootstrap core CSS -->
   <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
   <style>
      body {background-color: #eee;}
   </style>
  </head>
  <body>
    
<div class="container">
   <div class="row">
      <div class="col-md-12">
         <div class="row mt-3">
            <div class="col-md-4 offset-md-4">
               <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                 <div class="card-header">
                  Daftar Akun Perpustakaan
                 </div>
                 <div class="card-body">
                    <form action="" method="post">
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
                           <select name="level" id="level" class="form-control" required>
                              <option value="">-- Pilih Level --</option>
                              <option value="1">User</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <button type="submit" name="tambah" class="btn btn-secondary">Daftar</button>
                        </div>
                     </form>
                 </div>
                 <div class="card-footer text-muted">
                   Copyright <?= date('Y') ?>
                 </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


    
  </body>
</html>

