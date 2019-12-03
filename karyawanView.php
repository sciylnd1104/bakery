<div class="card shadow mb-4">
            <div class="card-header py-3"> 
              <h6 class="m-0 font-weight-bold text-info">Karyawan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <?php
                $page=isset($_GET['page'])?$_GET['page']:'list';
                switch ($page) {
                case 'list':
            ?>
            <p><a href="?p=karyawan&page=entri" class="btn btn-info"><i class="fasfa-save mr-2"></i>Tambah Karyawan</a></p>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-info text-white">
                    <tr>
                      <th>No</th>
                      <th>ID Karyawan</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Telepon</th>
                      <th>Status</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot class="bg-info text-white">
                    <tr>
                    <th>No</th>
                      <th>ID Karyawan</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Telepon</th>
                      <th>Status</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                  include('koneksi.php');
                    $data = mysqli_query($koneksi,
                        "select * from karyawan");
                    $i =1;
                    while ($row=mysqli_fetch_array($data)) {
                 ?>
                 <tr>
                        <td><?= $i?></td>
                        <td><?= $row['id_karyawan']?></td>
                        <td><?= $row['nama_karyawan']?></td>
                        <td><?= $row['jk']?></td>
                        <td><?= $row['telp']?></td>
                        <td><?= $row['status']?></td>
                        <td><?= $row['email']?></td>
                        <td><?= $row['alamat']?></td>
                        <td><?= $row['foto']?></td>
                        <td>
                          <a href="karyawanController.php?aksi=hapus&id_karyawan=<?php echo $row['id_karyawan']?>" class="btn btn-danger pr-2 pl-2" onclick="return confirm('Anda yakin ingin menghapus')"><i class="fas fa-trash mr-2"></i>Hapus</a>
                          <a href="?p=karyawan&page=update&id=<?php echo $row['id_karyawan']?>" class="btn btn-primary ml-2 pr-2 pl-2"><i class="far fa-edit mr-2"></i>Edit</a>
                          <a href="" class="btn btn-success">Detail</a>
                        </td>
                      </tr>
                      <?php $i++;}?>
                  </tbody>
                </table>
                <?php
                    break;
                    case 'entri':
                    include('koneksi.php');
                    $data = mysqli_query($koneksi,"select * from karyawan");
                    ?>
                    <h2>Input Data Karyawan</h2>
                    <form class="form-group mt-5" method="post" action="karyawanController.php?aksi=tambah">
                    <div class="row mt-2">
                        <div class="col-md-2">
                          ID Karyawan
                        </div>
                        <div class="col-md-5">
                          <input type="text" name="txtNama" class="form-control">
                        </div>
                      </div>
                    
                      <div class="row mt-2">
                        <div class="col-md-2">
                          Nama Karyawan
                        </div>
                        <div class="col-md-5">
                          <input type="textArea" name="txtKeterangan" class="form-control">
                        </div>
                      </div>
                            
                      <div class="row mt-2">
                        <div class="col-md-2">
                          Jenis Kelamin
                        </div>
                        <div class="col-md-5">
                        <select name="cmbJk" class="form-control">
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                          </select>
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-md-2">
                          Telepon
                        </div>
                        <div class="col-md-5">
                          <input type="textArea" name="txtTelepon" class="form-control">
                        </div>
                      </div>
                      
                      <div class="row mt-2">
                        <div class="col-md-2">
                          Status
                        </div>
                        <div class="col-md-5">
                          <input type="textArea" name="txtStatus" class="form-control">
                        </div>
                      </div>


                      <div class="row mt-2">
                        <div class="col-md-2">
                          Email
                        </div>
                        <div class="col-md-5">
                          <input type="textArea" name="txtEmail" class="form-control">
                        </div>
                      </div>

                      <div class="row mt-2">
                        <div class="col-md-2">
                          Alamat
                        </div>
                        <div class="col-md-5">
                          <input type="textArea" name="txtAlamat" class="form-control">
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
                    case 'update':
                    include('koneksi.php');
                    $ambil = mysqli_query($koneksi,"select * from karyawan where id_karyawan='$_GET[id]'");
                    $data = mysqli_fetch_array($ambil);
                    ?>
                    <h2>Update Data Karyawan</h2>
                    <form class="form-group mt-5" method="post" action="karyawanController.php?aksi=ubah&id=<?php echo $data['id_karyawan']?>">
                      
                    <div class="row mt-2">
                        <div class="col-md-2">
                          ID Karyawan
                        </div>
                        <div class="col-md-5">
                          <input type="text" name="txtNama" class="form-control" value="<?=$data['id_karyawan']?>">
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-md-2">
                          Nama Karyawan
                        </div>
                        <div class="col-md-5">
                          <input type="textArea" name="txtKeterangan" class="form-control" value="<?=$data['nama_karyawan']?>">
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-md-2">
                          Jenis Kelamin
                        </div>
                        <div class="col-md-5">
                        <select name="cmbKaryawan" class="form-control">
                            <?php
                                $datakaryawan = mysqli_query($koneksi,'select * from karyawan');
                                while($row=mysqli_fetch_array($datakaryawan)){
                            ?>
                            <option value='<?php  echo "$row[nama_karyawan]" ?>' <?php  if($row['id_karyawan']== $data['id_karyawan']) echo "selected='selected'"?> ><?php  echo "$row[nama_karyawan]"?></option>
                            <?php
                              }
                            ?>

                          </select>
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-md-2">
                          Telepon
                        </div>
                        <div class="col-md-5">
                          <input type="textArea" name="txtKeterangan" class="form-control" value="<?=$data['telp']?>">
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-md-2">
                          Status
                        </div>
                        <div class="col-md-5">
                          <input type="textArea" name="txtKeterangan" class="form-control" value="<?=$data['status']?>">
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-md-2">
                          Email
                        </div>
                        <div class="col-md-5">
                          <input type="textArea" name="txtKeterangan" class="form-control" value="<?=$data['email']?>">
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-md-2">
                          Alamat
                        </div>
                        <div class="col-md-5">
                          <input type="textArea" name="txtKeterangan" class="form-control" value="<?=$data['alamat']?>">
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

