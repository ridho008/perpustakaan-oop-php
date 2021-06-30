<?php 
require '../config/anggota.php';
$db = new Anggota();
$anggota = $db->getAllMembers()
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Data Diri Mahasiswa</h1>
</div>

<a href="?page=anggota&act=tambah" class="btn btn-secondary mb-2">Tambah Anggota</a>
<div class="alert alert-info" role="alert"><i class="fas fa-info"></i> <strong>Wajib Diisi,</strong> artinya si akun yang ingin pinjam buku, belum melengkapi data pribadi mereka. sehingga perlu melakukan itu agar bisa melakukan pinjaman buku.</div>
<div class="table-responsive">
   <table class="table table-bordered table-striped">
      <thead>
         <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Kelamin</th>
            <th>Telepon</th>
            <th>Aksi</th>
         </tr>
      </thead>
      <tbody>
         <?php $no = 1; foreach($anggota as $row) : ?>
            <tr>
               <td><?php echo $no++; ?></td>
               <td><?php echo ($row['nama'] == null ? '<span class="text-danger">Wajib Diisi.</span>' : $row['nama']); ?></td>
               <td><?php echo ($row['tgl_lahir'] == null ? '<span class="text-danger">Wajib Diisi.</span>' : $row['tgl_lahir']); ?></td>
               <td><?php echo ($row['alamat'] == null ? '<span class="text-danger">Wajib Diisi.</span>' : $row['alamat']); ?></td>
               <td><?php echo ($row['jk'] == null ? '<span class="text-danger">Wajib Diisi.</span>' : ($row['jk'] == 'L' ? 'Pria' : 'Wanita')); ?></td>
               <td><?php echo ($row['no_hp'] == null ? '<span class="text-danger">Wajib Diisi.</span>' : $row['no_hp']); ?></td>
               <td>
                  <a href="?page=anggota&act=edit&id=<?php echo $row['id_anggota']; ?>" class="btn btn-success btn-xs">Edit</a>
                  <a href="?page=anggota&act=hapus&id=<?php echo $row['id_anggota']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Hapus ?')">Hapus</a>
               </td>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</div>