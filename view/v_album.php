<?php

include "../config/db.php";

$kategori = $_GET['kategori'];

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Album Kegiatan</title>
	<link rel="stylesheet" type="text/css" href="../assets/view/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/view/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/view/css/style.css">
</head>
<body>
	<!-- Navbar -->
	<nav class="navbar navbar-expand-sm navbar-light py-4">
	  <div class="container">
	    <a href="../index.php" class="navbar-brand">
	      <img src="../assets/view/img/logo.png" width="30" height="43" alt="logo-samosir"><h3 class="d-inline align-middle">  Samosir Semarang</h3>
	    </a>
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item">
	        <a href="v_kegiatan.php" class="nav-link">Kembali</a>
	      </li>
	    </ul>
	  </div>
	</nav>

<!--ALBUM berdasarkan kategori-->
<div class="container">
	<h3 class="text-center">ALBUM <?php echo strtoupper($kategori); ?></h3>
	<div class="row">

	<?php

	$query = "SELECT * FROM album WHERE kategori='$kategori'";
	$result = $koneksi->query($query);

	$jlh = mysqli_num_rows($result);
	if($jlh>0){
		while($data = mysqli_fetch_array($result)) {
	?>
			<div class="col-sm-4">
				<img src="<?php echo '../album/'.$data['nama'] ?>" class="img-fluid">
				<center><a class="btn btn-success mt-1" href="<?php echo '../album/'.$data['nama'] ?>">Lihat</a></center>
			</div>
	<?php
		}
	} else {
		echo "<h3 class='text-primary'>Mohon maaf, album belum kami perbaharui/ upload.</h3>";
	}
	?>
	</div>
</div>

</body>
</html>