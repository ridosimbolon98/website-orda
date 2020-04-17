<?php

include 'config/db.php';

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Samosir Semarang</title>
	<link rel="stylesheet" type="text/css" href="assets/view/css/bootstrap.css">
	<link rel="stylesheet" href="assets/view/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/view/css/style.css">
	<style type="text/css">
		#showcase{
			background-image: url("assets/view/img/view.png");
		}
	</style>
</head>
<body>
	<!-- Navbar -->
	<nav class="navbar navbar-expand-sm navbar-light py-4">
	  <div class="container">
	    <a href="index.php" class="navbar-brand">
	      <img src="assets/view/img/logo.png" width="30" height="43" alt="logo-samosir"><h3 class="d-inline align-middle">  Samosir Semarang</h3>
	    </a>
	    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
	    <div class="collapse navbar-collapse" id="navbarNav">
	      <ul class="navbar-nav ml-auto">
	        <li class="nav-item">
	          <a href="index.php" class="nav-link">Home</a>
	        </li>
	        <li class="nav-item">
	          <a href="#pengurus" class="nav-link">Pengurus</a>
	        </li>
	        <li class="nav-item">
	          <a href="#about" class="nav-link">Tentang Kami</a>
	        </li>
	        <li class="nav-item">
	          <a href="#kontak" class="nav-link">Kontak</a>
	        </li>
	        <li class="nav-item">
	          <a href="#medsos" class="nav-link">Media Sosial</a>
	        </li>
	        <li class="nav-item">
	          <a href="#usaha" class="nav-link">Usaha</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<!-- SHOWCASE -->
	<section id="showcase" class="py-5">
	<div class="primary-overlay text-white">
	  <div class="container">
	    <div class="row">
	      <div class="col-sm-12 text-center">
	        <h3 class="display-5 pt-5">
	          Apa saja kegiatan-kegiatan yang kami lakukan?
	        </h3><br>
	        <p class="lead">Ada beberapa kegiatan besar dan kecil yang kami lakukan setiap tahunnya, yuk cek disini</p><br>
	        <a href="view/v_kegiatan.php" class="btn btn-danger btn-lg text-white">Cek Disini</a>
	      </div>
	    </div>
	  </div>
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
				        	<img src="ultah/<?php echo $data['foto']; ?>" class="img-fluid rounded-circle" height="50%" width="50%"><br>
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

	<!-- TENTANG SAMOSIR SEMARANG -->
	<section id="about" class="py-5 text-center bg-white">
	<div class="container">
	  <div class="row">
	    <div class="col">
	      <div class="info-header mb-5">
	        <h1 class="text-primary pb-3">
	          Apa itu Keluarga Mahasiswa Asal Samosir Semarang?
	        </h1>
		      <?php
		      	$pra = "Keluarga Mahasiswa Asal Samosir Semarang adalah sebuah paguyuban yang dibentuk oleh mahasiswa/i yang berasal dari Kabupaten Samosir, Provinsi Sumatera Utara dan berstatus mahasiswa di Semarang, Jawa Tengah. Sebelum paguyuban ini terbentuk, mahasiswa/i yang berasal dari Samosir telah mengadakan perkumpulan dalam bentuk perayaan Natal khusus untuk Keluarga Samosir Semarang dengan kepanitiaan angkatan 2010 dan 2011. Seiring bertambahnya jumlah putra dan putri Samosir yang menempuh pendidikan tinggi di Semarang, maka untuk mempersatukan dan mempererat tali kekeluargaan, dibentuklah paguyuban dengan nama Keluarga Mahasiswa Asal Samosir Semarang, selanjutnya disingkat Samosir Semarang. Paguyuban ini dibentuk bersamaan dengan pelaksanaan Malam Keakraban Keluarga Mahasiswa Asal Samosir Semarang pada 8 November 2014 di Nglimut Gonoharjo, Kendal, Jawa Tengah.";
		      	$pra2 = "Terbentuknya paguyuban ini dengan harapan kegiatan-kegiatan seperti perkumpulan sesama anggota keluarga semakin rutin dan terarah, dapat saling membantu sesama anggota keluarga semakin rutin dan terarah, dapat saling membantu sesama anggota keluarga, menjalin silaturahmi dengan lingkungan eksternal. Paguyuban semakin jelas dan resmi dengan adanya nama dan lambang paguyuban yang sudah disepakati bersama, serta diakui paguyuban lain.";
			  ?>
			  <p class="lead pb-3"><?php echo $pra; ?></p>
			  <p class="lead pb-3"><?php echo $pra2; ?></p>
	      </div>
	    </div>
	  </div>
	</div>
	</section>


	<!-- USAHA -->
	<section id="usaha">
	  <header id="page-header">
		<div class="container">
		  <div class="row">
		    <div class="col-md-6 m-auto text-center">
		      <h1>Lapak Samosir</h1>
		      <?php
		      	$pr = "Lapak Samosir adalah salah satu usaha yang didirikan pada tahun 2019 oleh pengurus Samosir Semarang. Lapak ini menawarkan barang dan jasa yang bisa di sewa oleh pihak lain.";
			  ?>
			  <p><?php echo $pr; ?></p>
		    </div>
		  </div>
		</div>
	  </header>
	</section>

	<section class="py-5 bg-light">
	<div class="container">
	  <div class="row">
	    <div class="col-sm-12">
	      <div class="card text-center">
	        <div class="card-header">
	          <h3>Usaha Rental</h3>
	        </div>
	        <div class="card-body">
	          <h4 class="card-title">
	            Rental Barang
	          </h4>
	          <p class="card-text">Jenis barang yang bisa dirental.</p>
	          <ul class="list-group">
	            <li class="list-group-item">
	              <i class="fa fa-check"></i> Dandang
	            </li>
	            <li class="list-group-item">
	              <i class="fa fa-check"></i> Hasapi
	            </li>
	            <li class="list-group-item">
	              <i class="fa fa-check"></i> Toa
	            </li>
	            <li class="list-group-item">
	              <i class="fa fa-check"></i> Sortali Pria
	            </li>
	            <li class="list-group-item">
	              <i class="fa fa-check"></i> Sortali Wanita
	            </li>
	            <li class="list-group-item">
	              <i class="fa fa-check"></i> Ulos, Dll
	            </li>
	          </ul>
	          <a href="view/v_lapak.php#rental" class="btn btn-danger btn-block mt-2">Cek Detail Disini</a>
	        </div>
	        <div class="card-footer text-muted">
	          Info lebih lanjut hubungi CP kami.
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
	</section>

	<!-- PENGURUS -->
	<section id="pengurus" class="text-center bg-white" >
	<div class="container">
	  <div class="row">
	    <div class="col">
	      <div class="info-header mb-5">
	        <h1 class="text-primary pb-3 pt-5">
	          Pengurus Periode 2019-2020
	        </h1>
	        <p class="lead pb-3">
	          Berikut daftar pengurus yang akan melayani di keluarga kita
	        </p>
	      </div>
	    </div>
	  </div>

	  <!--BPH-->
	  <div>
	  	<h3 class="pb-2">Badan Pengurus Harian</h3>
	  </div>
	  <div class="row">

	  <?php

	  	$query = "SELECT * FROM pengurus WHERE bidang='bph' AND periode='2019'";
	  	$result = $koneksi->query($query);

	  	while ($data = mysqli_fetch_array($result)) {
	  ?>
	  
	    <div class="col-lg-3 col-sm-6">
	      <div class="card">
	        <div class="card-body">
	          <img src="img/<?php echo $data['foto']?>" alt="foto-pengurus" class="img-fluid rounded-circle w-50 mb-3">
	          <h4><?php echo $data['nama']?></h4>
	          <h5 class="text-muted"><?php echo $data['level']?></h5>
	          <h6><?php echo $data['jurusan']?></h6>
	          <h6><?php echo $data['angkatan']?></h6>
	          <div class="d-flex flex-row justify-content-center">
	            <div class="p-4">
	              <a href="#"><i class="fa fa-facebook"></i></a>
	            </div>
	            <div class="p-4">
	              <a href="#"><i class="fa fa-twitter"></i></a>
	            </div>
	            <div class="p-4">
	              <a href="#"><i class="fa fa-instagram"></i></a>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	  <?php
	  	}

	  ?>
	  </div>

	  <!--DIVISI MIKAT-->
	  <div style="margin-top: 30px;">
	  <div>
	  	<h3 class="pb-2">Divisi Minat dan Bakat</h3>
	  </div>
	  <div class="row">

	  <?php

	  	$query = "SELECT * FROM pengurus WHERE bidang='mikat' AND periode='2019'";
	  	$result = $koneksi->query($query);

	  	while ($data = mysqli_fetch_array($result)) {
	  ?>
	  
	    <div class="col-lg-3 col-sm-6">
	      <div class="card">
	        <div class="card-body">
	          <img src="img/<?php echo $data['foto']?>" alt="foto-pengurus" class="img-fluid rounded-circle w-50 mb-3">
	          <h4><?php echo $data['nama']?></h4>
	          <h5 class="text-muted"><?php echo $data['level']?></h5>
	          <h6><?php echo $data['jurusan']?></h6>
	          <h6><?php echo $data['angkatan']?></h6>
	          <div class="d-flex flex-row justify-content-center">
	            <div class="p-4">
	              <a href="#"><i class="fa fa-facebook"></i></a>
	            </div>
	            <div class="p-4">
	              <a href="#"><i class="fa fa-twitter"></i></a>
	            </div>
	            <div class="p-4">
	              <a href="#"><i class="fa fa-instagram"></i></a>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	  <?php
	  	}

	  ?>
	  </div>

	  <!--DIVISI INFOKOM-->
	  <div style="margin-top: 30px;">
	  <div>
	  	<h3 class="pb-2">Divisi Informasi dan Komunikasi</h3>
	  </div>
	  <div class="row">

	  <?php

	  	$query = "SELECT * FROM pengurus WHERE bidang='infokom' AND periode='2019'";
	  	$result = $koneksi->query($query);

	  	while ($data = mysqli_fetch_array($result)) {
	  ?>
	  
	    <div class="col-lg-3 col-sm-6">
	      <div class="card">
	        <div class="card-body">
	          <img src="img/<?php echo $data['foto']?>" alt="foto-pengurus" class="img-fluid rounded-circle w-50 mb-3">
	          <h4><?php echo $data['nama']?></h4>
	          <h5 class="text-muted"><?php echo $data['level']?></h5>
	          <h6><?php echo $data['jurusan']?></h6>
	          <h6><?php echo $data['angkatan']?></h6>
	          <div class="d-flex flex-row justify-content-center">
	            <div class="p-4">
	              <a href="#"><i class="fa fa-facebook"></i></a>
	            </div>
	            <div class="p-4">
	              <a href="#"><i class="fa fa-twitter"></i></a>
	            </div>
	            <div class="p-4">
	              <a href="#"><i class="fa fa-instagram"></i></a>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	  <?php
	  	}

	  ?>
	  </div>

	  <!--DIVISI SOSIAL-->
	  <div style="margin-top: 30px;">
	  <div>
	  	<h3 class="pb-2">Divisi Sosial</h3>
	  </div>
	  <div class="row">

	  <?php

	  	$query = "SELECT * FROM pengurus WHERE bidang='sosial' AND periode='2019'";
	  	$result = $koneksi->query($query);

	  	while ($data = mysqli_fetch_array($result)) {
	  ?>
	  
	    <div class="col-lg-3 col-sm-6">
	      <div class="card">
	        <div class="card-body">
	          <img src="img/<?php echo $data['foto']?>" alt="foto-pengurus" class="img-fluid rounded-circle w-50 mb-3">
	          <h4><?php echo $data['nama']?></h4>
	          <h5 class="text-muted"><?php echo $data['level']?></h5>
	          <h6><?php echo $data['jurusan']?></h6>
	          <h6><?php echo $data['angkatan']?></h6>
	          <div class="d-flex flex-row justify-content-center">
	            <div class="p-4">
	              <a href="#"><i class="fa fa-facebook"></i></a>
	            </div>
	            <div class="p-4">
	              <a href="#"><i class="fa fa-twitter"></i></a>
	            </div>
	            <div class="p-4">
	              <a href="#"><i class="fa fa-instagram"></i></a>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	  <?php
	  	}

	  ?>
	  </div>


	  <!--DIVISI FINANSIAL-->
	  <div style="margin-top: 30px;">
	  <div>
	  	<h3 class="pb-2">Divisi Finansial</h3>
	  </div>
	  <div class="row">

	  <?php

	  	$query = "SELECT * FROM pengurus WHERE bidang='finansial' AND periode='2019'";
	  	$result = $koneksi->query($query);

	  	while ($data = mysqli_fetch_array($result)) {
	  ?>
	  
	    <div class="col-lg-3 col-sm-6">
	      <div class="card">
	        <div class="card-body">
	          <img src="img/<?php echo $data['foto']?>" alt="foto-pengurus" class="img-fluid rounded-circle w-50 mb-3">
	          <h4><?php echo $data['nama']?></h4>
	          <h5 class="text-muted"><?php echo $data['level']?></h5>
	          <h6><?php echo $data['jurusan']?></h6>
	          <h6><?php echo $data['angkatan']?></h6>
	          <div class="d-flex flex-row justify-content-center">
	            <div class="p-4">
	              <a href="#"><i class="fa fa-facebook"></i></a>
	            </div>
	            <div class="p-4">
	              <a href="#"><i class="fa fa-twitter"></i></a>
	            </div>
	            <div class="p-4">
	              <a href="#"><i class="fa fa-instagram"></i></a>
	            </div>
	          </div>
	        </div>
	      </div>
	    </div>

	  <?php
	  	}

	  ?>
	  </div>

	</div>
	</section>

	<!-- KONTAK -->
	<div style="margin-top: 30px;">
	<header id="page-header">
	<div class="container">
	  <div class="row">
	    <div class="col-sm-6 m-auto text-center">
	      <h1>Hubungi Kami</h1>
	      <?php
	      	$p = "Jika ada keperluan atau sesuatu yang ingin anda tanyakan, hubungi kami melalui form di bawah atau bisa langsung hubungi beberapa kontak person dibawah.";
		  ?>
		  <p><?php echo $p; ?></p>
	    </div>
	  </div>
	</div>
	</header>

	<section id="kontak" class="py-3 bg-light">
	<div class="container">
	  <div class="row">
	    <div class="col-sm-4">
	      <div class="card p-4">
	        <div class="card-body">
	          <?php
		          $alamat = "JL.Mulawarman Barat 1 No.10 A, Kel.Kramas, Kota Semarang";
		          $email = "samosirsmg@gmail.com";
		          $hp = "085361872032";
	          ?>
	          	<h4>Alamat</h4>
		        <p><?php echo $alamat; ?></p>
		        <h4>Email</h4>
		        <p><?php echo $email; ?></p>
		        <h4>Phone</h4>
		        <p><?php echo $hp; ?></p>	          
	        </div>
	      </div>
	    </div>
	    <div class="col-sm-8">
	      <div class="card p-4">
	        <div class="card-body">
	         <form method="POST" action="pesan/index.php">
	          <h3 class="text-center">Silanhkan isi form di bawah untuk menghubugi kami</h3>
	          <hr>
	          <div class="row">
	            <div class="col-sm-12">
	              <div class="form-group">
	                <input type="text" name="nama" class="form-control" placeholder="Nama">
	              </div>
	            </div>
	            <div class="col-sm-6">
	              <div class="form-group">
	                <input type="text" name="email" class="form-control" placeholder="Email">
	              </div>
	            </div>
	            <div class="col-sm-6">
	              <div class="form-group">
	                <input type="text" name="hp" class="form-control" placeholder="Nomor Telepon">
	              </div>
	            </div>
	          </div>
	          <div class="row">
	            <div class="col-sm-12">
	              <div class="form-group">
	                <textarea class="form-control" name="pesan" placeholder="Pesan"></textarea>
	              </div>
	            </div>
	            <div class="col-sm-12">
	              <input type="submit" name="submit" class="btn btn-outline-danger btn-block">
	            </div>
	          </div>
	         </form>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
	</section>

	<!-- STAFF SECTION -->
	<section id="cp" class="py-5 text-center bg-dark text-white">
	<div class="container">
	  <h1>Contact Person</h1>
	  <hr>
	  <div class="row">
	    <div class="col-md-3">
	      <img src="img/rido.png" alt="" class="img-fluid rounded-circle mb-2">
	      <h4>Rido CM Simbolon</h4>
	      <small>085361872032</small><br>
	      <small>ridosimbolon98@gmail.com</small>
	    </div>
	    <div class="col-md-3">
	      <img src="img/indah.png" alt="" class="img-fluid rounded-circle mb-2">
	      <h4>Indah Sari Sigiro</h4>
	      <small>085296330739</small><br>
	      <small>kosong</small>
	    </div>
	    <div class="col-md-3">
	      <img src="img/kommi.jpg" alt="" class="img-fluid rounded-circle mb-2">
	      <h4>Kommi Ogians Sinurat</h4>
	      <small>082273642682</small><br>
	      <small>kommiogians@gamil.com</small>
	    </div>
	    <div class="col-md-3">
	      <img src="img/ita.png" alt="" class="img-fluid rounded-circle mb-2">
	      <h4>Ita Novitasari Gultom</h4>
	      <small>085261469056</small><br>
	      <small>itanovitagultom</small>
	    </div>
	  </div>
	</div>
	</section>

	<!-- MEDSOS SAMOSIR -->
	<section id="medsos" class="bg-light text-white py-5">
	<div class="container">
	  <div class="row">
	  	<div class="col-sm-6">
	  		<div class="p-4">
	  			<h4 class="text-dark">Ikuti kami di media sosial</h4>
	  		</div>
	  	</div>
	    <div class="col-sm-6">
	      <div class="d-flex flex-row justify-content-center">
            <div class="p-4">
              <a href="https://www.facebook.com/profile.php?id=100004757714677" target="_blank"><i class="fa fa-facebook"></i></a>
            </div>
            <div class="p-4">
              <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
            </div>
            <div class="p-4">
              <a href="https://www.instagram.com/keluargasamosirsmg/?hl=en" target="_blank"><i class="fa fa-instagram"></i></a>
            </div>
          </div>
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
	      <p class="lead">Keluarga Mahasiswa Asal Samosir Semarang Copyright &copy; 2019 All Right Reserve</p>
	    </div>
	    <div class="col-sm-6">
	    	<p class="lead">Coded by ridosimbolon98@gmail.com</p>
	    </div>
	  </div>
	</div>
	</footer>

 	<script src="assets/view/js/jquery.min.js"></script>
 	<script src="assets/view/js/popper.min.js"></script>
 	<script src="assets/view/js/bootstrap.min.js"></script>
 	<script src="assets/view/js/navbar-fixed.js"></script>
</body>
</html>