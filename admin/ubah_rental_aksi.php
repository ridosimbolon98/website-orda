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
  $biaya     = $_POST['biaya'];
  $deskripsi = $_POST['deskripsi'];


  define("UPLOAD_DIR", "../img/");
  if(!empty($_FILES["foto"])){
    $foto = $_FILES["foto"];
    $ext    = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION);
    $size = $_FILES["foto"]["size"];

    if ($foto["error"] !== UPLOAD_ERR_OK) {
      echo "<script>alert('Gagal upload foto');history.go(-1);</script>";
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
      echo "<script>alert('Gagal upload foto');history.go(-1);</script>";
      exit;
    }else{

      $update = $koneksi->query("UPDATE `rental` SET `nama`='$nama', `deskripsi`='$deskripsi', `biaya`='$biaya', `gambar`='$name' WHERE `rental`.`id`='$id' ");
      if($update){
        echo "<script>alert('Data barang rental berhasil di perbaharui');</script>";
        echo "<script>location='v_rental.php';</script>";
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