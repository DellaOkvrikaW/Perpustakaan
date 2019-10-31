<div class="card col-sm-12">
  <div class="card-header">
    <h3>DAFTAR PEMINJAMAN</h3>
  </div>
  <div class="card-body">
  <?php
$koneksi = mysqli_connect("localhost","root","","perpustakaan");
$sql = "select pinjam.*,siswa.nama
from pinjam inner join siswa
on pinjam.nisn = siswa.nisn";
$result = mysqli_query($koneksi,$sql);
   ?>
   <ul class="list-group">
   <?php foreach ($result as $hasil): ?>
     <li class="list-group-item">
     <h5>PEMINJAM <?php echo $hasil["nama"] ?>/<?php echo $hasil["id_pinjam"]; ?></h5>
     <h5>DAFTAR PINJAM</h5>
     <?php
$sql2 = "select buku.*
from detail_pinjam inner join buku
on detail_pinjam.kode_buku = buku.kode_buku
where detail_pinjam.id_pinjam = '".$hasil["id_pinjam"]."'";
$result = mysqli_query($koneksi,$sql2);
      ?>
      <ul>
        <?php foreach ($result as $hasil2): ?>
        <li><?php echo $hasil2["kode_buku"]."/".$hasil2["judul"]; ?></li>
      <?php endforeach; ?>
      </ul>
      <?php if ($hasil["status"] == "0"): ?>
      <a href="db_pinjam.php?kembali=true&id_pinjam=<?php echo $hasil["id_pinjam"]; ?>">
        <button type="button" class="btn btn-info">Kembali</button>
      </a>
    <?php endif; ?>
    </li>
   <?php endforeach;?>
   </ul>
  </div>
</div>
