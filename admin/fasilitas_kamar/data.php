<?php
    include "../../model/koneksi.php";
    session_start();

    if(!$_SESSION) {
        header("location: /hotelindahhai/view/login.php");
    }
    $sql = "SELECT * FROM fasilitas_kamar, kamar";
    
    $result = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<?php
    include "../layout/header.php";
?>

<body>
    

<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <!-- <img class="animation__shake" src="../assets/img/admin.png" alt="AdminLTELogo" height="60" width="60"> -->
  </div>

  <?php include "../layout/navbar2.php";
//   include "layout/aside.php" ?>
  <div class="content-wrapper  p-4 ">
    <div class="content-header">
      <div dir="rtl" class="p-2">
        <a href="tambah_fasilitas3.php">
          <button type="button" class="btn btn-primary btn-sm">
            Tambah Fasilitas
          </button>
        </a>
      </div>
      <div class="row">
      <div class="col-2">
                <div class="list-group">
                    <a href="../dashboard/dashboard.php" class="list-group-item list-group-action" aria-current="true">
                          Dashboard
                      </a>

                      <?php if($_SESSION && $_SESSION['level'] == 'admin') : ?>
                          <a href="../kamar/data.php" class="list-group-item list-group-item-action">Data Kamar</a>
                          <a href="../fasilitas_kamar/data.php" class="list-group-item list-group-item-action active">Data Fasilitas Kamar</a>
                          <a href="../fasilitas_hotel/data.php" class="list-group-item list-group-item-action">Data Fasilitas Hotel</a>
                          <a href="../user/data.php" class="list-group-item list-group-item-action">Data User</a>
                      <?php endif; ?>

                      <?php if($_SESSION &&  $_SESSION['level'] == 'admin' || $_SESSION['level'] == 'resepsionis') : ?>
                          <a href="../pesanan/data.php" class="list-group-item list-group-item-action">Data Pesanan</a>
                      <?php endif; ?>
                </div>
            </div>

        <div class="col-6">
          <div class="card">
            <div class="card-body">
              <table style="width: 100%;" class="table table-bordered table-striped">
                <tr>
                  <th>No</th>
                  <th>Tipe</th>
                  <th>Nama Fasilitas</th>
                </tr>

                
                <?php
                $no = 1;
                $dataJoin = mysqli_query($koneksi, "SELECT
                                                      *, detail_kamar.id as  id_detail_kamar
                                                      FROM detail_kamar
                                                      JOIN fasilitas_kamar
                                                      ON detail_kamar.id_fasilitas_kamar = fasilitas_kamar.id_fasilitas_kamar
                                                      JOIN kamar
                                                      ON detail_kamar.id_kamar = kamar.id_kamar
                                                      GROUP BY detail_kamar.id");

                $rows = array();
                while($row = mysqli_fetch_array($dataJoin)) {
                    $rows[] = $row;
                }

                $kamar = mysqli_query($koneksi, "SELECT * FROM kamar");
                while ($kamarItem = mysqli_fetch_array($kamar)) : ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $kamarItem['tipe_kamar'] ?></td>
                    <td>
                        <?php foreach($rows as $row): ?>
                          <?php if($row['id_kamar'] == $kamarItem['id_kamar']) : ?>
                          <p class="d-flex align-items-center my-1"><?= $row['id_fasilitas_kamar'] . ' and ' . $row['fasilitas_kamar']; ?>
                              <span class="ms-auto">
                                <a class='btn btn-danger btn-xs' href="/hotelindahhai/admin/delete_fasilitas_kamar.php?id=<?= $row['id_detail_kamar'] ?>" onclick="
                                 confirm('Want to delete?');
                                ">-</a>
                              </span>  
                            <?php endif; ?>
                         <?php endforeach; ?>
                    </td>
                  </tr>
                <?php endwhile; ?>

              </table>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="card">
            <div class="card-body">
              <h3>Fasilitas Yang Tersedia</h3>
              <ul>
                <?php $query = mysqli_query($koneksi, "SELECT * FROM fasilitas_kamar");
                while ($data = mysqli_fetch_array($query)) { ?>

                  <li>
                    <p class="d-flex align-items-center my-1"><?= $data['fasilitas_kamar'] ?>
                      <span class="ms-auto">
                        <a class='btn btn-warning btn-xs' title='Edit Data' href="edit_fasilitas4.php?id=<?= $data['id_fasilitas'] ?>">
                          <svg width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                          </svg>
                        </a>
                        <a class='btn btn-danger btn-xs' onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??'))
                        {location.href='controller/hapusfasilitas.php?id=<?= $data['id_fasilitas']; ?>' }">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                          </svg>
                        </a>
                      </span>
                    </p>
                  </li>
                <?php } ?>

              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
              <div class="modal-body">

                <div class="form-group">
                  <label>Tipe</label>
                  <select class="form-control" name="tipe" required>
                    <option value="">Pilih Tipe</option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT tipe from kamar");
                    while ($tipe = mysqli_fetch_array($tampil)) { ?>
                      <option value='<?= $tipe['tipe'] ?>'><?= $tipe['tipe'] ?></option>";
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Fasilitas</label>
                  <select class="form-control" name="fasilitas" required>
                    <option value="">Pilih Fasilitas</option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT fasilitas from fasilitas");
                    while ($fasilitas = mysqli_fetch_array($tampil)) { ?>
                      <option value='<?= $fasilitas['fasilitas'] ?>'><?= $fasilitas['fasilitas'] ?></option>";
                    <?php } ?>
                  </select>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- ./wrapper -->


    <?php
    include "../layout/footer.php";
    ?>
</body>



