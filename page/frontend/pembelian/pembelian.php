

<?php 
// var_dump($idUser);
$pembelian = $buku->getPeminjamanBukuByUser($idUser);
$status = $buku->getPeminjamanByIdUser($idUser)
// var_dump($pembelian);
?>
<div class="container">
<?php if(!empty($pembelian)) : ?>
   <div class="row col-md-12">
      <h1 class="">Pembelian <?= $_SESSION['nama'] ?></h1>
   </div>
   <div class="row">
      <div class="col-md-8">
         <div class="table-responsive">
            <table class="table table-striped">
               <thead>
                  <tr>
                     <th>#</th>
                     <th>Foto</th>
                     <th>Buku</th>
                     <th>Status</th>
                  </tr>
               </thead>
               <?php if($status['status'] == 0 || $status['status'] == 1) : ?>
               <tbody>
                  <?php $no = 1; foreach($pembelian as $p) : ?>
                  <tr>
                     <td><?= $no++; ?></td>
                     <td>
                        <img src="uploads/buku/<?= $p['foto_buku'] ?>" alt="<?= $b['judul'] ?>" class="img-fluid" width="80">
                     </td>
                     <td><?= $p['judul']; ?></td>
                     <td>
                        <?php if($p['status'] == 0) : ?>
                           <span class="badge badge-primary">Tunggu, persetujuan admin.</span>
                        <?php elseif($p['status'] == 1) : ?>
                           <span class="badge badge-success">Silahkan ambil buku diperpustakaan.</span>
                        <?php endif; ?>
                     </td>
                  </tr>
                  <?php endforeach; ?>
               </tbody>
               <?php elseif($status['status'] == 2) : ?>
                  <div class="alert alert-info">Tunggu 3 hari, jika ingin meminjam buku lagi.</div>
               <?php endif; ?>
               <?php if($status['status'] == 0 || $status['status'] == 1) : ?>
                  <?php if($p['status'] == 1) : ?>
                  <a href="?page=pembelian&act=konfirmasi&id=<?= $p['id_peminjaman'] ?>" class="btn btn-sm btn-secondary mb-2" onclick="return confirm('Jika sudah, silahkan konfirmasi kepada admin.')">Sudah Mengambil Semua Buku ?</a>
                  <?php endif; ?>
               <?php endif; ?>
            </table>
         </div>
      </div>
      <div class="col-md-4">
         <div class="alert alert-info">
            <h4>Pemberitahuan</h4>
             * Waktu peminjaman buku hanya 10 hari<br/>
             * Set waktu > 10 hari sebelum tanggal sekarang<br/>
             * Denda keterlambatan 1000/hari<br/>
           </div>
      </div>
   </div>
<?php else : ?>
   <div class="alert alert-info">Silahkan lakukan transaksi peminjaman buku terlebih dahulu!.</div>
<?php endif; ?>
</div>
