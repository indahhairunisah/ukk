<?php
include '../view/koneksi.php'
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Hello, world!</title>
</head>

<body">

  <div class="container mt-1">
    <div class="border p-2">
      <div class="container">
        <div class="row">
          <div class="row d-flex flex-row-reverse bd-highlight">
            <form action="table" method="get" class="mb-2">
              <label>Cari :</label>
              <input type="text" name="cari">
              <input type="submit" value="Cari">
            </form>

            <?php
            if (isset($_GET['cari'])) {
              $cari = $_GET['cari'];
              echo "<b>Hasil pencarian : " . $cari . "</b>";
            }
            ?>
            <?php
            include 'tambah-data.php'
            ?>
          </div>
        </div>
      </div>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Id kamar</th>
            <th>Tipe kamar</th>
            <th>Ukuran kamar</th>
            <th>Image kamar</th>
            <th>Jumlah kamar</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $query_kamar = mysqli_query($koneksi, "SELECT * FROM kamar");
          while ($data_kamar = mysqli_fetch_object($query_kamar)) {
          ?>
            <tr>
              <th><?= $no++;  ?></th>
              <td><?= $data_kamar->id_kamar;  ?></td>
              <td><?= $data_kamar->tipe_kamar;  ?></td>
              <td><?= $data_kamar->ukuran_kamar;  ?></td>
              <td><img src="../img/"></td>
              <td><?= $data_kamar->jumlah_kamar;  ?></td>
              <td>
                <div class="btn-group" role="group">
                  <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    Pilih aksi
                  </button>
                  <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <li><a class="dropdown-item" href="detail.php">Detail</a></li>
                    <li><a class="dropdown-item" href="edit.php">Edit</a></li>
                    <li><a class="dropdown-item" href="hapus.php?id=<?= $data_kamar->id_kamar ?>">Hapus</a></li>
                  </ul>
                </div>
              </td>
            </tr>

          <?php
          }
          ?>

        </tbody>

      </table>
    </div>
  </div>
  <script src="../assets/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>

</html>