<?php
require 'functions.php';
if(isset($_POST["daftar"]) ) {
    
    if(registrasi($_POST) > 0 ) {
    echo "<script>
        alert('Pendaftaran Akun Berhasil'); document.location.href='login.php';
    </script>";
    }else{
        echo mysqli_error($conn);
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

  <!-- Bootstrap CSS v5.2.1 -->
  <?php include('style.php'); ?>
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/5.2.0/css/bootstrap.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/5.2.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript">
        window.onload=function(){
        !function(a){a(function(){a('[data-toggle="password"]').each(function(){var b = a(this); var c = a(this).parent().find(".input-group-text"); c.css("cursor", "pointer").addClass("input-password-hide"); c.on("click", function(){if (c.hasClass("input-password-hide")){c.removeClass("input-password-hide").addClass("input-password-show"); c.find(".fa").removeClass("fa-eye").addClass("fa-eye-slash"); b.attr("type", "text")} else{c.removeClass("input-password-show").addClass("input-password-hide"); c.find(".fa").removeClass("fa-eye-slash").addClass("fa-eye"); b.attr("type", "password")}})})})}(window.jQuery);
        }
</script>

</head>

<body class="bgimg">
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container-fluid rounded shadow position-absolute top-50 start-50 translate-middle">
        <div class="row">
            <div class="col col-lg-4 col-md-2 col-1">
            </div>

            <div class="col col-lg-4 col-md-8 col-10 bgwhite shadow p-3 bg-body rounded">
            <a href="home.php" class="nav-link btn-close  mt-2 me-2 ms-auto" aria-label="Close"></a>
            <form action="" method="POST">
                <img src="gambar/logo.png"  class="rounded mx-auto d-block mb-3" alt="..." style="height: 100px;">
                <h5 class="judul mb-3">Daftar Akun</h5>
                    <div class="mb-2">
                        <label class="form-label ms-1">Nomor Identitas</label>
                        <input type="text" placeholder="Masukkan Nomor Identitas (Nomor KTP / NIS / NISN / NIK)" class="form-control" name="no_identitas" title="Angka (0-9)" pattern="[0-9]+" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label ms-1">Username</label>
                        <input type="text" placeholder="Masukkan Username" class="form-control" name="username" title="Huruf dan Angka (A-Z, a-z, 0-9)" pattern="[A-Za-z0-9 .,]+" minlength="4" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label ms-1">Email</label>
                        <input type="email" placeholder="Masukkan Email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-2">
                        <label for="disabledSelect" class="form-label ms-1">Password</label>
                        <div class="input-group">
                            <input type="password"  placeholder="Masukkan Password" class="form-control" name="password" data-toggle="password" id="password" title="Huruf dan Angka (A-Z, a-z, 0-9)" pattern="[A-Za-z0-9]+" required>
                            <div class="input-group-append">
                                <span class="input-group-text ms-1 bg-light" style="padding:0.6rem;"><i class="fa fa-eye"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="disabledSelect" class="form-label ms-1">Konfirmasi Password</label>
                        <div class="input-group">
                        <input type="password"  placeholder="Masukkan Ulang Password" class="form-control" name="password2" data-toggle="password" id="password" title="Huruf dan Angka (A-Z, a-z, 0-9)" pattern="[A-Za-z0-9]+" required>
                            <div class="input-group-append">
                                <span class="input-group-text ms-1 bg-light" style="padding:0.6rem;"><i class="fa fa-eye"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" name="daftar" class="btn mt-3 rounded-pill btn-outline-success">Daftar</button>
                    </div>
                    <div class="text-center">
                        <label class="form-label mt-3">Sudah Memiliki Akun? <a class="fw-bold" href="login.php" style="color: var(--brand3); text-decoration: none;">Login</a></label>
                    </div>
            </form>
            </div>

            <div class="col col-lg-4 col-md-2 col-1 ">
            </div>
        </div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>

</body>

</html>