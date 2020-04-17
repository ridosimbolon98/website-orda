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

  $nama      = $_POST['nama'];
  $jk        = $_POST['jk'];
  $alamat    = $_POST['alamat'];
  $hp        = $_POST['hp'];
  $line      = $_POST['line'];
  $tgl_lahir = $_POST['tgl_lahir'];
  $jurusan   = $_POST['jurusan'];
  $angkatan  = $_POST['angkatan'];
  $status    = $_POST['status'];

  define("UPLOAD_DIR", "../ultah/");
  if(!empty($_FILES["foto"])){
    $foto = $_FILES["foto"];
    $ext    = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
    $size = $_FILES["foto"]["size"];

    if ($foto["error"] !== UPLOAD_ERR_OK) {
      echo '<div class="alert alert-warning">Gagal upload foto.</div>';
      exit;
    }

    $name = preg_replace("/[^A-Z0-9._-]/i", "_", $foto["name"]);

    // mencegah overwrite filename
    $i = 0;
    $parts = pathinfo($name);
    while (file_exists(UPLOAD_DIR . $name)) {
      $i++;
      $name = $parts["filename"] . "-" . $i . "." . $parts["extension"];
    }

    // upload file
    $success = move_uploaded_file($foto["tmp_name"],
      UPLOAD_DIR . $name);

    if (!$success) { 
      echo "<script>alert('Gagal mengupload foto!');history.go(-1);</script>";
      exit;
    }else{

      $insert = $koneksi->query("INSERT INTO `anggota`(`nama`, `jk`, `alamat`, `hp`, `line`, `tgl_lahir`, `jurusan`, `angkatan`, `status`, `foto`) VALUES ('$nama', '$jk', '$alamat', '$hp', '$line', '$tgl_lahir', '$jurusan', '$angkatan', '$status', '$name')");
      if($insert){
        echo "<script>alert('Data anggota berhasil di input ke database');</script>";
        echo "<script>location='v_anggota.php';</script>";
      }else{
        echo "<script>alert('Gagal mengupload data ke database!');history.go(-1);</script>";
        exit;
      }
    }

    // set permisi file
    chmod(UPLOAD_DIR . $name, 0644);

  } else{
      echo "<script>alert('Gagal mengupload foto!');history.go(-1);</script>";
  }

?>

