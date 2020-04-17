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


  $id = $_GET['id'];
  $kategori = $_GET['kategori'];

  $result = $koneksi->query("SELECT nama FROM album WHERE id='$id'");

  $data = mysqli_fetch_array($result);
  $foto   = "../album/".$data['nama'];
  if(file_exists($foto)){
    unlink($foto);
  }

  if(file_exists($foto)){
    echo "<script>alert('Gagal menghapus foto!');history.go(-1);</script>";
  } else {
    $update = $koneksi->query("DELETE FROM album WHERE id='$id'");
    if($update){
      echo "<script>alert('Foto berhasil di hapus');</script>";
      echo "<script>location='daftar_album.php?kategori=$kategori';</script>";
    }else{
      echo "<script>alert('Gagal menghapus foto!');history.go(-1);</script>";
      exit;
    }
  }

?>