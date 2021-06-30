<?php 
// $id_buku = $_GET['id'];

// $sql = "SELECT * FROM buku WHERE id_buku = $id_buku";
// $query = $this->koneksi->query($sql);
// $hasil = $query->fetch_object();

// $bukuTb = $hasil->judul;

var_dump($bukuTb);
// $row = $buku->getDataCart($idUser);

// var_dump($jml);

// if(isset($_POST['simpan'])) {
//    $pinjam = $buku->getAllPeminjamanWhereIdUser($idUser);
//    $jml = count($pinjam);
//    var_dump($jml);
//    for ($i = 0; $i < $jml; $i++){
//       $tgl_pinjam = $_POST['tgl_pinjam'][$i];
//       $tgl_kembali = $_POST['tgl_kembali'][$i];
//       $id_anggota = $pinjam[$i]['id_anggota'];
//       $id_buku = $pinjam[$i]['id_buku'];
//       var_dump($id_anggota,$id_buku, $tgl_pinjam, $tgl_kembali);
//       $this->koneksi->query("INSERT INTO `detail_pinjaman` (`id_detail`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`) VALUES (null, '$id_anggota', '$id_buku', '$tgl_pinjam', '$tgl_kembali')") or die(mysqli_error($this->koneksi));
//       echo "berhasil";
      
//    }
// }
?>
<!-- <?php if($row) : ?>
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
                  </tr>
               </thead>
               <tbody>
                  <?php $no = 1; foreach($row as $buku) : ?>
                     <tr>
                        <td><?= $no++; ?></td>
                        <td>
                           <img src="./uploads/buku/<?= $buku->foto_buku ?>" alt="<?= $buku->judul ?>" class="img-fluid" width="100">
                        </td>
                        <td><?= $buku->judul; ?></td>
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
               <input type="date" name="tgl_pinjam[]" id="tgl_pinjam" class="form-control" value="<?= date('Y-m-d') ?>" required>
            </div>
            <div class="form-group">
               <label for="tgl_kembali">Tanggal Kembali</label>
               <input type="date" name="tgl_kembali[]" id="tgl_kembali" class="form-control" required>
            </div>
            <div class="form-group">
               <button type="submit" name="simpan" class="btn btn-primary btn-block">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>
<?php else: ?>
   <?php echo "<script>alert('Anda belum melakukan transaksi peminjaman apapun.');window.location='index.php';</script>"; ?>
<?php endif; ?> -->