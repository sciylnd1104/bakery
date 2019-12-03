<?php
include('koneksi.php');
  if($_GET['aksi']=='tambah'){
    $lokasifile = $_FILES['fileAp']['tmp_name'];
    $id_menu = isset($_POST['txtIdMenu'])?$_POST['txtIdMenu']:'';
    $nama_menu = isset($_POST['txtNamaBar'])?$_POST['txtNamaBar']:'';
    $harga = isset($_POST['txtHarga'])?$_POST['txtHarga']:'';
    $detail = isset($_POST['txtDetail'])?$_POST['txtDetail']:'';
    $id_kategori = isset($_POST['cmbKategori'])?$_POST['cmbKategori']:'';
    $stok = isset($_POST['txtStok'])?$_POST['txtStok']:'';
    if(!empty($lokasifile)){
      $tipefile = $_FILES['fileAp']['type'];
      if($tipefile=="image/png"){
        if(isset($_POST['btnSubmit'])){
          $namafile = $_FILES['fileAp']['name'];
          $dirapload = "../gambar/";
          $fileapload = $dirapload.$namafile;
          $simpan = mysqli_query($koneksi,"insert into menu values('$id_menu','$nama_menu','$harga','$detail','$id_kategori','$stok','$namafile')");
          if($simpan){
            move_uploaded_file($lokasifile,$fileapload);
            header('location:index.php?p=menu');
          }
        }
      }
      else{
        echo "<script>alert('file harus berformat .png')</script>";
      }
    }
    else{
      $lokasifile = '../gambar/';
      $namafile = 'avatar5.png';
      $dirapload = "../gambar/";
      $fileapload = $dirapload.$namafile;
      if(isset($_POST['btnSubmit'])){
        $simpan = mysqli_query($koneksi,"insert into menu values('$id_menu','$nama_menu','$harga','$detail','$id_kategori','$stok','$namafile')");
        if($simpan){
          move_uploaded_file($lokasifile,$fileapload);
          header('location:index.php?p=menu');
        }
      }
    }
  }
  else if($_GET['aksi']=='ubah'){
    $lokasifile = $_FILES['fileAp']['tmp_name'];
    $tipefile = $_FILES['fileAp']['type'];
    $namafile = $_FILES['fileAp']['name'];
    $dirapload = "../gambar/";
    $fileapload = $dirapload.$namafile;
    $id_menu = $_GET['id_menu'];
    $nama_menu = isset($_POST['txtNamaBar'])?$_POST['txtNamaBar']:'';
    $harga = isset($_POST['txtHarga'])?$_POST['txtHarga']:'';
    $detail = isset($_POST['txtDetail'])?$_POST['txtDetail']:'';
    $id_kategori = isset($_POST['cmbKategori'])?$_POST['cmbKategori']:'';
    $stok = isset($_POST['txtStok'])?$_POST['txtStok']:'';
    if(empty($namafile)){
      if(isset($_POST['btnSubmit'])){
        $edit = mysqli_query($koneksi,
        "update menu
        set nama_menu = '$nama_menu',
        harga = '$harga',
        detail = '$detail',
        id_kategori = '$id_kategori',
        stok = '$stok' where id_menu = '$id_menu'");
        if($edit){
          // echo "<script>
          //     Swal.fire({
          //     title: 'Data Menu',
          //     text:'Berhasil Ditambahkan',
          //     type:'success'});
          //     </script>";
        }
      }
    }
    else{
      $queryselect = mysqli_query($koneksi,"select foto from menu where id_menu='$id_menu'");
      $foto = mysqli_fetch_array($queryselect);
      unlink("../gambar/".$foto['foto']);
      $edit = mysqli_query($koneksi,
      "update menu
      set nama_menu = '$nama_menu',
      harga = '$harga',
      detail = '$detail',
      id_kategori = '$id_kategori',
      stok = '$stok', 
      foto = '$namafile' where id_menu = '$id_menu'");
      if($edit){
        move_uploaded_file($lokasifile,$fileapload);
        // echo "<script>
        //     Swal.fire({
        //     title: 'Data Menu',
        //     text:'Berhasil Ditambahkan',
        //     type:'success'});
        //     </script>";
    }
  }
  header('location:index.php?p=menu');
}
  else if($_GET['aksi']=='hapus'){
    $id_menu = $_GET['id_menu'];
    $queryselect = mysqli_query($koneksi,"select foto from menu where id_menu='$id_menu'");
    $foto = mysqli_fetch_array($queryselect);
    unlink("../gambar/".$foto['foto']);
    $hapus = mysqli_query($koneksi,"delete from menu where id_menu='$id_menu'");
    if($hapus){
        header('location:index.php?p=menu');
    }
  }
