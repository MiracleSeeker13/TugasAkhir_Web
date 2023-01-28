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
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
    h4{
        text-align: center;
    }
	</style>

</head>

<body>
    <main>
        <div class="container-fluid">
            <h4> Daftar Buku Perpustakaan SMKN 1 Wanareja </h4>  
                <table id="table"  class="table text-center table-bordered">
                        <thead class="thead">
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
    </main>
</body>

</html>