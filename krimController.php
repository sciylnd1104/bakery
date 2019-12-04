<?php
include('koneksi.php');
  if($_GET['aksi']=='tambah'){
    $id_krim = isset($_POST['txtID'])?$_POST['txtID']:'';
    $nama_krim = isset($_POST['txtNama'])?$_POST['txtNama']:'';
    if(isset($_POST['btnSubmit'])){
      $simpan = mysqli_query($koneksi,"insert into krim values('$id_krim','$nama_krim')");
      if($simpan){
        header('location:index.php?p=krim');
      }
    }
  }
  else if($_GET['aksi']=='ubah'){
    $id = $_GET['id'];
    $nama_krim = isset($_POST['txtNama'])?$_POST['txtNama']:'';
    if(isset($_POST['btnSubmit'])){
      $edit = mysqli_query($koneksi,
      "update krim
      set nama_krim = '$nama_krim',
      where id_krim = '$id'");
      if($edit){
        header('location:index.php?p=krim');
      }else{
        echo "<script>alert('ERROR')</script>"; 
      }
    }
  }
  else if($_GET['aksi']=='hapus'){
    $hapus = mysqli_query($koneksi,"delete from krim where id_krim='$_GET[id_krim]'");
    if($hapus){
      header('location:index.php?p=krim');
    }
  }
?>
