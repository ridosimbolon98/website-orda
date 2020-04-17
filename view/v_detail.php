<?php

	include '../config/db.php';
	$id = $_GET['id'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Lapak Samosir</title>
	<link rel="stylesheet" type="text/css" href="../assets/view/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/view/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/view/css/style.css">
	<style type="text/css">
		.detail-gambar{
			height: 80%;
			width: 80%;
			border:3px solid;
		    border-radius: 10px;
		}
	</style>
</head>
<body>

	<!-- Navbar -->
	<nav class="navbar navbar-expand-sm navbar-light py-4">
	  <div class="container">
	    <a href="../index.php" class="navbar-brand">
	      <img src="../assets/view/img/logo.png" width="30" height="43" alt="logo-samosir"><h3 class="d-inline align-middle">  Samosir Semarang</h3>
	    </a>
	    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
	    <div class="collapse navbar-collapse" id="navbarNav">
	      <ul class="navbar-nav ml-auto">
	        <li class="nav-item">
	          <a href="v_lapak.php" class="nav-link">Kembali</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<section class="bg-light py-5">
	<div class="container">
		<h4 class="text-center text-primary pb-3">Detail Barang</h4>
		<div class="row mb-4">

			<?php
				$query =  "SELECT * FROM rental WHERE id='$id'";
				$result =  $koneksi->query($query);
				while($data = mysqli_fetch_array($result)){
			?>

				<div class="col-sm-6">
					<img src="../img/<?php echo $data['gambar'] ?>" class="img-fluid detail-gambar">
				</div>
				<div class="col-sm-6">
					<h4 class="text-center">Hasapi</h4>
					<p><?php echo $data['deskripsi'] ?></p>
					<h4>Rp <?php echo number_format($data['biaya']);?> /hari</h4>
					<p>Info lebih lanjut dan penyewaan hubungi CP kami.</p>
				</div>

			<?php
				}

			?>
		</div>
	</div>
	</section>

	<!-- FOOTER -->
	<footer id="main-footer" class="text-center p-4">
	<div class="container">
	  <div class="row">
	    <div class="col">
	      <p class="text-center">#SamosirSemarang #LamSadaLamTarbarita</p>
	    </div>
	  </div>
	</div>
	</footer>

	<footer id="main-footer" class="py-5 bg-primary text-white">
	<div class="container">
	  <div class="row text-center">
	    <div class="col-sm-6 ml-auto">
	      <p class="lead">Keluarga Mahasiswa Asal Samosir Semarang Copyright &copy; 2019 All Right Reserve</p><br>
	    </div>
	    <div class="col-sm-6">
	    	<p class="lead">Coded by ridosimbolon98@gmail.com</p>
	    </div>
	  </div>
	</div>
	</footer>


	<script type="text/javascript" src="../assets/view/js/jquery.min.js"></script>
 	<script type="text/javascript" src="../assets/view/js/popper.min.js"></script>
 	<script type="text/javascript" src="../assets/view/js/bootstrap.min.js"></script>
 	<script type="text/javascript" src="../assets/view/js/navbar-fixed.js"></script>

</body>
</html>