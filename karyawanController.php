<?php
include('koneksi.php');
  if($_GET['aksi']=='tambah'){
    $lokasifile = $_FILES['fileAp']['tmp_name'];
    $id_karyawan = isset($_POST['txtIdKaryawan'])?$_POST['txtIdKaryawan']:'';
    $nama_karyawan = isset($_POST['txtNama'])?$_POST['txtNama']:'';
    $jk = isset($_POST['jekel'])?$_POST['jekel']:'';
    $telp = isset($_POST['txtTelepon'])?$_POST['txtTelepon']:'';
    $status = isset($_POST['txtStatus'])?$_POST['txtStatus']:'';
    $email = isset($_POST['txtEmail'])?$_POST['txtEmail']:'';
    $alamat = isset($_POST['txtAlamat'])?$_POST['txtAlamat']:'';
    if(!empty($lokasifile)){
      $tipefile = $_FILES['fileAp']['type'];
      if($tipefile=="image/png"){
        if(isset($_POST['btnSubmit'])){
          $namafile = $_FILES['fileAp']['name'];
          $dirapload = "../gambar/";
          $fileapload = $dirapload.$namafile;
          $simpan = mysqli_query($koneksi,"insert into karyawan values('$id_karyawan','$nama_karyawan','$jk','$telp','$status','$email','$alamat','$namafile')");
          if($simpan){
            move_uploaded_file($lokasifile,$fileapload);
            header('location:index.php?p=karyawan');
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
        $simpan = mysqli_query($koneksi,"insert into karyawan values('$id_karyawan','$nama_karyawan','$jk','$telp','$status','$email','$alamat','$namafile')");
        if($simpan){
          move_uploaded_file($lokasifile,$fileapload);
          header('location:index.php?p=karyawan');
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
    $id_karyawan =$_GET['id_karyawan'];
    $nama_karyawan = isset($_POST['txtNama'])?$_POST['txtNama']:'';
    $jk = isset($_POST['jekel'])?$_POST['jekel']:'';
    $telp = isset($_POST['txtTelepon'])?$_POST['txtTelepon']:'';
    $status = isset($_POST['txtStatus'])?$_POST['txtStatus']:'';
    $email = isset($_POST['txtEmail'])?$_POST['txtEmail']:'';
    $alamat = isset($_POST['txtAlamat'])?$_POST['txtAlamat']:'';
    if(empty($namafile)){
      if(isset($_POST['btnSubmit'])){
        $edit = mysqli_query($koneksi,
        "update karyawan
        set nama_karyawan = '$nama_karyawan',
        jk = '$jk',
        telp = '$telp',
        status = '$status',
        email = '$email',
        alamat = '$alamat' where id_karyawan = '$id_karyawan'");
        if($edit){
          // echo "<script>
          //     Swal.fire({
          //     title: 'Data karyawan',
          //     text:'Berhasil Ditambahkan',
          //     type:'success'});
          //     </script>";
        }
      }
    }
    else{
      $queryselect = mysqli_query($koneksi,"select foto from karyawan where id_karyawan='$id_karyawan'");
      $foto = mysqli_fetch_array($queryselect);
      unlink("../gambar/".$foto['foto']);
      $edit = mysqli_query($koneksi,
      "update karyawan
        set nama_karyawan = '$nama_karyawan',
        jk = '$jk',
        telp = '$telp',
        status = '$status',
        email = '$email',
        alamat = '$alamat',
      foto = '$namafile' where id_karyawan = '$id_karyawan'");
      if($edit){
        move_uploaded_file($lokasifile,$fileapload);
        // echo "<script>
        //     Swal.fire({
        //     title: 'Data karyawan',
        //     text:'Berhasil Ditambahkan',
        //     type:'success'});
        //     </script>";
    }
  }
  header('location:index.php?p=karyawan');
}
  else if($_GET['aksi']=='hapus'){
    $id_karyawan = $_GET['id_karyawan'];
    $queryselect = mysqli_query($koneksi,"select foto from karyawan where id_karyawan='$id_karyawan'");
    $foto = mysqli_fetch_array($queryselect);
    unlink("../gambar/".$foto['foto']);
    $hapus = mysqli_query($koneksi,"delete from karyawan where id_karyawan='$id_karyawan'");
    if($hapus){
        header('location:index.php?p=karyawan');
    }
  }
