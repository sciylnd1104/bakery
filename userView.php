<div class="card shadow mb-4">
            <div class="card-header py-3"> 
              <h6 class="m-0 font-weight-bold text-info">User</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <?php
              $page=isset($_GET['page'])?$_GET['page']:'list';
              switch ($page) {
              case 'list':
          ?>
            <p><a href="?p=user&page=entri" class="btn btn-info"><i class="fasfa-save mr-2"></i>Tambah User</a></p>
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-info text-white">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Email</th>
                        <th>NoTelp</th>
                        <th>Photo</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tfoot class="bg-info text-white">
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Level</th>
                        <th>Email</th>
                        <th>NoTelp</th>
                        <th>Photo</th>
                        <th>Aksi</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php
                  include('koneksi.php');
                  $data = mysqli_query($koneksi,"select * from user");
                  $i =1;
                  while ($row=mysqli_fetch_array($data)) {
                 ?>
                 <tr>
                        <td><?php echo $i?></td>
                                <td><?php echo $row['username']?></td>
                                <td><?php echo $row['level']?></td>
                                <td><?=$row['email']?></td>
                                <td><?=$row['notelp']?></td>
                                <td><img src="gambar/<?=$row['foto']?>" width="70px" height="70px"></td>
                                <td>
                                <a href="userController.php?aksi=hapus&username=<?php echo $row['username']?>" class="btn btn-danger pr-2 pl-2" onclick="return confirm('Anda yakin ingin menghapus')"><i class="fas fa-trash mr-2"></i>Hapus</a>
                                <a href="?p=user&page=update&username=<?php echo $row['username']?>" class="btn btn-primary ml-2 pr-2 pl-2"><i class="far fa-edit mr-2"></i>Edit</a>
                                <a href="" class="btn btn-success">Detail</a>
                                </td>
                            </tr>
                            <?php $i++;}?>
                  </tbody>
                </table>
                <?php
                  break;
                  case 'entri':
                  ?>
                  <h2>Input Data User</h2>
                  <form class="form-group mt-5" method="post" action="userController.php?aksi=tambah" enctype="multipart/form-data">
                    <div class="row mt-2">
                      <div class="col-md-2">
                        Username
                      </div>
                      <div class="col-md-5">
                        <input type="text" name="txtUserName" class="form-control">
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-2">
                        Password
                      </div>
                      <div class="col-md-5">
                        <input type="password" name="txtPassword" class="form-control">
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-2">
                        Level
                      </div>
                      <div class="col-md-5">
                        <select class="form-control" name="level">
                          <option value="Administrator">Administrator</option>
                          <option value="Anggota">Anggota</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-2">
                        Email
                      </div>
                      <div class="col-md-5">
                        <input type="email" name="txtEmail" class="form-control">
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-2">
                        No Telpon
                      </div>
                      <div class="col-md-5">
                        <input type="text" name="txtnotelp" class="form-control">
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
                  $ambil = mysqli_query($koneksi,"select * from user where username='$_GET[username]'");
                  $data = mysqli_fetch_array($ambil);
                  ?>
                  <h2>Update Data User</h2>
                  <form class="form-group mt-5" method="post" action="userController.php?aksi=ubah&username=<?php echo $data['username']?>" enctype="multipart/form-data">
                    <div class="row mt-2">
                      <div class="col-md-2">
                        Password
                      </div>
                      <div class="col-md-5">
                        <input type="password" name="txtPassword" class="form-control" value="<?=$data['password'] ?>">
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-2">
                        Level
                      </div>
                      <div class="col-md-5">
                        <select class="form-control" name="level">
                          <option value="Administrator">Administrator</option>
                          <option value="Anggota">Anggota</option>
                        </select>
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-2">
                        Email
                      </div>
                      <div class="col-md-5">
                        <input type="email" name="txtEmail" class="form-control" value="<?=$data['email'] ?>">
                      </div>
                    </div>
                    <div class="row mt-2">
                      <div class="col-md-2">
                        No Telpon
                      </div>
                      <div class="col-md-5">
                        <input type="text" name="txtnotelp" class="form-control" value="<?=$data['notelp'] ?>">
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

