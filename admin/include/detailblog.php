<?php
include('../koneksi/koneksi.php');
$id_blog = $_GET['data'];
$level = $_SESSION['level'];
//get profil
$sql = "SELECT * FROM blog
          INNER JOIN kategori_blog ON blog.id_kategori_blog = kategori_blog.id_kategori_blog
          INNER JOIN user ON blog.id_user= user.id_user WHERE id_blog = $id_blog";
 //echo $sql;
$query = mysqli_query($koneksi, $sql);
while($data = mysqli_fetch_array($query)){


?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3><i class="fas fa-user-tie"></i> Detail Data Blog</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="index.php?include=blog">Data Blog</a></li>
              <li class="breadcrumb-item active">Detail Data Blog</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
            <div class="card">
              <div class="card-header">
                <div class="card-tools">
                  <a href="index.php?include=blog" class="btn btn-sm btn-warning float-right">
                  <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                      <tr>
                        <?php $originalDate = $data['tanggal'];?>
                        <td width="20%"><strong>Tanggal<strong></td>
                        <td width="80%"><?= $newDate = date("d-m-Y", strtotime($originalDate));?></td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Kategori Blog<strong></td>
                        <td width="80%"><?= $data['kategori_blog'] ?></td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Judul<strong></td>
                        <td width="80%"><?= $data['judul'] ?></td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Penulis<strong></td>
                        <td width="80%"><?= $data['nama'] ?></td>
                      </tr>
                      <tr>
                        <td width="20%"><strong>Isi<strong></td>
                        <td width="80%"><?= $data['isi'] ?></td>
                      </tr>
                    </tbody>
                  </table>
              </div>
              <?php } ?>
              <!-- /.card-body -->
              <div class="card-footer clearfix">&nbsp;</div>
            </div>
            <!-- /.card -->

    </section>
