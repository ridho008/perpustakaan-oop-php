

<section class="jumbotron text-center">
 <div class="container">
   <h1>Pinjam Buku ?</h1>
   <p class="lead text-muted">Website kami menyediakan jasa untuk meminjamkan buku secara gratis. anda dapat melakukan transaksi untuk mendapatkan buku yang anda inginkan.</p>
   <p>
    <h3 class="text-info">
      Selamat Datang <strong><?= (!empty($_SESSION['nama']) ? $_SESSION['nama'] : '') ?></strong>
    </h3>
    <?php if(!empty($_SESSION['id'])) : ?>
     <a href="page/theme-backend.php" class="btn btn-primary my-2">Dashboard</a>
     <a href="./page/auth/logout.php" class="btn btn-secondary" onclick="return confirm('Keluar Akun ?')">Logout</a>
   <?php else: ?>
     <a href="page/auth/login.php" class="btn btn-primary my-2">Masuk</a>
     <a href="page/auth/register.php" class="btn btn-secondary my-2">Daftar</a>
   <?php endif; ?>
   </p>
 </div>
</section>

<div class="album py-5 bg-light">
 <div class="container">

   <div class="row">
      <?php foreach($buku->getAllBooks() as $b) : ?>
     <div class="col-md-4">
       <div class="card mb-4 shadow-sm">
         <img src="uploads/buku/<?= $b['foto_buku'] ?>" alt="<?= $b['judul'] ?>" class="img-fluid">
         <div class="card-body">
           <h5 class="card-title"><?= $b['judul'] ?></h5>
           <div class="d-flex justify-content-between align-items-center">
             <div class="btn-group">
                <?php if(!empty($_SESSION['id'])) : ?>
                    <?php if($_SESSION['level'] != 0) : ?>
                        <?php if(empty($anggota['tgl_lahir']) || empty($anggota['alamat']) || empty($anggota['jk']) || empty($anggota['no_hp'])) : ?>
                          <a href="page/theme-backend.php?page=data-diri" class="btn btn-sm btn-outline-primary">Pinjam</a>
                        <?php else: ?>
                          <a href="?page=cart_proses&id=<?= $b['id_buku'] ?>" class="btn btn-sm btn-outline-primary">Pinjam</a>
                        <?php endif; ?>
                      <?php else: ?>
                        <div class="alert alert-info" role="alert">Anda login sebagai admin, tidak bisa melakukan transaksi.</div>
                    <?php endif; ?>
                  <?php else: ?>
                    <a href="page/auth/login.php" class="btn btn-sm btn-outline-primary">Pinjam</a>
                <?php endif; ?>
                
                  
             </div>
             <!-- <small class="text-muted">9 mins</small> -->
           </div>
         </div>
       </div>
     </div>
     <?php endforeach; ?>
     
   </div>
 </div>
</div>

