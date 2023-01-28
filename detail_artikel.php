<?php
require 'functions.php';
$id_artikel = $_GET['id_artikel'] ;
//error_reporting(0);
$data_artikel = query("SELECT * FROM artikel WHERE id_artikel = '$id_artikel' ");
$artikel_lain = query("SELECT * FROM artikel WHERE id_artikel != '$id_artikel' ORDER BY rand() LIMIT 5 ");

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
    <style>
        .isiTextArea{
    
        overflow:auto;
        width:100%;
        border: none;
        resize: none;
        }

        textarea {

        text-align: justify;
        }
    </style>

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
                        <a class="nav-link" href="home.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link" aria-current="page" href="koleksi.php?subjek=Semua">Koleksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="artikel.php">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="informasi.php">Informasi</a>
                    </li>
                    <?php session_start(); if( isset($_SESSION["login"])) : ?>
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
                                    <li class="breadcrumb-item"><a class="nav-link" href="artikel.php">Artikel</a></li>
                                        <?php foreach( $data_artikel as $row)  : ?>
                                    <li class="breadcrumb-item active" aria-current="page">Detail Artikel <?php echo $row['judul_artikel'];?></li>
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
                            <h5 class="fw-bold"> Artikel Lainnya </h5>
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
                        <?php foreach( $data_artikel as $row)  : ?>
                            <div class="col col-lg-12 col-md-12 col-sm-12">
                                <p class="fw-bold">Wanareja, <?php echo $row['tgl_posting'];?></p>
                                <h4 class="fw-bold text-center mt-3"><?php echo $row['judul_artikel'];?></h4>
                                <img src="gambar/artikel/<?= $row["gambar_artikel"]?>" class="img-fluid rounded mx-auto d-block" alt="..." >
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row">
                        <?php foreach( $data_artikel as $row)  : ?>
                        <div class="col col-lg-12 col-md-12 col-12">
                            <textarea readonly id="textJudulArea" class="form-control-plaintext lh-base" style="resize: none; min-height: 600px;"><?= $row["isi_artikel"]?>    </textarea>
                            <div class="text-bg-secondary rounded p-3 mt-5 mb-3 bg-opacity-10">
                                <?php if( $row["referensi"] == "") : ?>
                                    <p class="text-dark fw-bold">Referensi / Sumber : - </p>
                                <?php else : ?>
                                    <p class="text-dark"><b>Referensi / Sumber : </b><a href="<?= $row["referensi"] ?>"> <?= $row["referensi"] ?></a></p>
                                <?php endif ?>
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
                            <div class="row row-cols-lg-1 row-cols-sm-1 row-cols-1 g-3">
                                <?php foreach( $artikel_lain as $row)  : ?>
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
    <script>
        function autoHeightText(){
            var textArea = document.getElementById('textJudulArea');
            if (navigator.appName.indexOf("Microsoft Internet Explorer") == 0){
            textArea.style.overflow = 'visible';
            return;
            }
            while (textArea.scrollHeight > textArea.offsetHeight){
            textArea.rows++;
            }
        }
        window.onload = autoHeightText;
    </script>

</body>

</html>