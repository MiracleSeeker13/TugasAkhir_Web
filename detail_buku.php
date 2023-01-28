<?php
require 'functions.php';
$kode_buku = $_GET['kode_buku'] ;
// error_reporting(0);
$data_buku = query("SELECT * FROM buku WHERE kode_buku = '$kode_buku' ");
$buku_lain = query("SELECT * FROM buku ORDER BY rand() LIMIT 5; ");

if(isset($_POST["markah"])){
    //cek data berhasil atau tidak
    if(tambah_markah($_POST) > 0 ) {
        echo "<script>
            alert('Buku Berhasil Diberi Markah !');
        </script>";
    }else{

    } 
}
?>

<!doctype html>
<html lang="en">

<head>
  <title>Perpustakaan SMKN 1 Wanareja</title>
  <link rel="shortcut icon" href="gambar/logo.png">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <?php include('style.php'); ?>

</head>

<body class="bg-light">
  <div>
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
                        <a class="nav-link" href="home.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link active" aria-current="page" href="koleksi.php?subjek=Semua">Koleksi</a>
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
  </div>

    
<!-- Nama Subjek -->
  <main>
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-1 col-md-0 col-sm-0 d-none d-lg-block">

            </div>

            <div class="col col-lg-7 col-md-12 col-sm-12">
                <div class="container-fluid pt-3 bg-light">
                    <div class="row">
                        <div class="col col-lg-12 col-md-12 col-sm-12">
                            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="nav-link" href="koleksi.php?subjek=Semua">Koleksi</a></li>
                                        <?php foreach( $data_buku as $row)  : ?>
                                    <li class="breadcrumb-item active" aria-current="page">Detail Buku <?php echo substr($row['judul'],0,70);?></li>
                                        <?php endforeach ?>  
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col col-lg-3 col-0 col-sm-0 d-none d-lg-block ">
                <div class="container-fluid pt-3 bg-light">
                    <div class="row">
                        <div class="col col-lg-12 col-md-12 col-sm-12">
                            <h5 class="fw-bold"> Buku Lainnya </h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-1 col-0 col-sm-0 d-none d-lg-block">

            </div>
        </div>
    </div>

    
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-1 col-md-0 col-sm-0 d-none d-lg-block">
            </div>
            <div class="col col-lg-7 col-md-12 col-sm-12 bg-white">
                <div class="container-fluid pt-3">
                    <div class="row">
                        <?php foreach( $data_buku as $row)  : ?>
                            <div class="col col-lg-4 col-md-4 col-sm-12 mt-3">
                                <img src="gambar/buku/<?= $row["cover"]?>" class="img-fluid rounded mx-auto d-block" alt="..." style="height: 350px; width:auto;">
                            </div>
                            <div class="col col-lg-8 col-md-8 col-12 mt-3">
                                <h4 class="fw-bold"><?php echo $row['judul'];?></h4>
                                <form action="" method="POST">
                                <?php if( isset($_SESSION["login"])) : ?>
                                    <input type="text" hidden class="form-control" name="id_user" value="<?=$_SESSION["id_user"]?>">
                                    <input type="text" hidden class="form-control" name="id_buku" value="<?= $row["id_buku"]?>">
                                    <button class="btn btn-outline-success" type="submit" name="markah"><i class="bi bi-bookmark"></i> Markah</button>
                                <?php else : ?>
                                    <button class="btn btn-outline-success" type="button" disabled><i class="bi bi-bookmark"></i> Markah</button>
                                <?php endif; ?>
                                </form> 
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="container-fluid pt-5">
                    <div class="row">
                    <h4 class="fw-bold">Detail Buku</h4>
                    <hr>
                    <?php foreach( $data_buku as $row)  : ?>
                        <div class="col col-lg-6 col-md-12 col-12">
                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-md-4 col-5 col-form-label">Kode Buku</label>
                                <div class="col-lg-8 col-md-8 col-7"> 
                                    <input type="text" class="form-control" name="kode_buku" value="<?= $row['kode_buku'];?>" readonly>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-md-4 col-5 col-form-label">Edisi</label>
                                <div class="col-lg-8 col-md-8 col-7">
                                    <?php if( $row["edisi"] == "") : ?>
                                        <input type="text" class="form-control" name="edisi" value="" placeholder="-" readonly>
                                    <?php else : ?>
                                        <input type="text" class="form-control" name="edisi" value="<?= $row['edisi'];?>" readonly>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-md-4 col-5 col-form-label">ISBN</label>
                                <div class="col-lg-8 col-md-8 col-7">
                                    <?php if( $row["ISBN"] == "") : ?>
                                        <input type="text" class="form-control" name="edisi" value="" placeholder="-" readonly>
                                    <?php else : ?>
                                        <input type="text" class="form-control" name="ISBN" value="<?= $row['ISBN'];?>" readonly>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-md-4 col-5 col-form-label">Bahasa</label>
                                <div class="col-lg-8 col-md-8 col-7">
                                    <input type="text" class="form-control" name="bahasa" value="<?= $row['bahasa'];?>" readonly>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-md-4 col-5 col-form-label">Subjek</label>
                                <div class="col-lg-8 col-md-8 col-7">
                                    <input type="text" class="form-control" name="subjek" value="<?= $row['subjek'];?>" readonly> 
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-12">
                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-md-4 col-5 col-form-label">Pengarang</label>
                                <div class="col-lg-8 col-md-8 col-7">
                                    <input type="text" class="form-control" name="pengarang" value="<?= $row['pengarang'];?>" readonly>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-md-4 col-5 col-form-label">Penerbit</label>
                                <div class="col-lg-8 col-md-8 col-7">
                                    <input type="text" class="form-control" name="penerbit" value="<?= $row['penerbit'];?>" readonly>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-md-4 col-5 col-form-label">Tahun Terbit</label>
                                <div class="col-lg-8 col-md-8 col-7">
                                    <input type="text" class="form-control" name="tahun_terbit" value="<?= $row['tahun_terbit'];?>" readonly>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-md-4 col-5 col-form-label">Tempat Terbit</label>
                                <div class="col-lg-8 col-md-8 col-7">
                                    <input type="text" class="form-control" name="tempat_terbit" value="<?= $row['tempat_terbit'];?>" readonly>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-md-4 col-5 col-form-label">Jumlah</label>
                                <div class="col-lg-8 col-md-8 col-7">
                                    <input type="text" class="form-control" name="jumlah" value="<?= $row['jumlah'];?>" readonly>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                    </div>
                </div>
            </div>
            <div class="col col-lg-3 col-0 col-sm-0 d-none d-lg-block ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col col-lg-12 col-md-12 col-12">
                            <?php foreach( $buku_lain as $row)  : ?>
                                <div class="card mb-3" style="max-height: 150px;">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="gambar/buku/<?= $row["cover"]?>" class="img-fluid rounded-start" alt="..." style="height: 150px;">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <a class="text-black fw-bold" style="text-decoration:none;" href="detail_buku.php?kode_buku=<?= $row["kode_buku"] ?>"><?= $row["judul"]?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-1 col-0 col-sm-0 d-none d-lg-block">

            </div>
        </div>
    </div>
    

  </main>
<!-- Footer -->
    <footer>
        <?php include('footer.php'); ?>
    </footer>

<!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>

</body>

</html>