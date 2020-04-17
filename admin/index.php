<?php 
  session_start();
  include '../config/db.php';

  if($_SESSION['status']!="login"){
    header("location:login.php?pesan=belum_login");
  }else {
    if ($_SESSION['level']!="admin"){
      echo "<script>alert('Maaf, anda tidak memiliki wewenang untuk mengakses halaman ini!');history.go(-1);</script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin Samosir Semarang</title>
  <link rel="stylesheet" type="text/css" href="../assets/view/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/view/css/font-awesome.min.css">
  <link rel="stylesheet" type="../text/css" href="assets/view/css/style_admin.css">
</head>
<body>
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark pt-2 pb-2">
    <div class="container">
      <a href="index.php" class="navbar-brand">Admin Samosir Semarang</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item px-2">
            <a href="v_post.php" class="nav-link">Post</a>
          </li>
          <li class="nav-item px-2">
            <a href="v_anggota.php" class="nav-link">Anggota</a>
          </li>
          <li class="nav-item px-2">
            <a href="v_pengurus.php" class="nav-link">Pengurus</a>
          </li>
          <li class="nav-item px-2">
            <a href="v_rental.php" class="nav-link">Rental</a>
          </li>
          <li class="nav-item px-2">
            <a href="v_album.php" class="nav-link">Album</a>
          </li>
          <li class="nav-item px-2">
            <a href="v_pesan.php" class="nav-link">Pesan</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown mr-3">
            
            <!-- Menampilkan nama admin setelah login -->
            <?php
              if (@$_SESSION['logged']==true){
                $user_terlogin = @$_SESSION['username'];
              }

              $sql_user = mysqli_query($koneksi,"SELECT * FROM admin WHERE username = '$user_terlogin'") or die(mysqli_errno());
              $data_user = mysqli_fetch_array($sql_user);
            ?>

            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user"></i> <?php echo $data_user['nama']; ?> 
            </a>
            <!-- batas nama -->

            <div class="dropdown-menu">
              <a href="#" class="dropdown-item">
                <i class="fa fa-user-circle"></i> Profile
              </a>
              <a href="#" class="dropdown-item">
                <i class="fa fa-gear"></i> Settings
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="fa fa-user-times"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1><i class="fa fa-gear"></i> Dashboard</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#tambahAnggotaModal">
            <i class="fa fa-plus"></i> Tambah Data Anggota
          </a>
        </div>
        <div class="col-md-3">
          <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#tambahPengurusModal">
            <i class="fa fa-plus"></i> Tambah Data Pengurus
          </a>
        </div>
        <div class="col-md-3">
          <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#tambahRentalModal">
            <i class="fa fa-plus"></i> Tambah Barang Rental
          </a>
        </div>
        <div class="col-md-3">
          <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#tambahAlbumModal">
            <i class="fa fa-plus"></i> Tambah Data Album
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- POSTS -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
              <h4>Daftar Anggota</h4>
            </div>
            <table class="table table-striped">
              <thead class="thead-inverse">
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Jurusan</th>
                  <th>Angkatan</th>
                  <th>Tanggal Lahir</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=1;
                  $query_pengurus = "SELECT * FROM pengurus";
                  $query_rental = "SELECT * FROM rental";
                  $query_album = "SELECT * FROM album";
                  $query_pesan = "SELECT * FROM pesan";
                  $query_post = "SELECT * FROM post";
                  $query = "SELECT * FROM anggota ORDER BY angkatan DESC";
                  $result = $koneksi->query($query);
                  $result2 = $koneksi->query($query_pengurus);
                  $result3 = $koneksi->query($query_rental);
                  $result4 = $koneksi->query($query_album);
                  $result5 = $koneksi->query($query_pesan);
                  $result6 = $koneksi->query($query_post);

                  $total = mysqli_num_rows($result);
                  $total2 = mysqli_num_rows($result2);
                  $total3 = mysqli_num_rows($result3);
                  $total4 = mysqli_num_rows($result4);
                  $total5 = mysqli_num_rows($result5);
                  $total6 = mysqli_num_rows($result6);

                  while ($data = mysqli_fetch_array($result)) {
                ?>

                  <tr>
                    <td scope="row"><?php echo $no; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['jurusan']; ?></td>
                    <td><?php echo $data['angkatan']; ?></td>
                    <td><?php echo $data['tgl_lahir']; ?></td>
                  </tr>

                <?php
                    $no++;
                  }
                ?>                
              </tbody>
            </table>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card text-center bg-primary text-white mb-3">
            <div class="card-body">
              <h3>Anggota</h3>
              <h1 class="display-4">
                <i class="fa fa-users"></i> <?php echo $total; ?>
              </h1>
              <a href="v_anggota.php" class="btn btn-outline-light btn-sm">View</a>
            </div>
          </div>

          <div class="card text-center bg-success text-white mb-3">
            <div class="card-body">
              <h3>Pengurus</h3>
              <h1 class="display-4">
                <i class="fa fa-user"></i> <?php echo $total2; ?>
              </h1>
              <a href="v_pengurus.php" class="btn btn-outline-light btn-sm">View</a>
            </div>
          </div>

          <div class="card text-center bg-warning text-white mb-3">
            <div class="card-body">
              <h3>Rental</h3>
              <h1 class="display-4">
                <i class="fa fa-pencil"></i> <?php echo $total3; ?>
              </h1>
              <a href="v_rental.php" class="btn btn-outline-light btn-sm">View</a>
            </div>
          </div>

          <div class="card text-center bg-danger text-white mb-3">
            <div class="card-body">
              <h3>Album</h3>
              <h1 class="display-4">
                <i class="fa fa-folder-open-o"></i> <?php echo $total4; ?>
              </h1>
              <a href="v_album.php" class="btn btn-outline-light btn-sm">View</a>
            </div>
          </div>

          <div class="card text-center bg-secondary text-white mb-3">
            <div class="card-body">
              <h3>Pesan</h3>
              <h1 class="display-4">
                <i class="fa fa-envelope"></i> <?php echo $total5; ?>
              </h1>
              <a href="v_pesan.php" class="btn btn-outline-light btn-sm">View</a>
            </div>
          </div>

          <div class="card text-center bg-dark text-white mb-3">
            <div class="card-body">
              <h3>Post</h3>
              <h1 class="display-4">
                <i class="fa fa-folder"></i> <?php echo $total6; ?>
              </h1>
              <a href="v_psot.php.php" class="btn btn-outline-light btn-sm">View</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer id="main-footer" class="bg-dark text-white mt-5 p-5">
    <div class="conatiner">
      <div class="row">
        <div class="col">
          <p class="lead text-center">Copyright &copy; 2019 Samosir Semarang All Right Reserve ~~ Coded by ridosimbolon98@gmail.com</p>
        </div>
      </div>
    </div>
  </footer>


  <!-- ANGGOTA MODAL -->
  <div class="modal fade" id="tambahAnggotaModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Tambah Anggota</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <form method="post" action="tambah_anggota.php" enctype="multipart/form-data">
            <div class="form-group">
              <label for="title">Nama</label>
              <input type="text" name="nama" autofocus class="form-control" required placeholder="Nama">
            </div>
            <div class="form-group">
              <label for="title">Jenis Kelamin</label>
              <select class="form-control" name="jk" required>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="title">Alamat</label>
              <input type="textarea" name="alamat" class="form-control" required placeholder="Alamat">
            </div>
            <div class="form-group">
              <label for="title">Nomor HP</label>
              <input type="text" name="hp" class="form-control" required placeholder="Nomor HP">
            </div>
            <div class="form-group">
              <label for="title">ID Line</label>
              <input type="text" name="line" class="form-control" required placeholder="ID Line">
            </div>
            <div class="form-group">
              <label for="title">Tanggal Lahir</label>
              <input type="text" name="tgl_lahir" class="form-control" required placeholder="Format (bulan-hari) contoh 01-31">
            </div>
            <div class="form-group">
              <label for="title">Jurusan</label>
              <input type="text" name="jurusan" class="form-control" required placeholder="Jurusan">
            </div>
            <div class="form-group">
              <label for="title">Angkatan</label>
              <input type="text" name="angkatan" class="form-control" required placeholder="Angkatan (contoh 2016)">
            </div>
            <div class="form-group">
              <label for="title">Status</label>
              <select class="form-control" name="status" required>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="alumni">Alumni</option>
              </select>
            </div>
            <div class="form-group">
              <label for="title">Foto</label>
              <input type="file" name="foto" required class="form-control">
              <p class="text-danger">Foto maksimal 2MB dan harus berekstensi PNG, JPEG atau JPG</p>
            </div>

            <div class="modal-footer">
              <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button class="btn btn-primary" type="submit" name="submit">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>


  <!-- TAMBAH DATA PENGURUS MODAL -->
  <div class="modal fade" id="tambahPengurusModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title">Tambah Data Pengurus</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <form method="post" action="tambah_pengurus.php" enctype="multipart/form-data">
            <div class="form-group">
              <label for="title">Nama</label>
              <input type="text" name="nama" autofocus class="form-control" required placeholder="Nama">
            </div>
            <div class="form-group">
              <label for="title">Jurusan</label>
              <input type="text" name="jurusan" class="form-control" required placeholder="Jurusan">
            </div>
            <div class="form-group">
              <label for="title">Angkatan</label>
              <input type="text" name="angkatan" class="form-control" required placeholder="Angkatan (contoh 2019)">
            </div>
            <div class="form-group">
              <label for="title">Periode</label>
              <input type="text" name="periode" class="form-control" required placeholder="periode">
            </div>
            <div class="form-group">
              <label for="title">Bidang</label>
              <select class="form-control" name="bidang" required>
                <option value="">--Pilih Bidang--</option>
                <option value="bph">Badan Pengurus Harian</option>
                <option value="mikat">Minat dan Bakat</option>
                <option value="infokom">Informasi dan Komunikasi</option>
                <option value="sosial">Sosial</option>
                <option value="finansial">Finansial</option>
              </select>
            </div>
            <div class="form-group">
              <label for="title">Level</label>
              <select class="form-control" name="level" required>
                <option value="">--Pilih Level--</option>
                <option value="Ketua">Ketua</option>
                <option value="Wakil-Ketua">Wakil Ketua</option>
                <option value="Koordinator">Koordinator</option>
                <option value="Anggota">Anggota</option>
              </select>
            </div>
            <div class="form-group">
              <label for="title">Foto</label>
              <input type="file" name="foto" required class="form-control">
              <p class="text-danger">Foto maksimal 2MB dan harus berekstensi PNG, JPEG atau JPG</p>
            </div>

            <div class="modal-footer">
              <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button class="btn btn-success" type="submit" name="submit1">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- TAMBAH DATA RENTAL MODAL -->
  <div class="modal fade" id="tambahRentalModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title">Tambah Data Rental</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <form method="post" action="tambah_rental.php" enctype="multipart/form-data">
            <div class="form-group">
              <label for="title">Nama Barang</label>
              <input type="text" name="nama" autofocus class="form-control" required placeholder="Nama Barang">
            </div>
            <div class="form-group">
              <label for="title">Deskripsi Barang</label>
              <input type="textarea" name="deskripsi" class="form-control" required placeholder="Deskripsi Barang">
            </div>
            <div class="form-group">
              <label for="title">Biaya Rental</label>
              <input type="text" name="biaya" class="form-control" required placeholder="Biaya Rental /Hari">
            </div>
            <div class="form-group">
              <label for="title">Gambar Barang</label>
              <input type="file" name="foto" required class="form-control">
              <p class="text-danger">Foto maksimal 2MB dan harus berekstensi PNG, JPEG atau JPG</p>
            </div>

            <div class="modal-footer">
              <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button class="btn btn-success" type="submit" name="submit">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- TAMBAH ALBUM MODAL -->
  <div class="modal fade" id="tambahAlbumModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title">Tambah Album</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <form method="post" action="tambah_album.php" enctype="multipart/form-data">
            <div class="form-group">
              <label for="title">Foto Album</label>
              <input type="file" name="foto" required class="form-control">
              <p class="text-danger">Foto maksimal 2MB dan harus berekstensi PNG, JPEG atau JPG</p>
            </div>
            <div class="form-group">
              <label for="title">Kategori Album</label>
              <select class="form-control" name="kategori" required>
                <option value="">--Pilih Kategori--</option>
                <option value="natal">Album Natal</option>
                <option value="makrab">Album Makrab</option>
                <option value="por">Album POR</option>
                <option value="qt">Album Quality Time</option>
                <option value="paskah">Album Paskah</option>
                <option value="olahraga">Album Olahraga</option>
              </select>
            </div>

            <div class="modal-footer">
              <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button class="btn btn-success" type="submit" name="submit1">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  

  <script src="../assets/view/js/jquery.min.js"></script>
  <script src="../assets/view/js/popper.min.js"></script>
  <script src="../assets/view/js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
  <script>
      CKEDITOR.replace( 'editor1' );
  </script>
</body>
</html>
