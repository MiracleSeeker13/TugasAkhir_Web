<?php 
//koneksi database
$conn = mysqli_connect("localhost", "root", "", "tugas_akhir");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

//funtion tambah data akun dengan register
function registrasi($data) {
	global $conn;

	$no_identitas = $data["no_identitas"];
	$username = stripcslashes($data["username"]);
	$email = $data["email"];
	$password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

	//cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT no_identitas FROM user WHERE no_identitas = '$no_identitas'");

	if(mysqli_fetch_assoc($result) ) {
		echo "<script>
					alert('Nomor Identitas sudah terdaftar!');
				</script>";
		return false;
	}
    //konfirmasi password
	if ($password !== $password2) {
		echo 	"<script>
					alert('Konfirmasi Password Tidak Sesuai!');
				</script>";

		return false;
	}

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan user baru
	mysqli_query($conn, "INSERT INTO user VALUES ('','$no_identitas', '$username', '$email', '$password', 'pengunjung', 'person.png')");

	return mysqli_affected_rows($conn);
}

//upload gambar untuk akun
function upload_gambar(){
    $namaFile   = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error      = $_FILES['gambar']['error'];
    $tmpName    = $_FILES['gambar']['tmp_name'];
    
    //Cek apakah yang di upload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script> alert('Gambar Harus dalam Bentuk Gambar (.jpg / .jpeg / .png)'); </script>";
        return false;
    }
    //jika ukuran terlalu besar
    if ($ukuranFile > 5000000) {
        echo "<script> alert('Ukuran Gambar Terlalu Besar (Maks : 5 Mb)'); </script>";
        return false;
    }
    //Lolos semua pengecekan
    $namaFileBaru  = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'C:/xampp/htdocs/ta/gambar/akun/'. $namaFileBaru);
    return $namaFileBaru;
}

//edit akun
function edit_akun($data) {
	global $conn;

	$id_user 	  = $data["id_user"];
	$no_identitas = $data["no_identitas"];
    $no_identitas_lama = $data["no_identitas_lama"];
    $username 	  = $data["username"];
    $email        = $data["email"];
	$gambar_lama  = $data["gambar_lama"];

    if( $no_identitas != $no_identitas_lama){
        $result = mysqli_query($conn, "SELECT no_identitas FROM user WHERE no_identitas = '$no_identitas'");
        if(mysqli_fetch_assoc($result) ) {
            echo "<script>
                        alert('Nomor Identitas sudah terdaftar!');
                    </script>";
            return false;
        }
    }
	

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambar_lama;
    }else{
        $gambar=upload_gambar();
    }

	//update data
	mysqli_query($conn, "UPDATE user SET
    id_user 		= '$id_user',
	no_identitas	= '$no_identitas',
    username  		= '$username',
    email    		= '$email', 
    gambar         	= '$gambar'
    WHERE id_user = $id_user");

	return mysqli_affected_rows($conn);
}

// edit password
function edit_password($data){
    global $conn;

    $id_user 	= ($data["id_user"]);
    $password 	= mysqli_real_escape_string($conn, $data["password"]);
    $password2 	= mysqli_real_escape_string($conn, $data["password2"]);

    //konfirmasi password
    if ($password !== $password2) {
        echo    "<script>
                    alert('Komfirmasi Password Tidak Sesuai!');
                </script>";

        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //update data
    $query = "UPDATE user SET password = '$password' WHERE id_user = $id_user";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//upload gambar untuk buku
function upload_cover(){
    $namaFile   = $_FILES['cover']['name'];
    $ukuranFile = $_FILES['cover']['size'];
    $error      = $_FILES['cover']['error'];
    $tmpName    = $_FILES['cover']['tmp_name'];
    
    //Cek apakah yang di upload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script> alert('Gambar Harus dalam Bentuk Gambar (.jpg / .jpeg / .png)'); </script>";
        return false;
    }
    //jika ukuran terlalu besar
    if ($ukuranFile > 5000000) {
        echo "<script> alert('Ukuran Gambar Terlalu Besar (Maks : 5 Mb)'); </script>";
        return false;
    }
    //Lolos semua pengecekan
    $namaFileBaru  = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'C:/xampp/htdocs/ta/gambar/buku/'. $namaFileBaru);
    return $namaFileBaru;
}

//admin tambah data buku
function tambah_buku($data) {
	global $conn;

	$kode_buku      = $data["kode_buku"];
    $judul          = $data["judul"];
    $edisi          = $data["edisi"];
    $ISBN           = $data["ISBN"];
    $penerbit       = $data["penerbit"];
    $tahun_terbit   = $data["tahun_terbit"];
    $bahasa         = $data["bahasa"];
    $tempat_terbit  = $data["tempat_terbit"];
    $subjek         = $data["subjek"];
    $pengarang      = $data["pengarang"];
    $jumlah         = $data["jumlah"];
    $kondisi        = $data["kondisi"];

	//cek kode buku sudah ada atau belum
	$result = mysqli_query($conn, "SELECT kode_buku FROM buku WHERE kode_buku = '$kode_buku'");

	if(mysqli_fetch_assoc($result) ) {
		echo "<script>
					alert('Kode Buku sudah terdaftar!');
				</script>";
		return false;
	}

    $cover=upload_cover();
    if (!$cover) {
        return false;
    }

	//tambahkan buku baru
	mysqli_query($conn, "INSERT INTO buku VALUES 
    ('',
    '$kode_buku',
    '$judul', 
    '$edisi', 
    '$ISBN', 
    '$penerbit', 
    '$tahun_terbit', 
    '$bahasa', 
    '$tempat_terbit', 
    '$subjek', 
    '$pengarang', 
    '$jumlah', 
    '$kondisi', 
    '$cover')");
	return mysqli_affected_rows($conn);
}

//admin edit data buku 
function edit_buku($data) {
	global $conn;

	$id_buku 	    = $data["id_buku"];
	$kode_buku      = $data["kode_buku"];
    $kode_buku_lama = $data["kode_buku_lama"];
    $judul          = $data["judul"];
    $edisi          = $data["edisi"];
    $ISBN           = $data["ISBN"];
    $penerbit       = $data["penerbit"];
    $tahun_terbit   = $data["tahun_terbit"];
    $bahasa         = $data["bahasa"];
    $tempat_terbit  = $data["tempat_terbit"];
    $subjek         = $data["subjek"];
    $pengarang      = $data["pengarang"];
    $jumlah         = $data["jumlah"];
    $kondisi        = $data["kondisi"];
	$cover_lama     = $data["cover_lama"];

    //cek kode buku
    if( $kode_buku != $kode_buku_lama){
        $result = mysqli_query($conn, "SELECT kode_buku FROM buku WHERE kode_buku = '$kode_buku'");
        if(mysqli_fetch_assoc($result) ) {
            echo "<script>
                        alert('Kode Buku sudah terdaftar!');
                    </script>";
            return false;
        }
    }

    if ($_FILES['cover']['error'] === 4) {
        $cover = $cover_lama;
    }else{
        $cover=upload_cover();
    }

	//update data
	mysqli_query($conn, "UPDATE buku SET
    id_buku 		= '$id_buku',
	kode_buku	    = '$kode_buku',
    judul  		    = '$judul',
    edisi    		= '$edisi', 
    ISBN         	= '$ISBN',
    penerbit 		= '$penerbit',
	tahun_terbit	= '$tahun_terbit',
    bahasa  		= '$bahasa',
    tempat_terbit   = '$tempat_terbit', 
    subjek         	= '$subjek',
    pengarang  		= '$pengarang',
    jumlah    		= '$jumlah', 
    kondisi         = '$kondisi',
    cover           = '$cover'
    WHERE id_buku = $id_buku");

	return mysqli_affected_rows($conn);
}

//admin hapus buku
function hapus_buku($data){
    global $conn;

    $id_buku = $data["id_buku"];

    mysqli_query($conn,"DELETE FROM buku WHERE id_buku = $id_buku");
    return mysqli_affected_rows($conn);
}

//admin tambah akun baru
function admin_tambah_akun($data) {
	global $conn;

	$no_identitas   = $data["no_identitas"];
	$username       = stripcslashes($data["username"]);
	$email          = $data["email"];
	$password       = mysqli_real_escape_string($conn, $data["password"]);
    $password2      = mysqli_real_escape_string($conn, $data["password2"]);
    $level          = $data["level"];

	//cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT no_identitas FROM user WHERE no_identitas = '$no_identitas'");

	if(mysqli_fetch_assoc($result) ) {
		echo "<script>
					alert('Nomor Identitas sudah terdaftar!');
				</script>";
		return false;
	}
    //konfirmasi password
	if ($password !== $password2) {
		echo 	"<script>
					alert('Komfirmasi Password Tidak Sesuai!');
				</script>";

		return false;
	}

	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

    //upload gambar
    $gambar=upload_gambar();
    if (!$gambar) {
        return false;
    }

	//tambahkan user baru
	mysqli_query($conn, "INSERT INTO user VALUES 
    ('',
    '$no_identitas', 
    '$username', 
    '$email', 
    '$password', 
    '$level', 
    '$gambar')");

	return mysqli_affected_rows($conn);
}

//admin edit akun
function admin_edit_akun($data) {
	global $conn;

	$id_user 	        = $data["id_user"];
	$no_identitas       = $data["no_identitas"];
    $no_identitas_lama  = $data["no_identitas_lama"];
    $username 	        = $data["username"];
    $email              = $data["email"];
    $level              = $data["level"];
	$gambar_lama        = $data["gambar_lama"];

    //cek no.identitas
    if( $no_identitas != $no_identitas_lama){
        $result = mysqli_query($conn, "SELECT no_identitas FROM user WHERE no_identitas = '$no_identitas'");
        if(mysqli_fetch_assoc($result) ) {
            echo "<script>
                        alert('Nomor Identitas sudah terdaftar!');
                    </script>";
            return false;
        }
    }
	

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambar_lama;
    }else{
        $gambar=upload_gambar();
    }

	//update data
	mysqli_query($conn, "UPDATE user SET
    id_user 		= '$id_user',
	no_identitas	= '$no_identitas',
    username  		= '$username',
    email    		= '$email',
    level    		= '$level', 
    gambar         	= '$gambar'
    WHERE id_user = $id_user");

	return mysqli_affected_rows($conn);
}

//admin edit password akun
function admin_edit_password($data){
    global $conn;

    $id_user 	= ($data["id_user"]);
    $password 	= mysqli_real_escape_string($conn, $data["password"]);
    $password2 	= mysqli_real_escape_string($conn, $data["password2"]);

    //konfirmasi password
    if ($password !== $password2) {
        echo    "<script>
                    alert('Komfirmasi Password Tidak Sesuai!');
                </script>";

        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //update data
    $query = "UPDATE user SET password = '$password' WHERE id_user = $id_user";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

//admin hapus akun
function admin_hapus_akun($data){
    global $conn;

    $id_user = $data["id_user"];

    mysqli_query($conn,"DELETE FROM user WHERE id_user = $id_user");
    return mysqli_affected_rows($conn);
}

//upload gambar untuk artikel
function upload_gambar_artikel(){
    $namaFile   = $_FILES['gambar_artikel']['name'];
    $ukuranFile = $_FILES['gambar_artikel']['size'];
    $error      = $_FILES['gambar_artikel']['error'];
    $tmpName    = $_FILES['gambar_artikel']['tmp_name'];
    
    //Cek apakah yang di upload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script> alert('Gambar Harus dalam Bentuk Gambar (.jpg / .jpeg / .png)'); </script>";
        return false;
    }
    //jika ukuran terlalu besar
    if ($ukuranFile > 5000000) {
        echo "<script> alert('Ukuran Gambar Terlalu Besar (Maks : 5 Mb)'); </script>";
        return false;
    }
    //Lolos semua pengecekan
    $namaFileBaru  = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'C:/xampp/htdocs/ta/gambar/artikel/'. $namaFileBaru);
    return $namaFileBaru;
}

//admin tambah artikel
function tambah_artikel($data) {
	global $conn;

    $judul_artikel = $data["judul_artikel"];
    $isi_artikel   = $data["isi_artikel"];
    $referensi     = $data["referensi"];
    $tgl_posting   = date("Y-m-d",time());

    $gambar_artikel=upload_gambar_artikel();
    if (!$gambar_artikel) {
        return false;
    }

	//tambahkan buku baru
	mysqli_query($conn, "INSERT INTO artikel VALUES 
    ('',
    '$judul_artikel',
    '$isi_artikel', 
    '$gambar_artikel', 
    '$referensi', 
    '$tgl_posting')");
	return mysqli_affected_rows($conn);
}

//admin edit artikel 
function edit_artikel($data) {
	global $conn;

	$id_artikel             = $data["id_artikel"];
    $judul_artikel          = $data["judul_artikel"];
    $isi_artikel            = $data["isi_artikel"];
    $referensi              = $data["referensi"];
    $gambar_artikel_lama    = $data["gambar_artikel_lama"];
    $tgl_posting            = $data["tgl_posting"];

    if ($_FILES['gambar_artikel']['error'] === 4) {
        $gambar_artikel = $gambar_artikel_lama;
    }else{
        $gambar_artikel=upload_gambar_artikel();
    }

	//update data
	mysqli_query($conn, "UPDATE artikel SET
    id_artikel 	    = '$id_artikel',
	judul_artikel	= '$judul_artikel',
    isi_artikel     = '$isi_artikel',
    referensi       = '$referensi', 
    gambar_artikel  = '$gambar_artikel',
    tgl_posting     = '$tgl_posting'
    WHERE id_artikel = $id_artikel");

	return mysqli_affected_rows($conn);
}

//admin hapus artikel
function hapus_artikel($data){
    global $conn;

    $id_artikel = $data["id_artikel"];

    mysqli_query($conn,"DELETE FROM artikel WHERE id_artikel = $id_artikel");
    return mysqli_affected_rows($conn);
}

//upload ikon untuk subjek
function upload_ikon_subjek(){
    $namaFile   = $_FILES['ikon_subjek']['name'];
    $ukuranFile = $_FILES['ikon_subjek']['size'];
    $error      = $_FILES['ikon_subjek']['error'];
    $tmpName    = $_FILES['ikon_subjek']['tmp_name'];
    
    //Cek apakah yang di upload gambar atau bukan
    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script> alert('Gambar Harus dalam Bentuk Gambar (.jpg / .jpeg / .png)'); </script>";
        return false;
    }
    //jika ukuran terlalu besar
    if ($ukuranFile > 5000000) {
        echo "<script> alert('Ukuran Gambar Terlalu Besar (Maks : 5 Mb)'); </script>";
        return false;
    }
    //Lolos semua pengecekan
    $namaFileBaru  = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'C:/xampp/htdocs/ta/gambar/ikon_subjek/'. $namaFileBaru);
    return $namaFileBaru;
}

//admin tambah subjek
function tambah_subjek($data) {
	global $conn;

    $nama_subjek = $data["nama_subjek"];

    //cek nama subjek
    $result = mysqli_query($conn, "SELECT nama_subjek FROM subjek WHERE nama_subjek = '$nama_subjek'");
    if(mysqli_fetch_assoc($result) ) {
        echo "<script>
                    alert('Nama Subjek sudah terdaftar!');
                </script>";
        return false;
    }

    $ikon_subjek=upload_ikon_subjek();
    if (!$ikon_subjek) {
        return false;
    }

	//tambahkan buku baru
	mysqli_query($conn, "INSERT INTO subjek VALUES 
    ('',
    '$nama_subjek',
    '$ikon_subjek')");
	return mysqli_affected_rows($conn);
}

//admin edit subjek 
function edit_subjek($data) {
	global $conn;

	$id_subjek           = $data["id_subjek"];
    $nama_subjek         = $data["nama_subjek"];
    $nama_subjek_lama    = $data["nama_subjek_lama"];
    $ikon_subjek_lama    = $data["ikon_subjek_lama"];

    //cek nama subjek
    if( $nama_subjek != $nama_subjek_lama){
        $result = mysqli_query($conn, "SELECT nama_subjek FROM subjek WHERE nama_subjek = '$nama_subjek'");
        if(mysqli_fetch_assoc($result) ) {
            echo "<script>
                        alert('Nama Subjek sudah terdaftar!');
                    </script>";
            return false;
        }
    }

    if ($_FILES['ikon_subjek']['error'] === 4) {
        $ikon_subjek = $ikon_subjek_lama;
    }else{
        $ikon_subjek=upload_ikon_subjek();
    }

	//update data
	mysqli_query($conn, "UPDATE subjek SET
    id_subjek 	    = '$id_subjek',
	nama_subjek	    = '$nama_subjek',
    ikon_subjek     = '$ikon_subjek'
    WHERE id_subjek = $id_subjek");

	return mysqli_affected_rows($conn);
}

//admin hapus subjek
function hapus_subjek($data){
    global $conn;

    $id_subjek = $data["id_subjek"];

    mysqli_query($conn,"DELETE FROM subjek WHERE id_subjek = $id_subjek");
    return mysqli_affected_rows($conn);
}

//tambah markah
function tambah_markah($data){
    global $conn;

    $id_user = $data["id_user"];
    $id_buku = $data["id_buku"];

    //cek markah sudah ada atau belum
	$result = mysqli_query($conn, "SELECT id_buku FROM markah WHERE id_buku = '$id_buku' AND id_user = '$id_user'");
    if(mysqli_fetch_assoc($result) ) {
		echo "<script>
					alert('Markah Telah Diberikan Pada Buku Ini !');
				</script>";
		return false;
	}

    mysqli_query($conn, "INSERT INTO markah VALUES 
    ('',
    '$id_user',
    '$id_buku')");
	return mysqli_affected_rows($conn);
}

//hapus markah
function hapus_markah($data){
    global $conn;

    $id_markah = $data["id_markah"];

    mysqli_query($conn,"DELETE FROM markah WHERE id_markah = $id_markah");
    return mysqli_affected_rows($conn);
}
?>