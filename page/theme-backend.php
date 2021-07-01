<?php 
session_start();
error_reporting(0);
// require '../config/auth.php';
// print_r($_SESSION);
// $auth = new Auth();
// if (!$auth->isLoggedIn()) {
//   header("Location: auth/login.php");
// }

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <title>Dashboard Aplikasi Perpustakaan</title>
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Perpustakaan OOPHP</a>
      <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="auth/logout.php" onclick="return confirm('Keluar Akun ?')">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
          <div class="sidebar-sticky pt-3">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active" href="theme-backend.php">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
              <?php if($_SESSION['level'] == 0) : ?>
              <li class="nav-item">
                <a class="nav-link" href="?page=buku">
                  <span data-feather="file"></span>
                  Buku
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=anggota">
                  <span data-feather="shopping-cart"></span>
                  Mahasiswa
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="">
                  <span data-feather="users"></span>
                  Peminjam Buku
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?page=pengguna">
                  <span data-feather="bar-chart-2"></span>
                  Pengguna
                </a>
              </li>
            <?php endif; ?>

            <?php if($_SESSION['level'] == 1) : ?>
              <li class="nav-item">
                <a class="nav-link" href="?page=data-diri">
                  <span data-feather="bar-chart-2"></span>
                  Data Diri
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= ($_SESSION['level'] == 1 ? '?page=pinjam-user' : '') ?>">
                  <span data-feather="users"></span>
                  Peminjam Buku
                </a>
              </li>
            <?php endif; ?>
            </ul>

            <!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
              <span>Saved reports</span>
              <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
              </a>
            </h6> -->
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
          <?php
          if (isset($_SESSION['id'])) {
            
            if (isset($_GET["page"])) {
              if ($_GET['page'] == 'buku') {
                if ($_GET['act'] == '') {
                  require 'backend/buku/buku.php';
                } elseif ($_GET['act'] == 'tambah') {
                  require 'backend/buku/tambah-buku.php';
                } elseif ($_GET['act'] == 'edit') {
                  require 'backend/buku/edit-buku.php';
                } elseif ($_GET['act'] == 'hapus') {
                  require 'backend/buku/hapus-buku.php';
                }
              } elseif ($_GET['page'] == 'pengguna') {
                if ($_GET['act'] == '') {
                  require 'backend/pengguna/pengguna.php';
                } elseif ($_GET['act'] == 'tambah') {
                  require 'backend/pengguna/tambah-pengguna.php';
                } elseif ($_GET['act'] == 'edit') {
                  require 'backend/pengguna/edit-pengguna.php';
                } elseif ($_GET['act'] == 'hapus') {
                  require 'backend/pengguna/hapus-pengguna.php';
                }
              } elseif ($_GET['page'] == 'anggota') {
                if ($_GET['act'] == '') {
                  require 'backend/anggota/anggota.php';
                } elseif ($_GET['act'] == 'tambah') {
                  require 'backend/anggota/tambah-anggota.php';
                } elseif ($_GET['act'] == 'edit') {
                  require 'backend/anggota/edit-anggota.php';
                } elseif ($_GET['act'] == 'hapus') {
                  require 'backend/anggota/hapus-anggota.php';
                }
              } elseif ($_GET['page'] == 'data-diri') {
                if ($_GET['act'] == '') {
                  require 'backend/profile/index.php';
                }
              } elseif ($_GET['page'] == 'pinjam-user') {
                if ($_GET['act'] == '') {
                  require 'backend/peminjaman-buku/index.php';
                }
              }
            } else {
              require 'backend/dashboard.php';
            }
          } else {
            header("Location: auth/login.php");
          }
          
          ?>
          

          
        </main>
      </div>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
  </body>
</html>