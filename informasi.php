<?php
require 'functions.php';
$pustakawan = query("SELECT * FROM pustakawan");
?>

<!doctype html>
<html lang="en">

<head>
  <title>Perpustakaan SMKN 1 Wanareja</title>
  <link rel="shortcut icon" href="gambar/logo.png">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <?php include('style.php'); ?>

</head>

<body class="bg-light">
<!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid ">
            <img src="gambar/logo.png" class="img-fluid me-2 d-none d-lg-block " width="50">
            <a class="navbar-brand" href="#"><b>Perpustakaan SMKN 1 Wanareja</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="home.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="koleksi.php?subjek=Semua">Koleksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="artikel.php">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="informasi.php">Informasi</a>
                    </li>
                    <?php session_start();  if( isset($_SESSION["login"])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span><i class="bi bi-person-fill"></i> Akun </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="login.php">
                                <i class="bi bi-person-circle"></i></i> Dashboard</a>
                            </li>
                            <li><a class="dropdown-item" href="logout.php"><i class="bi bi-power"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Masuk</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col col-lg-6 col-md-12 col-sm-12 mb-3 d-lg-block d-md-block d-none">
                <img src="gambar/gallery/10.jpg" class="img-fluid rounded mx-auto d-block" alt="...">
            </div>
            <div class="col col-lg-6 col-md-12 col-sm-12">
                <h4 class="judul2 fw-bold d-lg-block d-none">Tentang Perpustakaan SMKN 1 Wanareja</h4> 
                <h4 class="judul2 fw-bold text-center d-md-block d-block d-lg-none">Tentang Perpustakaan SMKN 1 Wanareja</h4>
                <p style="text-align: justify;"> 
                Perpustakaan SMK N 1 Wanareja didirikan bersamaan dengan berdirinya SMK N 1 Wanareja pada tahun 2000 Yang beralamat di Jl. 
                Srikaya, Wanareja Kec. Wanareja, Kab. Cilacap, Jawa Tengah,
                Perpustakaan SMK N 1 Wanareja terletak dipusat sekolah sehingga sangat strategis untuk dapat di akses  
                oleh warga sekolah dan warga sekitar sekolah.
                Seiring dengan berkembangnya SMKN 1 Wanareja menuju SMK Pusat Keunggulan, Perpustakaan SMK N 1 Wanareja juga terus berkembang dan 
                berbenah diri demi tercapainya visi perpustakaan yaitu Mewujudkan perpustakaan sekolah sebagai pusat informasi dan sumber belajar 
                untuk membentuk warga sekolah yang berkarakter, berkompeten, berbudaya lingkungan dan unggul.
                </p>
            </div>
        </div>
    </div>
    
    <div class="container-fluid bgwhite shadow p-3 my-5">
        <h4 class="judul2 fw-bold text-center">Fasilitas Perpustakaan SMKN 1 Wanareja</h4>
        <div class="row">
            <div class="col col-lg-12 col-md-12 col-sm-12 mt-3">
                <div class="row row-cols-lg-4 row-cols-sm-2 row-cols-1 g-3">
                    <div class="col zoomefek">
                        <div class="card border-light h-100 transisi">
                            <img src="gambar/gallery/4.jpg"  class="img-fluid rounded mx-auto d-block" alt="..." style="height: 250px; width: auto">
                            <div class="card-body">
                                <p class="fw-bold text-center">Ruang Membaca</p>
                            </div>
                        </div>
                    </div>
                    <div class="col zoomefek">
                        <div class="card border-light h-100 transisi">
                            <img src="gambar/gallery/6.jpg"  class="img-fluid rounded mx-auto d-block" alt="..." style="height: 250px; width: auto">
                            <div class="card-body">
                                <p class="fw-bold text-center">Ruang Komputer</p>
                            </div>
                        </div>
                    </div>
                    <div class="col zoomefek">
                        <div class="card border-light h-100 transisi">
                            <img src="gambar/gallery/1.jpg"  class="img-fluid rounded mx-auto d-block" alt="..." style="height: 250px; width: auto">
                            <div class="card-body">
                                <p class="fw-bold text-center">Koleksi Buku</p>
                            </div>
                        </div>
                    </div>
                    <div class="col zoomefek">
                        <div class="card border-light h-100 transisi">
                            <img src="gambar/gallery/9.jpg"  class="img-fluid rounded mx-auto d-block" alt="..." style="height: 250px; width: auto">
                            <div class="card-body">
                                <p class="fw-bold text-center">Loker Penyimpanan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h4 class="judul2 fw-bold text-center">Pustakawan</h4>
    <div class="container-fluid my-3 px-5">
        <div class="row">
            <div class="col col-lg-12 col-md-12 col-sm-12">
                <div class="row row-cols-lg-5 row-cols-sm-3 row-cols-1 g-3">
                    <?php foreach( $pustakawan as $row)  : ?>
                        <div class="col">
                            <img src="gambar/akun/<?php echo $row['gambar'];?>" class="img-fluid rounded mx-auto d-block" alt="..." style="height: 200px; width:auto">
                            <p class="subjek_text fw-bold"><?= $row["username"] ?></p>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>

<!-- Footer -->
    <footer>
        <?php include('footer.php'); ?>
    </footer>

</body>

</html>