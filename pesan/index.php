<?php

include '../config/db.php';



	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$hp = $_POST['hp'];
	$pesan = $_POST['pesan'];

	if (empty($nama)){
		echo "<script>alert('Nama tidak boleh kosong !');history.go(-1);</script>";
	} else{
		if(empty($email)){
			echo "<script>alert('Email tidak boleh kosong !');history.go(-1);</script>";
		} else {
			if (empty($pesan)) {
				echo "<script>alert('Pesan tidak boleh kosong !');history.go(-1);</script>";
			} else {
				$query = "INSERT INTO pesan(nama, email, hp, pesan) VALUES('$nama', '$email', '$hp', '$pesan')";
				$result = $koneksi->query($query);

				if($result){
					echo "<script>alert('Terimakasih atas feedbacknya !');</script>";
					echo "<script>location='../index.php';</script>";
				}
			}
			
		}
	}

?>

