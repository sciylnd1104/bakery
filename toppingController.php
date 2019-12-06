<?php
include('koneksi.php');
  if($_GET['aksi']=='tambah'){
    $id_topping = isset($_POST['txtID'])?$_POST['txtID']:'';
    $nama_topping = isset($_POST['txtNama'])?$_POST['txtNama']:'';
    $harga = isset($_POST['txtHarga'])?$_POST['txtHarga']:'';
    if(isset($_POST['btnSubmit'])){
      $simpan = mysqli_query($koneksi,"insert into topping values('$id_topping','$nama_topping','$harga')");
      if($simpan){
        header('location:index.php?p=topping');
      }
    }
  }
  else if($_GET['aksi']=='ubah'){
    $id = $_GET['id'];
    $nama_topping = isset($_POST['txtNama'])?$_POST['txtNama']:'';
    $harga = isset($_POST['txtHarga'])?$_POST['txtHarga']:'';
    if(isset($_POST['btnSubmit'])){
      $edit = mysqli_query($koneksi,
      "update topping
      set nama_topping = '$nama_topping',
      harga = '$harga'
      where id_topping = '$id'");
      if($edit){
        header('location:index.php?p=topping');
      }else{
        echo "<script>alert('ERROR')</script>"; 
      }
    }
  }
  else if($_GET['aksi']=='hapus'){
    $hapus = mysqli_query($koneksi,"delete from topping where id_topping='$_GET[id_topping]'");
    if($hapus){
      header('location:index.php?p=topping');
    }
  }
?>
