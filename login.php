<?php
session_start();
require 'functions.php';

if( isset($_SESSION["login"])) {
    if($_SESSION["level"] == 'admin'){
        header("Location: admin/dashboard.php");
        exit;
    }else{
        header("Location: pengunjung/dashboard.php");
        exit;
    }
}


if( isset($_POST["login"])) {
    $no_identitas = $_POST["no_identitas"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE no_identitas = '$no_identitas' ");

    //cek username
    if ( mysqli_num_rows($result) === 1) {

        //cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ) {
            //set session
            $_SESSION["login"] = true;
            $_SESSION["level"] = $row["level"];
            $_SESSION["id_user"] = $row["id_user"];

            if($row["level"] == 'admin'){
                header("Location: admin/dashboard.php");
                exit;
            }else{
                header("Location: pengunjung/dashboard.php");
                exit;
            }
            
        }
        echo "<script>
          alert('Password Salah !'); document.location.href='login.php';
          </script>";
    }

    echo "<script>
        alert('Nomor Identitas Belum Terdaftar !'); document.location.href='login.php';
        </script>";
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
        $(document).ready(function(){
        $("#no_identitas_salah").modal('show');
    });
    $(document).ready(function(){
        $("#password_tidak_sesuai").modal('show');
    });
</script>

</head>

<body class="bgimg">
  <main>
    <div class="container-fluid rounded shadow position-absolute top-50 start-50 translate-middle">
        <div class="row">
            <div class="col col-lg-4 col-md-2 col-1">
            </div>

            <div class="col col-lg-4 col-md-8 col-10 bgwhite py-3 shadow p-3 bg-body rounded">
                <a href="home.php" class="nav-link btn-close  mt-2 me-2 ms-auto" aria-label="Close"></a>
                <img src="gambar/logo.png"  class="rounded mx-auto d-block mb-5" alt="..." style="height: 150px;">
                <h5 class="judul mb-3">Login Akun</h5>
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label ms-1">No. Identitas</label>
                        <input type="text" class="form-control"  name="no_identitas" id="no_identitas" required placeholder="Nomor Identitas (Nomor KTP / NIS / NISN / NIK)">
                    </div>
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label ms-1">Password</label>
                        <div class="input-group">
                        <input type="password" class="form-control input-md" name="password" data-toggle="password" required  placeholder="Password">
                        <div class="input-group-append">
                            <span class="input-group-text ms-1 bg-light" style="padding:0.6rem;"><i class="fa fa-eye"></i></span>
                        </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" name="login" class="btn mt-3 rounded-pill btn-outline-primary">Login</button>
                    </div>
                    <div class="text-center">
                        <label class="form-label mt-3">Belum Memiliki Akun? <a class="fw-bold" href="daftar.php" style="color: var(--brand3); text-decoration: none;">Daftar</a></label>
                    </div>
                </form>
            </div>

            <div class="col col-lg-4 col-md-2 col-1 ">
            </div>
        </div>
    </div>
  </main>

  <!-- Modal Pesan -->
<?php
  if(isset($error)){ ?>
    <div class="modal fade" id="no_identitas_salah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body text-center">
            <!-- <img src="image/gagal.jpg" class="img-fluid w-25" id="gambar_effect"> -->
            <h6 class="lh-lg">No. Identitas Belum Terdaftar</h6>
          </div>
            <div class="col-lg-12 justify-content-end text-end">
            <a href="login.php" class="btn btn-primary rounded-pill mb-2 me-2">OK</a>
          </div>
        </div>
      </div>
    </div>

<?php } 
            if(isset($error1)){ ?>
            <div class="modal fade" id="password_tidak_sesuai" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <!-- <img src="image/gagal.jpg" class="img-fluid w-25" id="gambar_effect"> -->
                    <h6 class="lh-lg">Password Salah!</h6>
                  </div>
                  <div class="col-lg-12 justify-content-end text-end">
                    <a href="login.php" class="btn btn-primary rounded-pill mb-2 me-2">OK</a>
                  </div>
                </div>
              </div>
            </div>

<?php } ?>

</body>
</html>