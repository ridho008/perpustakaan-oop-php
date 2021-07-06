

<?php  
require '../config/peminjaman.php';
$db = new Peminjaman();
$statusNull = $db->getPeminjamanGetByStatus(0);
$statusSudahDikembalikan = $db->getPeminjamanGetByStatus(2);
$daftarBukuByUser = $db->getDaftarBukuByUser(0);
$getAllPeminjamanUser = $db->getAllPeminjamanUser();

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Peminjaman Buku</h1>
</div>

<p>
  <a class="btn btn-warning text-light" data-toggle="collapse" href="#persetujuan-admin" role="button" aria-expanded="false" aria-controls="persetujuan-admin">
    Persetujuan Admin
  </a>
  <button class="btn btn-success" type="button" data-toggle="collapse" data-target="#mengembalikan-buku" aria-expanded="false" aria-controls="mengembalikan-buku">
    Buku Sudah Dikembalikan
  </button>
</p>
<div class="collapse" id="persetujuan-admin">
  <div class="card card-body">
    <h3>Persetujuan Admin</h3>
   <!-- Persetujuan Admin = 0 -->
    <table class="table table-bordered">
       <thead>
          <tr>
             <th>#</th>
             <th>Mahasiswa</th>
             <!-- <th>Buku</th>
             <th>Tanggal Pinjam</th>
             <th>Tanggal Kembali</th> -->
             <th>Tanggal Transaksi</th>
             <th>Aksi</th>
          </tr>
       </thead>
       <tbody>
        <?php if(!empty($statusNull)) : ?>
          <?php $no = 1; foreach($statusNull as $sn) : ?>
            <tr>
               <td><?= $no++; ?></td>
               <td><?= $sn['nama']; ?></td>
               <!-- <td><?= date('d-m-Y', strtotime($sn['tgl_pinjam'])); ?></td> -->
               <!-- <td><?= date('d-m-Y', strtotime($sn['tgl_kembali'])); ?></td> -->
               <td><?= date('d-m-Y', strtotime($sn['tgl_transaksi'])); ?></td>
               <td>
                 <a class="btn btn-warning text-light" data-toggle="collapse" href="#daftar-buku<?= $sn['id_peminjaman']; ?>" role="button" aria-expanded="false" aria-controls="daftar-buku<?= $sn['id_peminjaman']; ?>">
                   Daftar Buku 
                 </a>
                 <a href="?page=peminjaman&act=setujui&id=<?= $sn['id_peminjaman']; ?>" class="btn btn-primary" onclick="return confirm('Menyetujui, akan meminjamkan buku yang dia pinjam!.')">Setujui ?</a>
                 <div class="collapse" id="daftar-buku<?= $sn['id_peminjaman']; ?>">
                <?php foreach($daftarBukuByUser as $db) : ?>
                <?php if($sn['id_peminjaman'] == $db['id']) : ?>
                  <span class="badge badge-primary"><?= $db['judul'] ?></span>
                <?php endif; ?>
                 <?php endforeach; ?>
                 </div>
               </td>
               <!-- <td>
                  <button type="button" class="btn btn-primary tombol-daftar-buku" data-id="<?= $sn['id_peminjaman'] ?>" data-toggle="modal" data-target="#daftar-buku">
                    Daftar Buku
                  </button>
               </td> -->
            </tr>
          <?php endforeach; ?>
          <?php else: ?>
          <div class="alert alert-info" role="alert"><strong>Status Persetujuan Buku</strong>, Masih Kosong!.</div>
        <?php endif; ?>
       </tbody>
    </table>
  </div>
</div>
<div class="collapse" id="mengembalikan-buku">
  <div class="card card-body">
    <h3>Mengembalikan Buku</h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Mahasiswa</th>
          <th>Tanggal Kembali</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if(!empty($statusSudahDikembalikan)) : ?>
        <?php $no = 1; foreach($statusSudahDikembalikan as $ss) : ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $ss['nama']; ?></td>
            <td></td>
            <td>
              <a href="?page=peminjaman&act=delete&id=<?= $ss['id_peminjaman']; ?>" class="btn btn-danger" onclick="return confirm('Setelah mengembalikan buku, admin wajib menghapus data transaksi pengguna.')">Hapus Transaksi ?</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
          <div class="alert alert-info" role="alert"><strong>Status Buku Kembali</strong>, Masih Kosong!.</div>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Mahasiswa</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Tanggal Transaksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach($getAllPeminjamanUser as $ga) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $ga['id_peminjaman']; ?></td>
              <td><?= $ga['nama']; ?></td>
              <td><?= $ga['tgl_pinjam']; ?></td>
              <td><?= $ga['tgl_kembali']; ?></td>
              <td><?= $ga['tgl_transaksi']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>