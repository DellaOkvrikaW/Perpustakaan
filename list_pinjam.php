<div class="card col-sm-12">
  <div class="card-header">
    <h4>Buku yang akan dipinjam</h4>
  </div>
  <div class="card-body">
    <table class="table">
      <thead>
        <tr>
          <th>Kode</th>
          <th>Judul</th>
          <th>Penulis</th>
          <th>Picture</th>
          <th>
            Option
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($_SESSION["session_pinjam"] as $hasil): ?>
          <tr>
            <td><?php echo $hasil["kode_buku"]; ?></td>
            <td><?php echo $hasil["judul"]; ?></td>
            <td><?php echo $hasil["penulis"]; ?></td>
            <td>
              <img src="img_book/<?php echo $hasil["image"]; ?>" width="100" class="img">
            </td>
            <td>
              <a href="db_pinjam.php?hapus=true&kode_buku=<?php echo $hasil["kode_buku"]; ?>">
                <button type="button" clas="btn btn-danger">Hapus</button>
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <a href="db_pinjam.php?checkout=true"
    onclick="return confirm('Apakah anda yakin dengan pesanan ini?')">
<button type="button" class="btn btn-danger">
Checkout
</button>
    </a>
  </div>
</div>
