<?php
include('koneksi.php');
  if($_GET['aksi']=='tambah'){
    $nama_kategori = isset($_POST['txtNama'])?$_POST['txtNama']:'';
    $keterangan = isset($_POST['txtKeterangan'])?$_POST['txtKeterangan']:'';
    if(isset($_POST['btnSubmit'])){
      $simpan = mysqli_query($koneksi,"insert into kategori values(0,'$nama_kategori','$keterangan')");
      if($simpan){
        header('location:index.php?p=kategori');
      }
    }
  }
  else if($_GET['aksi']=='ubah'){
    $id = $_GET['id'];
    $nama = isset($_POST['txtNama'])?$_POST['txtNama']:'';
    $ket = isset($_POST['txtKeterangan'])?$_POST['txtKeterangan']:'';
    if(isset($_POST['btnSubmit'])){
      $edit = mysqli_query($koneksi,
      "update kategori
      set nama_kategori = '$nama',
      keterangan = '$ket'
      where id_kategori = '$id'");
      if($edit){
        header('location:index.php?p=kategori');
      }else{
        echo "<script>alert('ERROR')</script>"; 
      }
    }
  }
  else if($_GET['aksi']=='hapus'){
    $hapus = mysqli_query($koneksi,"delete from kategori where id_kategori='$_GET[id_kategori]'");
    if($hapus){
      header('location:index.php?p=kategori');
    }
  }
?>
