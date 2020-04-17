<DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Daftar Anggota</title>
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
	          <a href="../index.php" class="nav-link">Home</a>
	        </li>
	      </ul>
	    </div>
	  </div>
	</nav>


	<!-- Tabel Anggota -->
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4>Daftar Anggota Keluarga</h4>
					</div>
					<table class="table table-striped">
						<thead class="thead-inverse">
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Jenis Kelamin</th>
								<th>Asal</th>
								<th>Jurusan</th>
								<th>Angkatan</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$no = 1;
							include '../config/db.php';
							$query = "SELECT * FROM anggota ORDER BY angkatan DESC";
							$result = $koneksi->query($query);

							while ($data = mysqli_fetch_array($result)) {
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data['nama']; ?></td>
								<td><?php echo $data['jk']; ?></td>
								<td><?php echo $data['asal']; ?></td>
								<td><?php echo $data['jurusan']; ?></td>
								<td><?php echo $data['angkatan']; ?></td>
							</tr>
						<?php
								$no++;
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</body>
</html>