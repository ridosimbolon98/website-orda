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
            <a href="v_album.php" class="nav-link active">Album</a>
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

  <header id="main-header" class="py-2 bg-danger text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1><i class="fa fa-users"></i> Album</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-danger">Cari</button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <div class="card text-center bg-primary text-white mb-3">
        <div class="card-body">
          <h3>Album Natal</h3>
          <h1 class="display-4">
            <i class="fa fa-folder-open-o"></i> 
          </h1>
          <a href="daftar_album.php?kategori=natal" class="btn btn-outline-light btn-sm">View</a>
        </div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="card text-center bg-success text-white mb-3">
        <div class="card-body">
          <h3>Album Makrab</h3>
          <h1 class="display-4">
            <i class="fa fa-folder-open-o"></i> 
          </h1>
          <a href="daftar_album.php?kategori=makrab" class="btn btn-outline-light btn-sm">View</a>
        </div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="card text-center bg-warning text-white mb-3">
        <div class="card-body">
          <h3>Album POR</h3>
          <h1 class="display-4">
            <i class="fa fa-folder-open-o"></i>
          </h1>
          <a href="daftar_album.php?kategori=por" class="btn btn-outline-light btn-sm">View</a>
        </div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="card text-center bg-danger text-white mb-3">
        <div class="card-body">
          <h3>Album Q-Time</h3>
          <h1 class="display-4">
            <i class="fa fa-folder-open-o"></i>
          </h1>
          <a href="daftar_album.php?kategori=qt" class="btn btn-outline-light btn-sm">View</a>
        </div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="card text-center bg-secondary text-white mb-3">
        <div class="card-body">
          <h3>Album Olahraga</h3>
          <h1 class="display-4">
            <i class="fa fa-folder-open-o"></i> 
          </h1>
          <a href="daftar_album.php?kategori=olahraga" class="btn btn-outline-light btn-sm">View</a>
        </div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="card text-center bg-dark text-white mb-3">
        <div class="card-body">
          <h3>Album Paskah</h3>
          <h1 class="display-4">
            <i class="fa fa-folder-open-o"></i> 
          </h1>
          <a href="daftar_album.php?kategori=paskah" class="btn btn-outline-light btn-sm">View</a>
        </div>
      </div>
    </div>

    </div>
  </div>
</div>

  <footer id="main-footer" class="bg-dark text-white mt-5 p-5">
    <div class="conatiner">
      <div class="row">
        <div class="col">
          <p class="lead text-center">Copyright &copy; 2019 Samosir Semarang All Right Reserve ~~ Coded by ridosimbolon98@gmail.com</p>
        </div>
      </div>
    </div>
  </footer>

  <script src="../assets/view/js/jquery.min.js"></script>
  <script src="../assets/view/js/popper.min.js"></script>
  <script src="../assets/view/js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
  <script>
      CKEDITOR.replace( 'editor1' );
  </script>
</body>
</html>