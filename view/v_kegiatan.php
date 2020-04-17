<?php

include '../config/db.php';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Samosir Semarang</title>
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
	    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
	    <div class="collapse navbar-collapse" id="navbarNav">
	      <ul class="navbar-nav ml-auto">
	        <li class="nav-item">
	          <a href="v_kegiatan.php" class="nav-link">Home</a>
	        </li>
	        <li class="nav-item">
	          <a href="#kegiatan" class="nav-link">Kegiatan</a>
	        </li>
	        <li class="nav-item">
	          <a href="#album" class="nav-link">Album</a>
	        </li>
	        <li class="nav-item">
	          <a href="#hbd" class="nav-link">HBD</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>


	<!-- SLIDE SHOW -->
	<section id="showcase" class="bg-dark">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	    <li data-target="#myCarousel" data-slide-to="1"></li>
	    <li data-target="#myCarousel" data-slide-to="2"></li>
	  </ol>
	  <div class="carousel-inner" role="listbox">
	  	<?php
	  		$no =1;
	  		$query = "SELECT * FROM post WHERE id=1";
	  		$result = $koneksi->query($query);

	  		$data = mysqli_fetch_array($result);
	  	?>
	    <div class="carousel-item active">
	      <div class="container">
	      	<img src="<?php echo '../img/'.$data['gambar']; ?>" height="50%" width="100%">
	        <div class="carousel-caption d-none d-sm-block text-right mb-5">
	          <h1 class="display-3"><?php echo $data['judul']?></h1>
	          <p class="lead"><?php echo $data['isi']?></p>
	        </div>
	      </div>
	    </div>

	    <?php
	  		$no =1;
	  		$query = "SELECT * FROM post WHERE id=2";
	  		$result = $koneksi->query($query);

	  		$data = mysqli_fetch_array($result);
	  	?>
	    <div class="carousel-item">
	      <div class="container">
	      	<img src="<?php echo '../img/'.$data['gambar']; ?>" height="50%" width="100%">
	        <div class="carousel-caption d-none d-sm-block text-right mb-5">
	          <h1 class="display-3"><?php echo $data['judul']?></h1>
	          <p class="lead"><?php echo $data['isi']?></p>
	        </div>
	      </div>
	    </div>


	    <?php
	  		$no =1;
	  		$query = "SELECT * FROM post WHERE id=3";
	  		$result = $koneksi->query($query);

	  		$data = mysqli_fetch_array($result);
	  	?>
	    <div class="carousel-item">
	      <div class="container">
	      	<img src="<?php echo '../img/'.$data['gambar']; ?>" height="50%" width="100%">
	        <div class="carousel-caption d-none d-sm-block text-right mb-5">
	          <h1 class="display-3"><?php echo $data['judul']?></h1>
	          <p class="lead"><?php echo $data['isi']?></p>
	        </div>
	      </div>
	    </div>
	  </div>

	  <a href="#myCarousel" data-slide="prev" class="carousel-control-prev">
	    <span class="carousel-control-prev-icon"></span>
	  </a>

	  <a href="#myCarousel" data-slide="next" class="carousel-control-next">
	    <span class="carousel-control-next-icon"></span>
	  </a>
	</div>
	</section>

	<!--uLANG TAHUN-->
<?php
	$hbd = date('m-d');
	$query = "SELECT * FROM anggota WHERE tgl_lahir='$hbd' ";
	$result = $koneksi->query($query);
	$data = mysqli_num_rows($result);

	if ($data > 0) {
?>

	<section id="hbd" class="py-5 text-center bg-light">
	<div class="container">
	  <div class="row">
	    <div class="col">
	      <div class="info-header mb-5">
	        <h1 class="text-primary pb-3">
	          Selamat Ulang Tahun Keluarga &lt;3
	        </h1>
	        <p class="lead pb-3">
	          Selamat Ulang tahun keluarga, semoga segala urusannya dilancarkan, kesehatan tetap terjaga, rejeki dilancarkan dan menjadi berkat bagi orang lain amin.
	        </p>

	        <a href="#" data-toggle="lightbox" data-gallery="img-gallery">

	        	<?php
	        		$query = "SELECT * FROM anggota WHERE tgl_lahir='$hbd' ";
	        		$result = $koneksi->query($query);
	        		while ($data = mysqli_fetch_array($result)) {
	        	?>
			        	<img src="../ultah/<?php echo $data['foto']; ?>" class="img-fluid rounded-circle" height="50%" width="50%"><br>
			        	<h4 class="text-center"><?php echo $data['nama'] ?></h4>
	        	<?php
	        		}
	        	?>	        	
	        </a>

	      </div>
	    </div>
	  </div>
	</div>
	</section>

<?php
	} else {
?>
	
	<section id="hbd" class="py-5 text-center bg-light">
	<div class="container">
	  <div class="row">
	    <div class="col">
	      <div class="info-header mb-5">
	      	<h1 class="text-primary pb-3">
	      		Tidak ada yang berulang tahun hari ini
	      	</h1>
	      	<h1 class="text-primary pb-3">
	      		<?php echo date('d M Y'); ?>
	      	</h1>
	      	<p>
	      		"Dalam situasi apapun kita, baik susah dan senang, Allah yang adalah sumber kehidupan tak akan sekali-kali meninggalkan kita. Untuk itu mari kita untuk selalu bersyukur atas hidup yang diberikan kepada kita"
	      	</p>
	      </div>
	    </div>
	  </div>
    </div>
   </section>

<?php
	}
?>

	<!-- DAFTAR KEGIATAN -->
	<section id="kegiatan" class="py-5">
	<div class="container">		
	<h2 class="text-primary pb-3 text-center">Kegiatan Tahunan Samosir Semarang</h2>
	  <div class="row">
	    <div class="col-md-4 mb-4 text-center">
	      <h3>Perayaan Paskah</h3>
	      <p>Perayaan Paskah merupakan salah satu kegiatan besar Keluarga Mahasiswa Asal Samosir Semarang adalah Perayaan Paskah yang dilaksanakan setiap sekali setahun.</p>
	    </div>
	    <div class="col-md-4 mb-4 text-center">
	      <h3>Penyambutan Mahasiswa Baru</h3>
	      <p>Penyambutan mahasiswa baru adalah kegiatan yang dilakukan pengurus untuk menjemput dan menyambut mahasiswa baru yang berasal dari Samosir.</p>
	    </div>
	    <div class="col-md-4 mb-4 text-center">
	      <h3>POR Inter-Keluarga</h3>
	      <p>POR (Pekan Olah Raga) Inter-Keluarga merupakan kegiatan besar keluarga lainnya yang dilaksanakan sekali setahun.</p>
	    </div>
	  </div>
	  <div class="row">
	    <div class="col-md-4 mb-4 text-center">
	      <h3>Pra-Makrab</h3>
	      <p>Pra-Makrab adalah salah satu kegiatan besar Keluarga Mahasiswa Asal Samosir Semarang yang dilaksanakan setiap sekali setahun sebelum dilaksanakannya makrab keluarga.</p>
	    </div>
	    <div class="col-md-4 mb-4 text-center">
	      <h3>Malam Keakraban</h3>
	      <p>Malam Keakraban adalah kegiatan yang dilakukan setahun sekali yang berguna untuk mengakrabkan kembali antar anggota keluarga.</p>
	    </div>
	    <div class="col-md-4 mb-4 text-center">
	      <h3>Perayaan Natal</h3>
	      <p>Perayaan Natal adalah kegiatan yang dilakukan sekali setahun. Biasanya sekaligus acara pelantikan pengurus baru.</p>
	    </div>
	  </div>
	</div>
	</section>

	<!-- PHOTO GALLERY -->
	<section id="album" class="py-5 bg-light">
	<div class="container">
	  <h1 class="text-center text-primary pb-3">Album Foto</h1>
	  <p class="text-center">Cek Galeri Kami</p>
	  <div class="row mb-4">
	    <div class="col-sm-4">
	      <a href="v_album.php?kategori=qt" data-toggle="lightbox" data-gallery="img-gallery">
	        <img src="../assets/view/img/qt.jpg" class="img-fluid">
	        <h4 class="text-center">Quality Time</h4>
	      </a>
	    </div>
	    <div class="col-sm-4">
	      <a href="v_album.php?kategori=por" data-toggle="lightbox" data-gallery="img-gallery">
	        <img src="../assets/view/img/por.jpg" class="img-fluid">
	        <h4 class="text-center">POR</h4>
	      </a>
	    </div>
	    <div class="col-sm-4">
	      <a href="v_album.php?kategori=olahraga" data-toggle="lightbox" data-gallery="img-gallery">
	        <img src="../album/samosir1.jpg" class="img-fluid">
	        <h4 class="text-center">Olahraga</h4>
	      </a>
	    </div>
	  </div>

	  <div class="row mb-4">
	    <div class="col-sm-4">
	      <a href="v_album.php?kategori=natal" data-toggle="lightbox" data-gallery="img-gallery">
	        <img src="../assets/view/img/natal.jpg" class="img-fluid">
	        <h4 class="text-center">Natal</h4>
	      </a>
	    </div>
	    <div class="col-sm-4">
	      <a href="v_album.php?kategori=makrab" data-toggle="lightbox" data-gallery="img-gallery">
	        <img src="../assets/view/img/makrab.jpg" class="img-fluid">
	        <h4 class="text-center">Makrab</h4>
	      </a>
	    </div>
	    <div class="col-sm-4">
	      <a href="v_album.php?kategori=paskah" data-toggle="lightbox" data-gallery="img-gallery">
	        <img src="../assets/view/img/paskah.jpg" class="img-fluid">
	        <h4 class="text-center">Paskah</h4>
	      </a>
	    </div>
	  </div>
	</div>
	</section>

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