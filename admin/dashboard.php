<?php
session_start();

require '../functions.php';


if( !isset($_SESSION["login"])) {
  header("Location: ../login.php");
  exit;
}

if( $_SESSION["level"] != "admin") {
  header("Location: ../pengunjung/dashboard.php");
  exit;
}

$user = query("SELECT * FROM user WHERE id_user = ".$_SESSION["id_user"]);

$daftar_buku = query("SELECT * FROM buku ORDER BY id_buku DESC LIMIT 5");
$daftar_user = query("SELECT * FROM user ORDER BY id_user DESC LIMIT 5");
$daftar_artikel = query("SELECT * FROM artikel ORDER BY id_artikel DESC LIMIT 5");

$jumlahsubjek = count (query("SELECT * FROM subjek"));
$jumlahakun = count (query("SELECT * FROM user"));
$jumlahbuku = count (query("SELECT * FROM buku"));
$jumlahartikel = count (query("SELECT * FROM artikel"));

if(isset($_POST["edit_akun"])){
    //cek data berhasil atau tidak
    if(edit_akun($_POST) > 0 ) {
        echo "<script>
            alert('Akun Berhasil Diubah!'); document.location.href='../admin/dashboard.php';
        </script>";
    }else{
        echo "<script>
            alert('Akun Berhasil Diubah!'); document.location.href='../admin/dashboard.php';
        </script>";
    } 
}
if(isset($_POST["edit_password"])){
    //cek data berhasil atau tidak
    if(edit_password($_POST) > 0 ) {
        echo "<script>
            alert('Passowrd Berhasil Diubah!'); document.location.href='../admin/dashboard.php';
        </script>";
    }else{
        echo "<script>
            alert('Passowrd Berhasil Diubah!'); document.location.href='../admin/dashboard.php';
        </script>";
    } 
}

?>
<!doctype html>
<html lang="en">

<head>
  <title>Perpustakaan SMKN 1 Wanareja</title>
  <link rel="shortcut icon" href="../gambar/logo.png">
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <?php include('../style.php'); ?>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/5.2.0/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/5.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript">
        window.onload=function(){
        !function(a){a(function(){a('[data-toggle="password"]').each(function(){var b = a(this); var c = a(this).parent().find(".input-group-text"); c.css("cursor", "pointer").addClass("input-password-hide"); c.on("click", function(){if (c.hasClass("input-password-hide")){c.removeClass("input-password-hide").addClass("input-password-show"); c.find(".fa").removeClass("fa-eye").addClass("fa-eye-slash"); b.attr("type", "text")} else{c.removeClass("input-password-show").addClass("input-password-hide"); c.find(".fa").removeClass("fa-eye-slash").addClass("fa-eye"); b.attr("type", "password")}})})})}(window.jQuery);
        }
</script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
        $(document).ready(function(){
        $("#username_salah").modal('show');
    });
    $(document).ready(function(){
        $("#password_tidak_sesuai").modal('show');
    });
</script>


</head>

<body>
<!-- Navbar -->
    <?php include '../header/navbar_admin.php'; ?>

<!-- Konten-->
    <div class="container-fluid">
        <div class="row">
        <!-- Sidebar-->
            <div class="col col-lg-2 col-md-0 col-0 sidebar">
                <nav class="navbar-expand-lg">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <img src="../gambar/akun/<?php echo $row['gambar'];?>"  class="img-fluid border border-3 rounded my-2 d-none d-lg-block" alt="..." style="width: 250px;">  
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sidebar" href="dashboard.php">Dashboard</a>                 
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sidebar" href="daftar_akun.php">Daftar Akun</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sidebar" href="daftar_buku.php">Daftar Buku</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sidebar" href="daftar_subjek.php">Daftar Subjek</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sidebar" href="daftar_artikel.php">Daftar Artikel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="sidebar" target="_blank" href="../home.php"><i class="bi bi-box-arrow-up-right"></i> Halaman Website</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>

            <div class="col col-lg-10 col-md-12 col-12 p-3 main-sticky">      
            <!-- Card Ringkasan -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col col-lg-12 col-md-12 col-12">
                            <div class="row">  
                                <div class="col-lg-3 col-md-6 col-12 p-2">
                                    <div class="card card-dashboard text-center shadow">
                                        <h5 class="mt-3 mb-3">Jumlah Akun</h5>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <i class="display-3 bi bi-people"></i>
                                            </div>   
                                            <div class="col-lg-6">
                                                <h1 class="mb-3 mt-3"><?= $jumlahakun ?></h1>    
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12 p-2">
                                    <div class="card card-dashboard text-center shadow">
                                        <h5 class="mt-3 mb-3">Jumlah Buku</h5>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <i class="display-3 bi bi-book"></i>
                                            </div>   
                                            <div class="col-lg-6">
                                                <h1 class="mb-3 mt-3"><?= $jumlahbuku ?></h1>    
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12 p-2">
                                    <div class="card card-dashboard text-center shadow">
                                        <h5 class="mt-3 mb-3">Jumlah Subjek</h5>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <i class="display-3 bi bi-tags"></i>
                                            </div>   
                                            <div class="col-lg-6">
                                                <h1 class="mb-3 mt-3"><?= $jumlahsubjek ?></h1>    
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-12 p-2">
                                    <div class="card card-dashboard text-center shadow">
                                        <h5 class="mt-3 mb-3">Jumlah Artikel</h5>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <i class="display-3 bi bi-file-earmark-richtext"></i>
                                            </div>   
                                            <div class="col-lg-6">
                                                <h1 class="mb-3 mt-3"><?= $jumlahartikel ?></h1>    
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>

                <div class="container-fluid my-3">
                    <div class="row">
                        <div class="col col-lg-12 col-md-12 col-12">
                            <h5>Daftar Buku Terbaru</h5>
                            <div class="table-responsive">
                                <table id="table"  class="table table-hover table-bordered">
                                    <thead class="thead text-center">
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Buku</th>
                                            <th>Judul</th>
                                            <th>Subjek</th>
                                            <th>Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach( $daftar_buku as $row)  : ?>
                                        <tr> 
                                            <td><?= $i;?></td>
                                            <td><?= $row['kode_buku'];?></td>
                                            <td><?= $row['judul'];?></td>
                                            <td><?= $row['subjek'];?></td>
                                            <td><?= $row['jumlah'];?></td>
                                        </tr>
                                    <?php $i++ ?>
                                    <?php endforeach?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 

                <div class="container-fluid my-3">
                    <div class="row">
                        <div class="col col-lg-6 col-md-12 col-12">
                            <h5>Daftar Akun Terbaru</h5>
                            <div class="table-responsive">
                                <table id="table"  class="table table-hover table-bordered">
                                    <thead class="thead text-center">
                                        <tr>
                                            <th>No.</th>
                                            <th>No. Identitas</th>
                                            <th>Username</th>
                                            <th>Hak Akses</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach( $daftar_user as $row)  : ?>
                                        <tr> 
                                            <td><?= $i;?></td>
                                            <td><?= $row['no_identitas'];?></td>
                                            <td><?= $row['username'];?></td>
                                            <td><?= $row['level'];?></td>
                                        </tr>
                                    <?php $i++ ?>
                                    <?php endforeach?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col col-lg-6 col-md-12 col-12">
                            <h5>Daftar Artikel Terbaru</h5>
                            <div class="table-responsive">
                                <table id="table"  class="table table-hover table-bordered">
                                    <thead class="thead text-center">
                                        <tr>
                                            <th>No.</th>
                                            <th>Judul Artikel</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach( $daftar_artikel as $row)  : ?>
                                        <tr> 
                                            <td><?= $i;?></td>
                                            <td><?= $row['judul_artikel'];?></td>
                                        </tr>
                                    <?php $i++ ?>
                                    <?php endforeach?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>

  <footer>
    
  </footer>
<!-- Modal Kelola Akun -->
    <?php foreach( $user as $row)  : ?>
    <div class="modal fade" id="exampleModalKelolaAkun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="" method="post" enctype="multipart/form-data">
            <?php include('../modal/modal_kelola_akun.php'); ?>
        </form>
    </div>
    <?php endforeach ?>

<!-- Modal Ganti Password -->
    <?php foreach( $user as $row)  : ?>
    <div class="modal fade" id="exampleModalGantiPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="" method="post" enctype="multipart/form-data">
            <?php include('../modal/modal_ganti_password.php'); ?>
        </form>
    </div>
    <?php endforeach ?>

</body>

</html>