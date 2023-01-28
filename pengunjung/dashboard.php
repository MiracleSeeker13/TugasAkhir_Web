<?php
session_start();
error_reporting(0);
require '../functions.php';


if( !isset($_SESSION["login"])) {
  header("Location: ../login.php");
  exit;
}

if( $_SESSION["level"] != "pengunjung") {
  header("Location: ../admin/dashboard.php");
  exit;
}

if(isset($_POST["hapus_markah"]) ) {
    if(hapus_markah($_POST) > 0 ) {
        // $berhasil_dihapus = true;
        echo "<script>
            alert('Markah Berhasil Dihapus!'); document.location.href='../pengunjung/dashboard.php';
        </script>";
    }else{
        // $gagal_dihapus = true;
        echo "<script>
            alert('Markah Gagal Dihapus!'); document.location.href='../pengunjun/dashboard.php';
        </script>";
    }
}

$user = query("SELECT * FROM user WHERE id_user = ".$_SESSION["id_user"]);


$cekmarkah = mysqli_query($conn,"SELECT id_user FROM markah WHERE id_user =".$_SESSION["id_user"]);

if(isset($_POST["edit_akun"])){
    //cek data berhasil atau tidak
    if(edit_akun($_POST) > 0 ) {
        echo "<script>
            alert('Data Akun Berhasil Diubah!'); document.location.href='../pengunjung/dashboard.php';
        </script>";
    }else{
        echo "<script>
            alert('Data Akun Gagal Diubah!'); document.location.href='../pengunjung/dashboard.php';
        </script>";
    } 
}
if(isset($_POST["edit_password"])){
    //cek data berhasil atau tidak
    if(edit_password($_POST) > 0 ) {
        echo "<script>
            alert('Passowrd Berhasil Diubah!'); document.location.href='../pengunjung/dashboard.php';
        </script>";
    }else{
        echo "<script>
            alert('Passowrd Gagal Diubah!'); document.location.href='../pengunjung/dashboard.php';
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
<!-- Data Tables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 


</head>

<body>
<!-- Navbar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
            <img src="../gambar/logo.png" class="img-fluid me-2 d-none d-lg-block " width="50">
            <a class="navbar-brand" href="#"><b>Perpustakaan SMKN 1 Wanareja</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../home.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../koleksi.php?subjek=Semua">Koleksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../artikel.php">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../informasi.php">Informasi</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link active dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span><i class="bi bi-person-fill"></i> Akun </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="../login.php">
                                <i class="bi bi-person-circle"></i></i> Dashboard</a>
                            </li>
                            <li><a class="dropdown-item" href="../logout.php"><i class="bi bi-power"></i> Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<!-- Konten-->
    <div class="container-fluid">
        <div class="row">
        <!-- Sidebar-->
            <?php foreach( $user as $row)  : ?>
            <div class="col col-lg-2 col-md-0 col-0 text-center sidebar sidebar-sticky  d-lg-block d-none">
                <img src="../gambar/akun/<?php echo $row['gambar'];?>"  class="img-fluid border border-3 rounded mt-4 d-none d-lg-block" alt="..." style="width: 250px;">  
            </div>
            <div class="col col-lg-10 col-md-12 col-12 main-sticky">
                <div class="container-fluid mt-2">
                    <div class="row">
                        <div class="col col-lg-12 col-md-12 col-12">
                            <div class="row">  
                                <div class="col-lg-9 col-md-9 col-12 p-2">
                                    <div class="row"> 
                                        <div class="col-lg-6 col-md-6 col-12 text-start">
                                            <h3 class="fw-bold ">Hi, <?php echo $row['username'];?></h3>
                                            <div class="d-block d-lg-none d-md-none">
                                                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalKelolaAkun">
                                                    <i class="bi bi-pencil-square"></i></i> Kelola Akun</a>
                                                </button>
                                                <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalGantiPassword">
                                                    <i class="bi bi-gear-fill"></i></i> Ubah Password</a>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-0 text-end d-none d-lg-block d-md-block">
                                            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalKelolaAkun">
                                                <i class="bi bi-pencil-square"></i></i> Kelola Akun</a>
                                            </button>
                                            <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalGantiPassword">
                                                <i class="bi bi-gear-fill"></i></i> Ubah Password</a>
                                            </button>
                                        </div>
                                    </div>    
                                    <p>Selamat Datang di Dashboard Pengguna, tempat anda dapat melihat data akun dan daftar buku yang telah anda beri markah.</p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-12 p-2 d-none d-lg-block d-md-block">
                                    <div class="card card-dashboard text-center shadow">
                                        <h5 class="my-1">Jumlah Markah Buku</h5>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <i class="display-5 bi bi-book"></i>
                                            </div>   
                                            <div class="col-lg-6 col-md-6">
                                                <?php if( mysqli_fetch_assoc($cekmarkah)) : ?>
                                                    <?php $jumlahmarkah = count (query("SELECT * FROM markah_buku WHERE id_user = ".$_SESSION["id_user"]));?>
                                                    <h1 class=""> <?= $jumlahmarkah; ?> </h1>
                                                <?php else : ?>
                                                    <h1 class=""> 0 </h1>
                                                <?php endif ?>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col col-lg-12 col-md-12 col-12 ">
                        <?php if( $jumlahmarkah >= 1) : ?>
                            <h4 class="fw-bold ">Daftar Markah Buku</h4>
                            <hr>
                            <div class="table-responsive">
                                <table id="table"  class="table table-hover border">
                                    <thead class="thead text-center">
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Buku</th>
                                            <th>Judul</th>
                                            <th>Pengarang</th>
                                            <th>Subjek</th>
                                            <th>Jumlah</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $markah = query("SELECT * FROM markah_buku WHERE id_user = ".$_SESSION["id_user"]); ?>
                                        <?php $i = 1 ?>
                                        <?php foreach( $markah as $row)  : ?>
                                            <tr> 
                                                <td><?= $i;?></td>
                                                <td><?= $row['kode_buku'];?></td>
                                                <td><?= $row['judul'];?></td>
                                                <td><?= $row['pengarang'];?></td>
                                                <td><?= $row['subjek'];?></td>
                                                <td><?= $row['jumlah'];?></td>
                                                <td>
                                                    <button type="submit" class="btn btn-outline-danger btn-sm mb-1 mt-1" data-bs-toggle="modal" data-bs-target="#ModalHapus<?= $row["id_markah"]?>">
                                                        <i class="bi bi-trash"></i> Hapus Markah
                                                    </button>

                                                    <!-- Modal Hapus Markah -->
                                                    <form action="" method="POST">
                                                        <div class="modal fade" id="ModalHapus<?= $row["id_markah"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered ">
                                                                <div class="modal-content">
                                                                    <div class="modal-header text-center">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Anda yakin untuk menghapus markah buku <i><?= $row["judul"]?></i> ?</h5>
                                                                    </div>
                                                                    <form action="" method="post" enctype="multipart/form-data">
                                                                    <div class="modal-body text-center">
                                                                        <input type="text" hidden class="form-control" name="id_markah" value="<?= $row["id_markah"]?>"> 
                                                                    <div class="row justify-content-end">
                                                                        <div class="col-lg-4 col-lg-4 col-sm-4 col-4">
                                                                        <button type="button" class="btn btn-secondary text-white rounded-pill" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                                                                        <button type="submit" class="btn btn-danger text-white rounded-pill" name="hapus_markah">Hapus</button>
                                                                        </div>
                                                                    </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php $i++ ?>
                                        <?php endforeach?>
                                    </tbody>
                                    <script>
                                        $(document).ready(function(){
                                        $('#table').DataTable();});
                                    </script>
                                </table>
                            </div> 
                        <?php else : ?>
                            <h4 class="fw-bold ">Daftar Markah Buku</h4>
                            <hr>
                            <div class="table-responsive">
                                <table id="table"  class="table table-hover border">
                                    <thead class="thead text-center">
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Buku</th>
                                            <th>Judul</th>
                                            <th>Pengarang</th>
                                            <th>Subjek</th>
                                            <th>Jumlah</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr> 
                                                <td colspan="7"><h5 class="fw-bold text-center text-secondary">Belum Ada Markah Buku</h5></td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div> 
                        <?php endif ?>
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