<?php
$koneksi = mysqli_connect("localhost","root","","perpustakaan");
if (isset($_POST["action"])) {
    $kode_buku = $_POST["kode_buku"];
    $judul = $_POST["judul"];
    $genre = $_POST["genre"];
    $penulis = $_POST["penulis"];
    $stok = $_POST["stok"];
    $action = $_POST["action"];

    if ($action == "insert") {
    // kita tampung deskripsi file gambarnya
    $path = pathinfo($_FILES["image"]["name"]);
    // ambil extensi gambarnya
    $extensi = $path["extension"];
    // rangkai nama file yang akan disimpan
    $filename = $kode_buku."-".rand(1,1000).".".$extensi;
    // rand() -> untuk mengambil nilai random antara 1-1000
    // exp: 123-809.jpg

    //simpan file gambarnya
    move_uploaded_file($_FILES["image"]["tmp_name"],"img_book/$filename");
    $sql = "insert into buku values('$kode_buku','$judul','$genre','$penulis','$stok','$filename')";
  }elseif ($action == "update") {
    // ambil data dari database
    $sql = "select * from buku where kode_buku='$kode_buku'";
    $result = mysqli_query($koneksi,$sql);
    $hasil = mysqli_fetch_array($result);
    //untuk mengkonversi menjadi array
    if (isset($_FILES["image"])) {
      if (file_exists("img_book/".$hasil["image"])) {
        // jika file file nya tersedia
        unlink("img_book/".$hasil["image"]);
        // untuk menghapus file
      }
      $path = pathinfo($_FILES["image"]["name"]);
      // ambil extensi gambarnya
      $extensi = $path["extension"];
      // rangkai nama file yang akan disimpan
      $filename = $kode_buku."-".rand(1,1000).".".$extensi;
      // rand() -> untuk mengambil nilai random antara 1-1000
      // exp: 123-809.jpg

      //simpan file gambarnya
      move_uploaded_file($_FILES["image"]["tmp_name"],"img_book/$filename");
      $sql = "update buku set judul='$judul',genre='$genre',penulis='$penulis', stok='$stok', image='$filename' where kode_buku='$kode_buku'";
    }else {
      $sql = "update buku set judul='$judul',genre='$genre',penulis='$penulis', stok='$stok' where kode_buku='$kode_buku'";
    }
  }
  mysqli_query($koneksi,$sql);
  header("location:template.php?page=buku");
}
if (isset($_GET["hapus"])) {
        $kode_buku = $_GET["kode_buku"];

        $sql = "select * from buku where kode_buku='$kode_buku'";
        // eksekusi query
        $result = mysqli_query($koneksi,$sql);
        // konversi ke array
        $hasil = mysqli_fetch_array($result);
        if (file_exists("img_book/".$hasil["image"])) {
          unlink("img_book/".$hasil["image"]);
          // menghapus file
        }GET["kode_buku"];
    // ambil data dari database
    $sql = "select * from buku where kode_buku='$kode_buku'";
    // eksekusi query
    $result = mysqli_query($koneksi,$sql);
    // konversi ke array
    $hasil = mysqli_fetch_array($result);
    if (file_exists("img_book/".$hasil["image"])) {
      unlink("img_book/".$hasil["image"]);
      // menghapus file
    }
    $sql = "delete from buku where kode_buku='$kode_buku'";
    mysqli_query($koneksi,$sql);
    header("location:template.php?page=buku");
}
 ?>
