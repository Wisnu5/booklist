<?php
include("config.php");
// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['register'])){

	// ambil data dari formulir
	$email = $_POST['email'];
	$username = $_POST['username'];
	$fullname = $_POST['fullname'];
	$pw = $_POST['pw'];

	// buat query
  $query = pg_query("INSERT INTO users (email, username, fullname, pw ) VALUEs ('$email', '$username', '$fullname', '$pw')");

	// apakah query simpan berhasil?
	if( $query==TRUE ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: index.php?status=sukses');
	} else {
		// kalau gagal alihkan ke halaman indek.php dengan status=gagal
		header('Location: index.php?status=gagal');
	}


} else {
	die("Akses dilarang...");
}
?>
