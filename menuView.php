<div class="card shadow mb-4">
            <div class="card-header py-3"> 
              <h6 class="m-0 font-weight-bold text-info">Menu</h6>
            </div>
            <div class="card-body">
            <?php
              $page=isset($_GET['page'])?$_GET['page']:'list';
              switch ($page) {
              case 'list':
          ?>
            <p><a href="?p=menu&page=entri" class="btn btn-info"><i class="fasfa-save mr-2"></i>Tambah Menu</a></p>
          <div class="table-responsive">
             <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-info text-white">
                    <tr>
                      <th>No</th>
                      <th>ID Menu</th>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>Detail</th>
                      <th>Kategori</th>
                      <th>Stok</th>
                      <th>Photo</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot class="bg-info text-white">
                    <tr>
                      <th>No</th>
                      <th>ID Menu</th>
                      <th>Nama</th>
                      <th>Harga</th>
                      <th>Detail</th>
                      <th>Kategori</th>
                      <th>Stok</th>
                      <th>Photo</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                  include('koneksi.php');
                    $data = mysqli_query($koneksi,"SELECT * from menu INNER JOIN kategori ON menu.id_kategori = kategori.id_kategori");
                    $i =1;
                    while ($row=mysqli_fetch_array($data)) {
                 ?>
                      <tr>
                      <td><?php echo $i?></td>
                        <td><?php echo $row['id_menu']?></td>
                        <td><?php echo $row['nama_menu']?></td>
                        <td><?=$row['harga']?></td>
                        <td><?=$row['detail']?></td>
                        <td><?=$row['nama_kategori']?></td>
                        <td><?=$row['stok']?></td>
                        <td><img src="gambar/<?=$row['foto']?>" width="70px" height="70px"></td>
                        <td>
                        <a href="menuController.php?aksi=hapus&id_menu=<?php echo $row['id_menu']?>" class="btn btn-danger pr-2 pl-2" onclick="return confirm('Anda yakin ingin menghapus')"><i class="fas fa-trash mr-2"></i>Hapus</a>
                          <a href="?p=menu&page=update&id_menu=<?php echo $row['id_menu']?>" class="btn btn-primary ml-2 pr-2 pl-2"><i class="far fa-edit mr-2"></i>Edit</a>
                          <a href="" class="btn btn-success">Detail</a></td>
                      </tr>
                      <?php $i++;}?>
                  </tbody>
                </table>
                <?php
                  break;
                  case 'entri':
                  include('koneksi.php');
                  $data = mysqli_query($koneksi,"select * from kategori");
                  ?>
                  <h3>Input Data Menu</h3>
                  <form class="form-group" method="post" action="menuController.php?aksi=tambah" enctype="multipart/form-data">
                    <div class="row mt-2">
                      <div class="col-md-2">
                        ID Menu
                      </div>
                      <div class="col-md-5">
                        <input type="text" name="txtIdMenu" class="form-control">
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-2">
                        Nama
                      </div>
                      <div class="col-md-5">
                        <input type="text" name="txtNamaBar" class="form-control">
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-2">
                        Harga
                      </div>
                      <div class="col-md-5">
                        <input type="text" name="txtHarga" class="form-control">
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-2">
                        Detail
                      </div>
                      <div class="col-md-5">
                        <input type="text" name="txtDetail" class="form-control">
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-2">
                        Kategori
                      </div>
                      <div class="col-md-5">
                      <select name="cmbKategori" class="form-control">
                            <?php
                                while($row=mysqli_fetch_array($data)){
                            ?>
                                <option value="<?=$row['id_kategori'] ?>"><?=$row['nama_kategori'] ?></option>
                            <?php
                                }
                            ?>
                          </select>
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-2">
                        Stok
                      </div>
                      <div class="col-md-5">
                        <input type="text" name="txtStok" class="form-control">
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-2">
                        Foto
                      </div>
                      <div class="col-md-5">
                        <input type="file" name="fileAp" class="form-control">
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-2">
                        &nbsp;
                      </div>
                      <div class="col-md-5">
                        <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary">
                        <input type="reset" name="btnReset" value="Reset" class="btn btn-danger">
                      </div>
                    
					        </form>
                  <?php
                  break;
                  case 'update':
                  include ('koneksi.php');
                  $ambil = mysqli_query($koneksi,"select * from menu where id_menu='$_GET[id_menu]'");
                  $data = mysqli_fetch_array($ambil);
                  ?>
                  <h2>Update Data Menu</h2>
                  <form class="form-group mt-5" method="post" action="menuController.php?aksi=ubah&id_menu=<?php echo $data['id_menu']?>" enctype="multipart/form-data">
                    <div class="row mt-2">
                      <div class="col-md-2">
                        Nama
                      </div>
                      <div class="col-md-5">
                        <input type="text" name="txtNamaBar" class="form-control" value="<?=$data['nama_menu'] ?>">
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-2">
                        Harga
                      </div>
                      <div class="col-md-5">
                        <input type="text" name="txtHarga" class="form-control" value="<?=$data['harga'] ?>">
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-2">
                        Detail
                      </div>
                      <div class="col-md-5">
                        <input type="text" name="txtDetail" class="form-control" value="<?=$data['detail'] ?>">
                      </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-2">
                          Kategori
                        </div>
                        <div class="col-md-5">
                          <select name="cmbKategori" class="form-control">
                            <?php
                                $datakategori = mysqli_query($koneksi,'select * from kategori');
                                while($row=mysqli_fetch_array($datakategori)){
                            ?>
                            <option value='<?php  echo "$row[nama_kategori]" ?>' <?php  if($row['id_kategori']== $data['id_kategori']) echo "selected='selected'"?> ><?php  echo "$row[nama_kategori]"?></option>
                            <?php
                              }
                            ?>

                          </select>
                        </div>
                      </div>
                      <div class="row mt-2">
                      <div class="col-md-2">
                        Stok
                      </div>
                      <div class="col-md-5">
                        <input type="text" name="txtStok" class="form-control" value="<?=$data['stok'] ?>">
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-2">
                        Foto
                      </div>
                      <div class="col-md-5">
                        <input type="file" name="fileAp" class="form-control">
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-2">
                        &nbsp;
                      </div>
                      <div class="col-md-5">
                        <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary">
                        <input type="reset" name="btnReset" value="Reset" class="btn btn-danger">
                      </div>
                    </div>
                  </form>
                  <?php
                    break;
                    }
                  ?>
                  </div>
              </div>
            </div>
       
        <!-- /.container-fluid -->
 