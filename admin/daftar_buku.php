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

if(isset($_POST["edit_akun"])){
    //cek data berhasil atau tidak
    if(edit_akun($_POST) > 0 ) {
        echo "<script>
            alert('Akun Berhasil Diubah!'); document.location.href='../admin/daftar_buku.php';
        </script>";
    }else{
        echo "<script>
            alert('Akun Berhasil Diubah!'); document.location.href='../admin/daftar_buku.php';
        </script>";
    } 
}
if(isset($_POST["edit_password"])){
    //cek data berhasil atau tidak
    if(edit_password($_POST) > 0 ) {
        echo "<script>
            alert('Passowrd Berhasil Diubah!'); document.location.href='../admin/daftar_buku.php';
        </script>";
    }else{
        echo "<script>
            alert('Passowrd Berhasil Diubah!'); document.location.href='../admin/daftar_buku.php';
        </script>";
    } 
}

$user = query("SELECT * FROM user WHERE id_user = ".$_SESSION["id_user"]);
$buku = query("SELECT * FROM buku");
$subjek = query("SELECT * FROM subjek");

if(isset($_POST["tambah_buku"]) ) {
    if(tambah_buku($_POST) > 0 ) {
        // $berhasil_dihapus = true;
        echo "<script>
            alert('Data Buku Berhasil Ditambahkan!'); document.location.href='../admin/daftar_buku.php';
        </script>";
    }else{
        // $gagal_dihapus = true;
        echo "<script>
            alert('Data Buku Gagal Ditambahkan!'); document.location.href='../admin/daftar_buku.php';
        </script>";
    }
}
if(isset($_POST["edit_buku"]) ) {
    if(edit_buku($_POST) > 0 ) {
        // $berhasil_dihapus = true;
        echo "<script>
            alert('Data Buku Berhasil Diubah!'); document.location.href='../admin/daftar_buku.php';
        </script>";
    }else{
        // $gagal_dihapus = true;
        echo "<script>
            alert('Data Buku Gagal Diubah!'); document.location.href='../admin/daftar_buku.php';
        </script>";
    }
}
if(isset($_POST["hapus_buku"]) ) {
    if(hapus_buku($_POST) > 0 ) {
        // $berhasil_dihapus = true;
        echo "<script>
            alert('Data Buku Berhasil Dihapus!'); document.location.href='../admin/daftar_buku.php';
        </script>";
    }else{
        // $gagal_dihapus = true;
        echo "<script>
            alert('Data Buku Gagal Dihapus!'); document.location.href='../admin/daftar_buku.php';
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
            <div class="row"> 
                <div class="col-lg-4 col-md-4 col-12 text-start">
                    <h4 class="fw-bold ">Daftar Buku</h4>
                </div>
                <div class="col-lg-8 col-md-8 col-12 text-end">
                    <button type="submit" class="btn btn-success text-white rounded-pill" data-bs-toggle="modal" data-bs-target="#ModalTambah">Tambah Buku</button>
                    <a target="_blank" href="data_buku_pdf.php" class="btn btn-outline-danger rounded-pill"><i class="bi bi-filetype-pdf"> Cetak PDF</i></a>
                    <a target="_blank" href="cetakexcel.php" class="btn btn-outline-success rounded-pill"><i class="bi bi-file-earmark-excel"> Cetak Excel</i></a>
                </div>
            </div>
            <hr>  
                <div class="table-responsive">
                    <table id="table"  class="table table-hover">
                        <thead class="thead text-center">
                            <tr>
                                <th>No. </th>
                                <th>Kode Buku</th>
                                <th>Judul</th>
                                <th>Penerbit</th>
                                <th>Tahun Terbit</th>
                                <th>Subjek</th>
                                <th>Pengarang</th>
                                <th>Jumlah</th>
                                <th>Kondisi</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1 ?>
                        <?php foreach( $buku as $row)  : ?>
                            <tr>
                                <td><?= $i;?></td>    
                                <td><?= $row['kode_buku'];?></td>
                                <td><?= $row['judul'];?></td>
                                <td><?= $row['penerbit'];?></td>
                                <td><?= $row['tahun_terbit'];?></td>
                                <td><?= $row['subjek'];?></td>
                                <td><?= $row['pengarang'];?></td>
                                <td><?= $row['jumlah'];?></td>
                                <td><?= $row['kondisi'];?></td>
                                <td> 
                                    <button type="button" class="btn btn-outline-primary btn-sm mb-1 mt-1"  data-bs-toggle="modal" data-bs-target="#ModalEdit<?= $row["id_buku"]?>">
                                        <i class="bi bi-search"></i> Kelola Buku
                                    </button>
                                    <button type="submit" class="btn btn-outline-danger btn-sm mb-1 mt-1" data-bs-toggle="modal" data-bs-target="#ModalHapus<?= $row["id_buku"]?>">
                                        <i class="bi bi-trash"></i> Hapus Buku
                                    </button>

                                    
                                    <!-- Modal Tambah Buku -->
                                    <form action="" method="post" enctype="multipart/form-data">
                                            <div class="modal fade text-start" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <?php include('../modal/modal_tambah_buku.php'); ?>
                                            </div>
                                    </form>
                                    <!-- Modal Kelola Buku -->
                                    <form action="" method="post" enctype="multipart/form-data">
                                            <div class="modal fade text-start" id="ModalEdit<?= $row["id_buku"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <?php include('../modal/modal_edit_buku.php'); ?>
                                            </div>
                                    </form>
                                    <!-- Modal Hapus Artikel -->
                                    <form action="" method="POST">
                                        <div class="modal fade" id="ModalHapus<?= $row["id_buku"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered ">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h5 class="modal-title" id="exampleModalLabel">Anda yakin untuk menghapus Buku <i><?= $row["judul"]?></i> ?</h5>
                                                    </div>
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="modal-body text-center">
                                                        <input type="text" hidden class="form-control" name="id_buku" value="<?= $row["id_buku"]?>"> 
                                                    <div class="row justify-content-end">
                                                        <div class="col-lg-4 col-lg-4 col-sm-4 col-4">
                                                        <button type="button" class="btn btn-secondary text-white rounded-pill" data-bs-dismiss="modal" aria-label="Close">Batal</button>
                                                        <button type="submit" class="btn btn-danger text-white rounded-pill" name="hapus_buku">Hapus</button>
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
            </div>
        </div>
    </div>
  </main>
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