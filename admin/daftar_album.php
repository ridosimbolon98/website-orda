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
            <a href="v_album.php" class="nav-link">Kembali</a>
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


  <header id="main-header" class="py-2 bg-secondary text-white">
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
              <button class="btn btn-secondary">Cari</button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- POSTS -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4>Daftar Album</h4>
            </div>
            <table class="table table-striped">
              <thead class="thead-inverse">
                <tr>
                  <th>No.</th>
                  <th>Kategori</th>
                  <th>Foto</th>
                  <th>Aksi</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $no=1;
                  $kategori = $_GET['kategori'];
                  $query = "SELECT * FROM album WHERE kategori='$kategori'";
                  $result = $koneksi->query($query);

                  $total = mysqli_num_rows($result);

                  while ($data = mysqli_fetch_array($result)) {
                ?>

                  <tr>
                    <td scope="row"><?php echo $no; ?></td>
                    <td><?php echo $data['kategori']; ?></td>
                    <td>
                      <img class="img-fluid" src="../album/<?php echo $data['nama']; ?>" width="30%">
                    </td>
                    <td>
                      <a href="ubah_album.php?id=<?php echo $data['id'];?>" class="btn btn-secondary">Ubah</a>
                    </td>
                    <td>
                      <a href="hapus_album.php?id=<?php echo $data['id'];?>&&kategori=<?php echo $kategori; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                <?php
                    $no++;
                  }
                ?>                
              </tbody>
            </table>

            <nav class="ml-4">
              <ul class="pagination">
                <li class="page-item disabled"><a href="#" class="page-link">Previous</a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
              </ul>
            </nav>
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

  <script src="../assets/view/js/jquery.min.js"></script>
  <script src="../assets/view/js/popper.min.js"></script>
  <script src="../assets/view/js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
  <script>
      CKEDITOR.replace( 'editor1' );
  </script>
</body>
</html>