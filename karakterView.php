<div class="card shadow mb-4">
            <div class="card-header py-3"> 
              <h6 class="m-0 font-weight-bold text-info">Karakter</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <?php
                $page=isset($_GET['page'])?$_GET['page']:'list';
                switch ($page) {
                case 'list':
            ?>
            <p><a href="?p=karakter&page=entri" class="btn btn-info"><i class="fasfa-save mr-2"></i>Tambah Jenis Karakter</a></p>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-info text-white">
                    <tr>
                      <th>No</th>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot class="bg-info text-white">
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                  include('koneksi.php');
                    $data = mysqli_query($koneksi,
                        "select * from karakter");
                    $i =1;
                    while ($row=mysqli_fetch_array($data)) {
                 ?>
                 <tr>
                        <td><?= $i?></td>
                        <td><?= $row['id_karakter']?></td>
                        <td><?= $row['nama_karakter']?></td>
                        <td>
                          <a href="karakterController.php?aksi=hapus&id_karakter=<?php echo $row['id_karakter']?>" class="btn btn-danger pr-2 pl-2" onclick="return confirm('Anda yakin ingin menghapus')"><i class="fas fa-trash mr-2"></i>Hapus</a>
                          <a href="?p=karakter&page=update&id=<?php echo $row['id_karakter']?>" class="btn btn-primary ml-2 pr-2 pl-2"><i class="far fa-edit mr-2"></i>Edit</a>
                        </td>
                      </tr>
                      <?php $i++;}?>
                  </tbody>
                </table>
                <?php
                    break;
                    case 'entri':
                    include('koneksi.php');
                    $data = mysqli_query($koneksi,"select * from karakter");
                    ?>
                    <h2>Input Data Karakter</h2>
                    <form class="form-group mt-5" method="post" action="karakterController.php?aksi=tambah">
                    <div class="row mt-2">
                        <div class="col-md-2">
                          ID
                        </div>
                        <div class="col-md-5">
                          <input type="text" name="txtID" class="form-control">
                        </div>
                      </div>
                    <div class="row mt-2">
                        <div class="col-md-2">
                          Nama Karakter
                        </div>
                        <div class="col-md-5">
                          <input type="text" name="txtNama" class="form-control">
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
                    $ambil = mysqli_query($koneksi,"select * from karakter where id_karakter='$_GET[id]'");
                    $data = mysqli_fetch_array($ambil);
                    ?>
                    <h2>Update Data Karakter</h2>
                    <form class="form-group mt-5" method="post" action="karakterController.php?aksi=ubah&id=<?php echo $data['id_karakter']?>">
                    <div class="row mt-2">
                        <div class="col-md-2">
                          ID
                        </div>
                        <div class="col-md-5">
                          <input type="text" name="txtID" class="form-control" value="<?=$data['id_karakter']?>">
                        </div>
                      </div>
                    <div class="row mt-2">
                        <div class="col-md-2">
                          Nama Karakter
                        </div>
                        <div class="col-md-5">
                          <input type="text" name="txtNama" class="form-control" value="<?=$data['nama_karakter']?>">
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

