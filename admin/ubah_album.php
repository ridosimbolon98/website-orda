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
          <li class="nav-item ml-auto">
            <a href="v_album.php" class="nav-link">Kembali</a>
          </li>

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

  <!-- ANGGOTA MODAL -->
  <div class="container mt-5">
    <div class="row">
        <div class="col-sm-12">
          <?php
            $id = $_GET['id'];
            $query = "SELECT * FROM album WHERE id='$id'";
            $result = $koneksi->query($query);
            
            $al = array('natal','makrab','por','qt','paskah','olahraga');
            while ($data = mysqli_fetch_array($result)) {
          ?>

          <form method="post" action="ubah_album_aksi.php" enctype="multipart/form-data">
            <div class="form-group">
              <label for="title">Kategori Album</label>
              <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
              <select class="form-control" name="kategori" required>
                <?php
                  foreach ($al as $a) {
                    echo "<option value='$a'";
                    echo $data['kategori']==$a?'selected="selected"':'';
                    echo ">$a</option>";
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="title">Ubah Foto Album</label><br>
              <img class="img-fluid" src="../album/<?php echo $data['nama'];?>" wiidth="20%">
              <input type="file" name="foto" required class="form-control">
              <p class="text-danger">Foto maksimal 2MB dan harus berekstensi PNG, JPEG atau JPG</p>
            </div>

            <input class="btn btn-success form-control" type="submit" name="submit" value="Simpan">
          </form>

          <?php
            }

          ?>
          
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