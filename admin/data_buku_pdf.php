<?php
require '../functions.php';

$buku = query("SELECT * FROM buku");


?>
<!doctype html>
<html lang="en">

<head>
<title>Daftar Buku Perpustakaan SMKN 1 Wanareja</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  <style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
    h3{
        text-align: center;
        line-height: 30px;
        font-weight: bold;
    }
    h6{
        text-align: center;
        line-height: 20px;
        font-weight: bold;
    }
    p{
        text-align: center;
        line-height: 20px;
    }
	</style>

</head>

<body>
    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <table class="table table-borderless">
                        <tbody> 
                            <tr>
                                <td scope="col" style="text-align: center;">
                                    <img src="../gambar/logo_2.png" class="img-fluid" alt="..." style="width: 150px;">
                                </td>
                                <td scope="col" style="text-align: center;">
                                    <h6>PEMERINTAH PROVINSI JAWA TENGAH<br>
                                        DINAS PENDIDIKAN DAN KEBUDAYAAN</h6>
                                    <h3>SEKOLAH MENENGAH KEJURUAN NEGERI 1 WANAREJA</h3>
                                    <p>Jalan Srikaya Wanareja, Cilacap Kode Pos 53265 Telepon 0280-6260233<br>
                                        Faksimile : 0280-6260233 Surat Elektronik : smkonewan@yahoo.co.id<br>
                                        CILACAP
                                    </p>
                                </td>
                                <td scope="col" style="text-align: center;">
                                    <img src="../gambar/logo_jateng.png" class="img-fluid" alt="..." style="width: 150px;">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr class="border border-dark border-2 opacity-100">   
                    <table class="table table-bordered border-dark">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Kode Buku</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Edisi</th>
                                <th scope="col">ISBN</th>
                                <th scope="col">Pengarang</th>
                                <th scope="col">Penerbit</th>
                                <th scope="col">Tahun Terbit</th>
                                <th scope="col">Tempat Terbit</th>
                                <th scope="col">Bahasa</th>
                                <th scope="col">Subjek</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Kondisi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1 ?>
                        <?php foreach( $buku as $row)  : ?>
                            
                            <tr>
                                <td style="text-align: center;"><?= $i ?></td>
                                <td style="text-align: center;"><?= $row["kode_buku"] ?></td>
                                <td><?= $row["judul"] ?></td>
                                <?php if( $row["edisi"] == "") : ?>
                                    <td style="text-align: center;"> - </td>
                                <?php else : ?>
                                    <td style="text-align: center;"><?= $row["edisi"] ?></td>
                                <?php endif ?>
                                <?php if( $row["ISBN"] == "") : ?>
                                    <td> - </td>
                                <?php else : ?>
                                    <td><?= $row["ISBN"] ?></td>
                                <?php endif ?>
                                </td>
                                <td><?= $row["pengarang"] ?></td>
                                <td><?= $row["penerbit"] ?></td>
                                <td style="text-align: center;"><?= $row["tahun_terbit"] ?></td>
                                <td><?= $row["tempat_terbit"] ?></td>
                                <td><?= $row["bahasa"] ?></td>
                                <td><?= $row["subjek"] ?></td>
                                <td style="text-align: center;"><?= $row["jumlah"] ?></td>
                                <td style="text-align: center;"><?= $row["kondisi"] ?></td>
                            </tr>
                        <?php $i++ ?>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script>
		window.print();
	</script>
</body>

</html>