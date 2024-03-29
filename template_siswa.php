<?php session_start(); ?>
<?php if (isset($_SESSION["session_siswa"])): ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Navbar</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </head>
  <body>
  <nav class= "navbar navbar-expand-md bg-primary navbar-dark sticky-top">
    <a href="#" class="text-white">
      <h3>TELKOM's LIBRARY</h3>
    </a>

    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#menu">
      <span class="navbar navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="menu">
      <!-- <ul class="navbar-nav">
        <li class="nav-item"><a href="template.php?page=siswa" class="nav-link">Siswa</a></li>
        <li class="nav-item"><a href="template.php?page=pustakawan" class="nav-link">Pustakawan</a></li>
        <li class="nav-item"><a href="template.php?page=buku" class="nav-link">Buku</a></li>
        <li class="nav-item"><a href="proses_login_siswa.php?logout=true" class="nav-link">Logout</a></li>
      </ul> -->
    </div>
    <!-- <h5 class="text-white">Hello, <?php //echo $_SESSION["session_siswa"]["nama"]; ?></h5> -->
    <a href="template_siswa.php?page=list_pinjam">
    <b class="text-white">PINJAM: <?php echo count($_SESSION["session_pinjam"]); ?></b>
    </a>

  </nav>
  <div class="container my-2">
    <?php if (isset($_GET["page"])): ?>
      <?php if ((@include $_GET["page"].".php") === true): ?>
        <?php include $_GET["page"].".php";?>
      <?php endif; ?>
    <?php endif; ?>
  </div>
  </body>
</html>
<?php else: ?>
  <?php echo "Anda belum login!"; ?>
  <br>
  <a href="login_siswa.php">
    Loginnya tuh disini
  </a>
<?php endif; ?>
