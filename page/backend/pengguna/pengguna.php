<?php 
require '../config/pengguna.php';
$db = new Pengguna();
$pengguna = $db->getAllUsers()
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Pengguna</h1>
</div>

<a href="?page=pengguna&act=tambah" class="btn btn-secondary mb-2">Tambah Pengguna</a>
<div class="table-responsive">
   <table class="table table-bordered table-striped">
      <thead>
         <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Level</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         <?php $no = 1; foreach($pengguna as $row) : ?>
            <tr>
               <td><?php echo $no++; ?></td>
               <td><?php echo $row['nama']; ?></td>
               <td><?php echo $row['username']; ?></td>
               <td><?php echo ($row['level'] == 0 ? 'Admin' : 'User'); ?></td>
               <td>
                  <a href="?page=pengguna&act=edit&id=<?php echo $row['id_user']; ?>" class="btn btn-success btn-xs">Edit</a>
                  <a href="?page=pengguna&act=hapus&id=<?php echo $row['id_user']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Hapus ?')">Hapus</a>
               </td>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</div>