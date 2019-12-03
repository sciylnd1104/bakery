<div class="card shadow mb-4">
            <div class="card-header py-3"> 
              <h6 class="m-0 font-weight-bold text-info">Kategori</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <?php
                $page=isset($_GET['page'])?$_GET['page']:'list';
                switch ($page) {
                case 'list':
            ?>
            <p><a href="?p=kategori&page=entri" class="btn btn-info"><i class="fasfa-save mr-2"></i>Tambah Kategori</a></p>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-info text-white">
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot class="bg-info text-white">
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Keterangan</th>
                      <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                  include('koneksi.php');
                    $data = mysqli_query($koneksi,
                        "select * from kategori");
                    $i =1;
                    while ($row=mysqli_fetch_array($data)) {
                 ?>
                 <tr>
                        <td><?= $i?></td>
                        <td><?= $row['nama_kategori']?></td>
                        <td><?= $row['keterangan']?></td>
                        <td>
                          <a href="kategoriController.php?aksi=hapus&id_kategori=<?php echo $row['id_kategori']?>" class="btn btn-danger pr-2 pl-2" onclick="return confirm('Anda yakin ingin menghapus')"><i class="fas fa-trash mr-2"></i>Hapus</a>
                          <a href="?p=kategori&page=update&id=<?php echo $row['id_kategori']?>" class="btn btn-primary ml-2 pr-2 pl-2"><i class="far fa-edit mr-2"></i>Edit</a>
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
                    $data = mysqli_query($koneksi,"select * from kategori");
                    ?>
                    <h2>Input Data Kategori</h2>
                    <form class="form-group mt-5" method="post" action="kategoriController.php?aksi=tambah">
                    <div class="row mt-2">
                        <div class="col-md-2">
                          Nama Kategori
                        </div>
                        <div class="col-md-5">
                          <input type="text" name="txtNama" class="form-control">
                        </div>
                      </div>
                    
                      <div class="row mt-2">
                        <div class="col-md-2">
                          Keterangan
                        </div>
                        <div class="col-md-5">
                          <input type="textArea" name="txtKeterangan" class="form-control">
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
                    $ambil = mysqli_query($koneksi,"select * from kategori where id_kategori='$_GET[id]'");
                    $data = mysqli_fetch_array($ambil);
                    ?>
                    <h2>Update Data Kategori</h2>
                    <form class="form-group mt-5" method="post" action="kategoriController.php?aksi=ubah&id=<?php echo $data['id_kategori']?>">
                      
                    <div class="row mt-2">
                        <div class="col-md-2">
                          Nama Kategori
                        </div>
                        <div class="col-md-5">
                          <input type="text" name="txtNama" class="form-control" value="<?=$data['nama_kategori']?>">
                        </div>
                      </div>
                      <div class="row mt-2">
                        <div class="col-md-2">
                          Keterangan
                        </div>
                        <div class="col-md-5">
                          <input type="textArea" name="txtKeterangan" class="form-control" value="<?=$data['keterangan']?>">
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

