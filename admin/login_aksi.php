<?php
session_start();

include "../config/db.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

if (!empty($username) && !empty($password)) {
	$query = "SELECT * FROM admin WHERE username='$username' AND password='$password' ";
	$result = $koneksi->query($query);
	$cek = mysqli_num_rows($result);

	if ($cek > 0) {
		$_SESSION['username'] = $username;
		$_SESSION['status']   = "login";
		$_SESSION['logged']   = true;
		$_SESSION['level']    = "admin";
		header("location:index.php");
	} else {
		echo "<script>alert('Gagal login, cek kembali Username atau Password anda.');history.go(-1);</script>";
	}
	
} else {
	echo "<script>alert('Username atau Password tidak boleh kosong.');history.go(-1);</script>";
}


?>