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

  $result = $koneksi->query("SELECT * FROM pengurus WHERE id='$id'");

  $data = mysqli_fetch_array($result);
  $foto   = "../img/".$data['foto'];
  if(file_exists($foto)){
    unlink($foto);
  }

  if(file_exists($foto)){
    echo "<script>alert('Gagal menghapus foto!');history.go(-1);</script>";
  } else {
    $delete = $koneksi->query("DELETE FROM pengurus WHERE id='$id'");
    if($delete){
      echo "<script>alert('Data pengurus berhasil di hapus');</script>";
      echo "<script>location='v_pengurus.php';</script>";
    }else{
      echo "<script>alert('Gagal menghapus data!');history.go(-1);</script>";
      exit;
    }
  }

  

?>