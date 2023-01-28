<?php
require 'functions.php';
$subjek = query("SELECT * FROM subjek");
$subjek1 = query("SELECT * FROM subjek LIMIT 3");
$buku = query("SELECT * FROM buku LIMIT 5")
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
            <div class="container-fluid">
                <img src="gambar/logo.png" class="img-fluid me-2 d-none d-lg-block " width="50">
                <a class="navbar-brand" href="#"><b>Perpustakaan SMKN 1 Wanareja</b></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="koleksi.php?subjek=Semua">Koleksi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="artikel.php">Artikel</a>
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
<!-- Bagian Judul -->
    <div class="container-fluid text-center text-black py-5 headerimg">
        <div class="row">
            <div class="col col-lg-6 col-md-0 col-sm-0 d-none d-lg-block">

            </div>
            <div class="col col-lg-5 col-md-12 col-sm-12 py-3">
                <h1 class="judul"> Perpustakaan </h1>
                <h1 class="judul"> SMK Negeri 1 Wanareja </h1>
                <form class="d-flex my-5 " action="koleksi.php" method="GET" >
                    <input class="form-control me-2" type="text" name="keyword" autofocus placeholder="Mau cari buku apa hari ini ?" autocomplete="off">
                    <input class="form-control me-2" type="hidden" name="subjek" value="Semua">
                    <button class="btn btn-primary" type="submit" name="cari">Cari</button>
                </form>
            </div>
            <div class="col col-lg-1 col-md-0 col-sm-0 d-none d-lg-block">

            </div>
        </div>
    </div>
  <main>


<!-- Bagian Menu Subjek -->
    <div class="container-fluid text-center py-5">
        <div class="row">
            <div class="col col-lg-3 col-md-0 col-sm-0 d-none d-lg-block">

            </div>
            <div class="col col-lg-6 col-md-12 col-sm-12">
                <h3 class=" judul2 text-center"> Pilih subjek yang anda inginkan  </h3>
                <div class="row row-cols-lg-4 row-cols-sm-4 row-cols-2 g-4 mt-2">
                    <?php foreach( $subjek1 as $row)  : ?>
                        <div class="col zoomefek">
                                <div class="card h-100 transisi">
                                <a class="nav-link" href="koleksi.php?subjek=<?= $row["nama_subjek"] ?>">
                                    <div class="card-body">
                                        <img src="gambar/ikon_subjek/<?php echo $row['ikon_subjek'];?>"  class="img-fluid" alt="...">
                                        <p class="subjek_text"><?= $row["nama_subjek"] ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                    <?php endforeach ?>
                
                        <div class="col zoomefek">
                                <div class="card h-100 transisi">
                                <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <div class="card-body">
                                        <img src="gambar/ikon_subjek/grid_icon.png"  class="img-fluid" alt="...">
                                        <p class="subjek_text">Subjek Lainnya</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col col-lg-3 col-0 col-sm-0 d-none d-lg-block">

            </div>
        </div>
    </div>

<!-- Bagian Informasi -->
    <div class="container-fluid bgwhite py-5 shadow p-3 my-5">
        <div class="row ">
            <h3 class=" judul2 text-center"> Informasi </h3>
            <div class="col col-lg-6 col-md-12 col-sm-12">
                <div class="row row-cols-lg-2 row-cols-sm-2 row-cols-2 mt-5">
                    <div class="col">
                        <div class="card h-100 border-white p-auto" >
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="gambar/ikon/jam.png"  class="img-fluid" alt="..." width="100">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title fw-bold">Waktu Pelayanan</h4>
                                        <p>Senin - Kamis : 07.00 - 16.30 <br>
                                            Jumat         : 07.00 - 16.30
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-white p-auto" >
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="gambar/ikon/buku.png"  class="img-fluid" alt="..." width="100">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title fw-bold">Koleksi Buku</h4>
                                        <p>Lebih dari 100 Buku Tersedia
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-white" >
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="gambar/ikon/laptop.png"  class="img-fluid" alt="..." width="100">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title fw-bold">Komputer</h4>
                                        <p>Tersedia komputer yang terhubung ke jaringan internet
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100 border-white" >
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="gambar/ikon/admin.png"  class="img-fluid" alt="..." width="100">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title fw-bold">Pelayanan Cepat</h4>
                                        <p>Pelayanan cepat dalam transaksi peminjaman dan pengembalian buku
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
<!-- Bagian Carousel -->
            <div class="col col-lg-6 col-md-0 col-sm-0 d-none d-lg-block m-auto">
                    <div id="carouselId" class="carousel slide carousel" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
                            <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
                            <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                                <img src="gambar/gallery/4.jpg" class="w-100 d-block" alt="First slide" style="height: 400px; width: auto">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>Ruang Membaca</h3>
                                    <p>Fasilitas untuk pengunjung yang ingin membaca langsung buku di Perpustakaan</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="gambar/gallery/6.jpg" class="w-100 d-block" alt="Second slide" style="height: 400px; width: auto">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>Ruang Komputer</h3>
                                    <p>Fasilitas komputer untuk mencari referensi yang lebih luas.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="gambar/gallery/8.jpg" class="w-100 d-block" alt="Third slide" style="height: 400px; width: auto">
                                <div class="carousel-caption d-none d-md-block">
                                    <h3>Koleksi Buku</h3>
                                    <p>Koleksi buku yang lengkap dan terbaru untuk semua pengunjung</p>
                                </div>
                            </div>
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
        </div>
    </div>

<!-- Bagian Koleksi Buku -->
    <div class="container-fluid text-center py-5">
        <div class="row">
        <h3 class=" judul2 text-center mb-5"> Koleksi Buku Baru Perpustakaan SMKN 1 Wanareja </h3>
            <div class="col col-lg-12 col-md-12 col-sm-12 ">
            <div class="row row-cols-lg-6 row-cols-sm-3 row-cols-2 g-3"> 
                    <?php foreach( $buku as $row)  : ?>
                    <div class="col zoomefek">
                        <div class="card border-light h-100 transisi ">
                            <a class="nav-link" href="detail_buku.php?kode_buku=<?= $row["kode_buku"] ?>">
                                <img src="gambar/buku/<?php echo $row["cover"];?>"  class="img-fluid" alt="..." style="height: 200px; width: auto">
                                    <div class="card-body">
                                    <p class="subjek_text"><?= $row["judul"] ?></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <?php endforeach ?>
                    <div class="col zoomefek">
                        <div class="card border-light h-100 transisi ">
                            <a class="nav-link" href="koleksi.php?subjek=Semua">
                                <img src="gambar/buku/lainnya.png"  class="img-fluid" alt="..." style="height: 200px; width: auto">
                                    <div class="card-body">
                                    <p class="subjek_text">Telusuri Buku Lainnya</p>
                                </div>
                            </a>
                        </div>
                    </div>    
                </div>        
            </div>
        </div>
    </div>

  </main>
<!-- Footer -->
    <footer>
        <?php include('footer.php'); ?>
    </footer>
<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pilih Subjek</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <div class="row  row-cols-lg-4 row-cols-sm-4 row-cols-3  g-4">
                        <?php foreach( $subjek as $row)  : ?>
                            <div class="col zoomefek">
                                <div class="card h-100 transisi ">
                                    <a class="nav-link" href="koleksi.php?subjek=<?= $row["nama_subjek"] ?>">
                                        <div class="card-body">
                                            <img src="gambar/ikon_subjek/<?php echo $row['ikon_subjek'];?>"  class="img-fluid" alt="...">
                                            <p class="subjek_text"><?= $row["nama_subjek"] ?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach ?>    
                    </div>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>

</body>

</html>