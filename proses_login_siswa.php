<?php
session_start(); //harus ditaruh dipaling atas
if (isset($_GET["logout"])) {
  // hapus session-Loginnya
  session_destroy();
  header("location.login_siswa.php");
}
$username = $_POST["username"];
$password = $_POST["password"];


// koneksi database "
$koneksi = mysqli_connect("localhost","root","","perpustakaan");
$sql = "select * from siswa where username='$username' and password='$password'";
$result = mysqli_query($koneksi,$sql);
$jumlah = mysqli_num_rows($result);

if ($jumlah == 0) {
  // jika jumlah data = 0 berarti username/password salah
  header("location:login_siswa.php");
} else {
  // buat variabel session
  $_SESSION["session_siswa"] = mysqli_fetch_array($result);
  $_SESSION["session_pinjam"] = array();
  // ini buat tempat menampung buku yang dipinjam
  // ala ala cart (keranjang belanja)
  header("location:template_siswa.php");
}

 ?>
