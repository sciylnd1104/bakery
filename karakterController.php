<?php
include('koneksi.php');
  if($_GET['aksi']=='tambah'){
    $id_karakter = isset($_POST['txtID'])?$_POST['txtID']:'';
    $nama_karakter = isset($_POST['txtNama'])?$_POST['txtNama']:'';
    $harga = isset($_POST['txtHarga'])?$_POST['txtHarga']:'';
    if(isset($_POST['btnSubmit'])){
      $simpan = mysqli_query($koneksi,"insert into karakter values('$id_karakter','$nama_karakter','$harga')");
      if($simpan){
        header('location:index.php?p=karakter');
      }
    }
  }
  else if($_GET['aksi']=='ubah'){
    $id = $_GET['id'];
    $nama_karakter = isset($_POST['txtNama'])?$_POST['txtNama']:'';
    $harga = isset($_POST['txtHarga'])?$_POST['txtHarga']:'';
    if(isset($_POST['btnSubmit'])){
      $edit = mysqli_query($koneksi,
      "update karakter
      set nama_karakter = '$nama_karakter',
      harga = '$harga'
      where id_karakter = '$id'");
      if($edit){
        header('location:index.php?p=karakter');
      }else{
        echo "<script>alert('ERROR')</script>"; 
      }
    }
  }
  else if($_GET['aksi']=='hapus'){
    $hapus = mysqli_query($koneksi,"delete from karakter where id_karakter='$_GET[id_karakter]'");
    if($hapus){
      header('location:index.php?p=karakter');
    }
  }
?>
