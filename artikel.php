<?php
require 'functions.php';
//$artikel = query("SELECT * FROM artikel");
$random_artikel = query("SELECT * FROM artikel ORDER BY rand() LIMIT 4");
$carousel = query("SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT 4");


$jumlahDataPerHalaman = 12;
$jumlahData = count (query("SELECT * FROM artikel"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$artikel = query("SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT $awalData, $jumlahDataPerHalaman ");
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
  <link rel="stylesheet" href="css/carousel.css">
  

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
                        <a class="nav-link active" href="artikel.php">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="informasi.php">Informasi</a>
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
    <div class="container-fluid mt-5 d-none d-md-block d-lg-block">
        <div class="row">
            <div class="col col-lg-8 col-md-12 col-sm-12">
                <!-- Bagian Carousel -->
                <div id="carouselId" class="carousel slide carousel" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="3" aria-label="Second slide"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="4" aria-label="Second slide"></li> 
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="gambar/artikel/cover_artikel.png" class="w-100 d-block" alt="First slide" style="height: 600px; width: auto">
                        </div>
                        <?php foreach( $carousel as $row)  : ?>
                        <div class="carousel-item">
                            <img src="gambar/artikel/<?= $row["gambar_artikel"]?>" class="w-100 d-block" alt="Second slide" style="height: 600px; width: auto">
                            <div class="carousel-caption d-none d-md-block">
                                <h3 class="fw-bold"><?= $row["judul_artikel"]?></h3>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col col-lg-4 col-md-12 col-sm-12 d-none d-lg-block">
                <div class="rounded p-2 mb-2 text-white" style="background-color: var(--color1);"><h5 class="fw-bold">Rekomendasi Artikel</h5></div>
                <div class="row row-cols-lg-2 row-cols-sm-2 row-cols-1 g-3">
                    <?php foreach( $random_artikel as $row)  : ?>
                        <div class="col zoomefek">
                            <div class="card border-light h-100 transisi">
                                <a class="text-black" href="detail_artikel.php?id_artikel=<?= $row["id_artikel"] ?>" style="text-decoration: none;">
                                    <img src="gambar/artikel/<?php echo $row["gambar_artikel"];?>"  class="img-fluid rounded mx-auto d-block" alt="..." style="height: 150px; width: auto">
                                    <div class="card-body">
                                        <p class="fw-bold text-center"><?= $row["judul_artikel"] ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid my-5">
        <div class="row">
            <div class="col col-lg-0 col-md-0 col-0">
            </div>
            <div class="col col-lg-12 col-md-12 col-12">
                <h4 class="fw-bold">Daftar Artikel</h4>
                <hr>
                <div class="row row-cols-lg-6 row-cols-sm-4 row-cols-1 g-3  mb-5">
                    <?php foreach( $artikel as $row)  : ?>
                        <div class="col zoomefek">
                            <div class="card border-light h-100 transisi">
                                <a class="text-black" href="detail_artikel.php?id_artikel=<?= $row["id_artikel"] ?>" style="text-decoration: none;">
                                    <img src="gambar/artikel/<?php echo $row["gambar_artikel"];?>"  class="img-fluid rounded mx-auto d-block" alt="..." style="height: 150px; width: auto">
                                    <div class="card-body">
                                        <p class="fw-bold text-center"><?= $row["judul_artikel"] ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <?php if( $halamanAktif > 1) : ?>
                        <li class="page-item"> 
                            <a class="page-link" href="?halaman=<?= $halamanAktif - 1; ?>"> &laquo; </a>    
                        </li>
                        <?php endif; ?>

                        <?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
                            <?php if( $i == $halamanAktif) : ?>
                                <li class="page-item" ><a class="page-link" style="font-weight: bold;" href="?halaman=<?= $i; ?>"> <?= $i; ?> </a></li>
                            <?php else : ?>
                                <li class="page-item" ><a class="page-link" href="?halaman=<?= $i; ?>"> <?= $i; ?> </a></li>
                            <?php endif; ?>
                        <?php endfor ?>

                        <?php if( $halamanAktif < $jumlahHalaman) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?halaman=<?= $halamanAktif + 1; ?>"> &raquo; </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>   
            <div class="col col-lg-0 col-md-0 col-0">
            </div>   
        </div>
    </div>

<!-- Footer -->
    <footer>
        <?php include('footer.php'); ?>
    </footer>

</body>

</html>