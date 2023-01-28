<?php
require 'functions.php';
$subjek = $_GET['subjek'] ;
error_reporting(0);
if( isset($_GET["cari"]) ) {
    $keyword = $_GET['keyword'];
    $subjek = $_GET['subjek'];
    $jumlahData = query("SELECT * FROM buku WHERE judul LIKE '%$keyword%' ");

    if( $jumlahData == 0 ){
        echo "<script>
					alert('Buku Tidak Ditemukan!'); document.location.href='koleksi.php?subjek=Semua';
				</script>";
		return false;
    }else{
        $keyword = $_GET['keyword'];
        $subjek = $_GET['subjek'];
        $jumlahDataPerHalaman = 10;
        $jumlahData = count (query("SELECT * FROM buku WHERE judul LIKE '%$keyword%' "));
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
        $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
        $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
    
        $data_buku = query("SELECT * FROM buku WHERE judul LIKE '%$keyword%' ORDER BY judul LIMIT $awalData, $jumlahDataPerHalaman ");  
    }
    
}else{
    if( $subjek == "Semua"){
        $keyword = NULL;
        $cari = NULL;
        $jumlahDataPerHalaman = 10;
        $jumlahData = count (query("SELECT * FROM buku"));
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
        $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
        $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
    
        $data_buku = query("SELECT * FROM buku ORDER BY judul LIMIT $awalData, $jumlahDataPerHalaman ");
       
    }else{
        $keyword = NULL;
        $cari = NULL;
        $jumlahDataPerHalaman = 10;
        $jumlahData = count (query("SELECT * FROM buku WHERE subjek = '$subjek' "));
        $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
        $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
        $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
    
        $data_buku = query("SELECT * FROM buku  WHERE subjek = '$subjek' ORDER BY judul LIMIT $awalData, $jumlahDataPerHalaman ");
    }

}

if(isset($_POST["markah"])){
    //cek data berhasil atau tidak
    if(tambah_markah($_POST) > 0 ) {
        echo "<script>
            alert('Buku Berhasil Diberi Markah !');
        </script>";
    }else{

    } 
}


$sub = query("SELECT * FROM subjek ");
?>

<!doctype html>
<html lang="en">

<head>
  <title>Perpustakaan SMKN 1 Wanareja</title>
  <link rel="shortcut icon" href="gambar/logo.png">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-->
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
<!-- Bagian Judul -->
    <div class="container-fluid text-center text-black ">
        <div class="row">
            <div class="col col-lg-3 col-md-0 col-sm-0 d-none d-lg-block">

            </div>
            <div class="col col-lg-6 col-md-12 col-sm-12 py-3">
                <h2 class="judul"> Koleksi Buku </h2>
                <form class="d-flex my-2 " action="koleksi.php" method="GET" >
                    <input class="form-control me-2" type="text" name="keyword" autofocus placeholder="Mau cari buku apa hari ini ?" autocomplete="off">
                    <input class="form-control me-2" type="hidden" name="subjek" value="Semua">
                    <button class="btn btn-primary" type="submit" name="cari">Cari</button>
                </form>
            </div>
            <div class="col col-lg-3 col-md-0 col-sm-0 d-none d-lg-block">

            </div>
        </div>
    </div>
  </div>
<!-- Nama Subjek -->
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col col-lg-1 col-md-1 col-sm-0 d-none d-lg-block d-md-block">

            </div>
            <div class="col col-lg-4 col-md-8 col-sm-12">
               <h5 class="judul" style="text-align:left"><i> <?= $subjek ?> (<?= $jumlahData ?>) : </i></h5>
            </div>
            <div class="col col-lg-6 col-md-2 col-sm-12 ">   
                
            </div>
            <div class="col col-lg-1 col-md-1 col-sm-0 d-none d-lg-block d-md-block">

            </div>
        </div>
    </div>
<!-- Katalog Buku -->
    
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-1 col-md-0 col-sm-0 d-none d-lg-block">

            </div>
            <div class="col col-lg-7 col-md-9 col-12">
                <div class="row row-cols-1">
                <?php foreach( $data_buku as $row)  : ?>
                    <div class="col mb-2">
                        <div class="card  border-white p-auto" >
                            <div class="row g-0">
                                <div class="col-md-3 py-4 text-center">
                                    <img src="gambar/buku/<?php echo $row["cover"];?>"  class="img-fluid" alt="..." style="height: 200px">
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <a class="judul text-start fs-4" href="detail_buku.php?kode_buku=<?= $row["kode_buku"] ?>"><?= $row["judul"] ?></h4></a>
                                        <FORM ACTION="koleksi.php" METHOD="GET" NAME="subjek">
                                            <button class="btn btn-outline-secondary my-2" type="submit" name="subjek" value="<?= $row["subjek"] ?>"> 
                                                <?= $row["subjek"] ?> 
                                            </button>
                                        </FORM>
                                        <p> Penulis : <?= $row["pengarang"] ?> </p>
                                        <div class="d-grid gap-1 d-md-flex justify-content-md-end mt-auto">
                                            <form action="" method="POST">
                                            <a class="btn btn-outline-primary" href="detail_buku.php?kode_buku=<?= $row["kode_buku"] ?>"><i class="bi bi-search"></i> Detail Buku</a>
                                            <?php if( isset($_SESSION["login"])) : ?>
                                                <input type="text" hidden class="form-control" name="id_user" value="<?=$_SESSION["id_user"]?>">
                                                <input type="text" hidden class="form-control" name="id_buku" value="<?= $row["id_buku"]?>">
                                                <button class="btn btn-outline-success" type="submit" name="markah"><i class="bi bi-bookmark"></i> Markah</button>
                                            <?php else : ?>
                                                <span class="d-inline-block" tabindex="0" id="popoverButton" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="Disabled popover">
                                                    <button class="btn btn-outline-success" type="button" disabled><i class="bi bi-bookmark"></i> Markah</button>
                                                </span>
                                            <?php endif; ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                <?php endforeach ?>
                </div>
<!-- Pagination -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                    <?php if( isset ($_GET["cari"]) ) : ?>
                        <?php if( $halamanAktif > 1) : ?>
                        <li class="page-item"> 
                            <a class="page-link" href="?keyword=<?= $keyword; ?>&subjek=<?= $subjek; ?>&cari=&halaman=<?= $halamanAktif - 1; ?>"> &laquo; </a>    
                        </li>
                        <?php endif; ?>

                        <?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
                            <?php if( $i == $halamanAktif) : ?>
                                <li class="page-item" ><a class="page-link" style="font-weight: bold;" href="?keyword=<?= $keyword; ?>&subjek=<?= $subjek; ?>&cari=&halaman=<?= $i; ?>"> <?= $i; ?> </a></li>
                            <?php else : ?>
                                <li class="page-item" ><a class="page-link" href="?keyword=<?= $keyword; ?>&subjek=<?= $subjek; ?>&cari=&halaman=<?= $i; ?>"> <?= $i; ?> </a></li>
                            <?php endif; ?>
                        <?php endfor ?>

                        <?php if( $halamanAktif < $jumlahHalaman) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?keyword=<?= $keyword; ?>&subjek=<?= $subjek; ?>&cari=&halaman=<?= $halamanAktif + 1; ?>"> &raquo; </a>
                        </li>
                        <?php endif; ?>

                    <?php else : ?>
                        <?php if( $halamanAktif > 1) : ?>
                        <li class="page-item"> 
                            <a class="page-link" href="?keyword=<?= $keyword; ?>&subjek=<?= $subjek; ?>&halaman=<?= $halamanAktif - 1; ?>"> &laquo; </a>    
                        </li>
                        <?php endif; ?>

                        <?php for( $i = 1; $i <= $jumlahHalaman; $i++ ) : ?>
                            <?php if( $i == $halamanAktif) : ?>
                                <li class="page-item" ><a class="page-link" style="font-weight: bold;" href="?keyword=<?= $keyword; ?>&subjek=<?= $subjek; ?>&halaman=<?= $i; ?>"> <?= $i; ?> </a></li>
                            <?php else : ?>
                                <li class="page-item" ><a class="page-link" href="?keyword=<?= $keyword; ?>&subjek=<?= $subjek; ?>&halaman=<?= $i; ?>"> <?= $i; ?> </a></li>
                            <?php endif; ?>
                        <?php endfor ?>

                        <?php if( $halamanAktif < $jumlahHalaman) : ?>
                        <li class="page-item">
                            <a class="page-link" href="?keyword=<?= $keyword; ?>&subjek=<?= $subjek; ?>&halaman=<?= $halamanAktif + 1; ?>"> &raquo; </a>
                        </li>
                        <?php endif; ?>

                    <?php endif; ?>
                    </ul>
                </nav>
            </div>
<!-- Pilihan Subjek -->
            
            <div class="col col-lg-3 col-md-3 col-12 p-2">   
                <h5 class="judul">Pilihan Subjek</h5>
                <FORM ACTION="koleksi.php" METHOD="GET" NAME="subjek">
                    <!-- <ul class="list-group"> -->
                        <button class="btn-subjek border rounded" type="submit" name="subjek" value="Semua">Semua</button>
                    <?php foreach( $sub as $row)  : ?>
                        <button class="btn-subjek border rounded" type="submit" name="subjek" value="<?= $row["nama_subjek"] ?>"><?= $row["nama_subjek"] ?></button>
                    <?php endforeach ?>
                    <!-- </ul> -->
                </FORM>
            </div>
            <div class="col col-lg-1 col-md-0 col-sm-0 d-none d-lg-block">

            </div>
        </div>
    </div>
<!-- Footer -->
    <footer>
        <?php include('footer.php'); ?>
    </footer>

</body>

</html>