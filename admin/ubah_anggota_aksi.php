<?php
  session_start();
  include "../config/db.php";

  if($_SESSION['status']!="login"){
    header("location:login.php?pesan=belum_login");
  }else {
    if ($_SESSION['level']!="admin"){
      echo "<script>alert('Maaf, anda tidak memiliki wewenang untuk mengakses halaman ini!');history.go(-1);</script>";
    }
  }

  $id        = $_POST['id'];
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
      echo '<div class="alert alert-warning">Gagal upload foto.</div>';
      exit;
    }else{

      $update = $koneksi->query("UPDATE `anggota` SET `nama`='$nama', `jk`='$jk', `alamat`='$alamat', `hp`='$hp', `line`='$line', `tgl_lahir`='$tgl_lahir', `jurusan`='$jurusan', `angkatan`='$angkatan', `status`='$status', `foto`='$name' WHERE `anggota`.`id`='$id' ");
      if($update){
        echo "<script>alert('Data anggota berhasil di perbaharui');</script>";
        echo "<script>location='v_anggota.php';</script>";
      }else{
        echo "<script>alert('Gagal memperbaharui data!');history.go(-1);</script>";
        exit;
      }
    }

    // set permisi file
    chmod(UPLOAD_DIR . $name, 0644);

  } else{
      echo "<script>alert('Gagal mengupload foto!');history.go(-1);</script>";
  }

?>