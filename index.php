<?php 
session_start();
require 'config/buku.php';
// error_reporting(0);
$buku = new buku();
$idUser = (empty($_SESSION['id']) ? '' : $_SESSION['id']);
$anggota = $buku->getJoinByIdMemberUser($idUser);
$pembelian = ($buku->getPeminjamanBukuByUser($idUser) ? count($buku->getPeminjamanBukuByUser($idUser)) : '');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Utama - Perpustakaan</title>
   <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm bg-white rounded">
  <div class="container">
    <a href="./" class="navbar-brand d-flex align-items-center">
         <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
           <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
         </svg>
         <strong class="ml-1">Perpustakaan</strong>
       </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/perpustakaan-oop-php">Home</span></a>
        </li>
        <?php if(!empty($_SESSION['id']) && $_SESSION['level'] != 0) : ?>
        <li class="nav-item">
          <a class="nav-link" href="?page=cart">Keranjang</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=pembelian">Pembelian <span class="badge badge-danger"><?= $pembelian; ?></a>
        </li>
      <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<main role="main">
  <?php 
  if (isset($_GET["page"])) {
    if ($_GET['page'] == 'cart_proses') {
      if (isset($_GET['act']) == '') {
        require 'page/cart/cart_proses.php';
      }
    } elseif ($_GET['page'] == 'checkout') {
      if ($_GET['act'] == '') {
        require 'page/cart/checkout.php';
      }
    } elseif ($_GET['page'] == 'cart') {
      if (isset($_GET['act']) == '') {
        require 'page/cart/cart.php';
      } else if($_GET['act'] == 'delete') {
        require 'page/cart/delete-cart.php';
      }
    } elseif ($_GET['page'] == 'pembelian') {
      if (isset($_GET['act']) == '') {
        require 'page/frontend/pembelian/pembelian.php';
      } else if(isset($_GET['act']) == 'konfirmasi') {
        require 'page/frontend/pembelian/konfirmasi.php';
      }
    }
  } else {
    require 'page/frontend/content.php';
  }
  ?>
</main>

<footer class="text-muted">
<div class="container">
 <p class="float-right">
   <a href="#">Back to top</a>
 </p>
 <p>Sebuah program yang dikembangkan tidak akan luput dari error, sehebat apapun programmernya</p>
 <p>Copyright &copy; <?= date('Y') ?> Perpustakaan OOP</a>.</p>
</div>
</footer>


<script src="assets/js/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>