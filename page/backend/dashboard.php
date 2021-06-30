<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Dashboard</h1>
</div>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-5">Selamat Datang <span class="badge badge-info"><?= $_SESSION['nama']. ' ' . ($_SESSION['level'] == 0 ? '(Administrator)' : '(Peminjam Buku)') ?> </span></h1>
    <p class="lead">Aplikasi Web Perpustakaan Menggunakan Teknik Object Oriented Programming PHP (Belum Sempurna Penggunaan OOP).</p>
  </div>
</div>