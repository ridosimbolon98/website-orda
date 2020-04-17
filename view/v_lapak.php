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
		.gambar, #gambar{
		  width: 80%;
		  height: 80%;
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
	          <a href="../index.php" class="nav-link">Home</a>
	        </li>
	        <li class="nav-item">
	          <a href="#rental" class="nav-link">Usaha 1</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>


	<!-- RENTAL -->
	<section id="rental" class="py-5 bg-light">
	<div class="container">
	  <h1 class="text-center text-primary pb-3">RENTAL BARANG</h1>
	  <p class="text-center">Berikut daftar barang yang kami sewakan</p>
	  <div class="row mb-4 pl-5">
	    <?php
	  		include '../config/db.php';
	  		$query = "SELECT * FROM rental";
	  		$result = $koneksi->query($query);
	  		while($data = mysqli_fetch_array($result)){
	  	?>
	    <div class="col-sm-4 mb-4">
	        <img id="gambar" src="../img/<?php echo $data['gambar'] ?>" class="img-fluid gambar" alt="gambar-barang">
	        <h4 class="text-center"><?php echo $data['nama'] ?></h4>
	        <center><a class="btn btn-success" href="v_detail.php?id=<?php echo $data['id'] ?>"> Detail</a></center>
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