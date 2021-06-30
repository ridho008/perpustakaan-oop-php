<?php 
require '../config/buku.php';
$db = new Buku();
$data_buku = $db->getAllBooks()
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Buku</h1>
</div>

<a href="?page=buku&act=tambah" class="btn btn-secondary mb-2">Tambah Buku</a>
<div class="table-responsive">
   <table class="table table-bordered table-striped">
      <thead>
         <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Buku</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         <?php $no = 1; foreach($data_buku as $row) : ?>
            <tr>
               <td><?php echo $no++; ?></td>
               <td>
                  <img src="../uploads/buku/<?= $row['foto_buku'] ?>" alt="<?= $row['judul'] ?>" class="img-fluid" width="100">
               </td>
               <td><?php echo $row['judul']; ?></td>
               <td><?php echo $row['penulis']; ?></td>
               <td><?php echo $row['penerbit']; ?></td>
               <td><?php echo $row['tahun']; ?></td>
               <td>
                  <a href="?page=buku&act=edit&id=<?php echo $row['id_buku']; ?>" class="btn btn-success btn-xs">Edit</a>
                  <a href="?page=buku&act=hapus&id=<?php echo $row['id_buku']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Hapus ?')">Hapus</a>
               </td>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</div>