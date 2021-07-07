<?php 
session_start();
require '../../config/auth.php';
$db = new Auth();

if ($db->isLoggedIn()) {
   header("location: ../theme-backend.php");
}

if(isset($_POST['masuk'])) {
   $db->login($_POST);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Masuk - Pepustakaan</title>

    

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
         <div class="row mt-5">
            <div class="col-md-4 offset-md-4">
               <div class="card text-center mt-5 shadow-lg p-3 mb-5 bg-white rounded">
                 <div class="card-header">
                  Aplikasi Perpustakaan OOP PHP
                 </div>
                 <div class="card-body">
                    <form action="" method="post">
                       <div class="form-group">
                          <label for="username" class="sr-only">Username</label>
                          <input type="text" name="username" id="username" class="form-control" placeholder="Username" required autofocus autocomplete="off">
                       </div>
                       <div class="form-group">
                          <label for="inputPassword" class="sr-only">Password</label>
                          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                       </div>
                       <div class="form-group">
                           <button class="btn btn-primary btn-block" name="masuk" type="submit">Masuk</button>
                           <a href="register.php" class="btn btn-secondary btn-block">Daftar</a>
                           <a href="../../" class="btn btn-secondary btn-success btn-block">Website</a>
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

