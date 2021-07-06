
<?php 
// var_dump($_SESSION['cart']); 

if(isset($_POST['simpan'])) {
   $buku->insertPeminjaman($_POST, $idUser);
}
?>
<?php if (empty($_SESSION['cart'])) : ?>
   <?php echo "<script>alert('Keranjang peminjaman anda kosong.');window.location='index.php';</script>"; ?>
<?php else: ?>
   <div class="container">
      <div class="row col-md-12">
         <h1 class="">Peminjaman Buku Saya</h1>
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
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php $no = 1; foreach($_SESSION['cart'] as $cart => $val) : ?>
                        <tr>
                           <td><?= $no++; ?></td>
                           <td>
                              <img src="./uploads/buku/<?= $val['foto'] ?>" alt="<?= $buku->judul ?>" class="img-fluid" width="100">
                           </td>
                           <td><?= $val['judul']; ?></td>
                           <td>
                              <a href="?page=cart&act=delete&id=<?= $cart ?>" class="btn btn-danger">Hapus</a>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="col-md-4">
            <form action="" method="post">
               <div class="form-group">
                  <label for="tgl_pinjam">Tanggal Pinjam</label>
                  <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" value="<?= date('Y-m-d') ?>" required>
               </div>
               <div class="form-group">
                  <label for="tgl_kembali">Tanggal Kembali</label>
                  <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" required>
               </div>
               <div class="form-group">
                  <button type="submit" name="simpan" class="btn btn-primary btn-block">Simpan</button>
               </div>
            </form>
         </div>
      </div>
   </div>
<?php endif; ?>

