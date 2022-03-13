<?php
include "../../model/koneksi.php";
session_start();

if(!$_SESSION) {
    header("location: /hotelindahhai/view/login.php");
}
$sql = "SELECT * FROM kamar";
$result = $koneksi->query($sql);

$no = 1;
if (isset($_POST['search'])) {
  $cari = $_POST['search_input'];
  $result = mysqli_query($koneksi, "SELECT * from kamar where tipe_kamar like '%$cari%'");
} else {
  $result = mysqli_query($koneksi, "SELECT * FROM kamar");
}

?>

<!DOCTYPE html>
<html lang="en">

<?php
include "../layout/header.php";
?>

<body>
    <?php
    include "../layout/navbar2.php";
    ?>

    <div class="container-fluid bg-light text-dark p-4">
        <div class="row">
            <div class="col-2">
                <div class="list-group">
                    <a href="../dashboard/dashboard.php" class="list-group-item list-group-action" aria-current="true">
                          Dashboard
                      </a>

                      <?php if($_SESSION && $_SESSION['level'] == 'admin') : ?>
                          <a href="../kamar/data.php" class="list-group-item list-group-item-action active">Data Kamar</a>
                          <a href="../fasilitas_kamar/data.php" class="list-group-item list-group-item-action">Data Fasilitas Kamar</a>
                          <a href="../fasilitas_hotel/data.php" class="list-group-item list-group-item-action">Data Fasilitas Hotel</a>
                          <a href="../user/data.php" class="list-group-item list-group-item-action">Data User</a>
                      <?php endif; ?>

                      <?php if($_SESSION &&  $_SESSION['level'] == 'admin' || $_SESSION['level'] == 'resepsionis') : ?>
                          <a href="../pesanan/data.php" class="list-group-item list-group-item-action">Data Pesanan</a>
                      <?php endif; ?>
                </div>
            </div>
            <div class="col-10">
                <nav aria-label="breacrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../dashboard/dashboard.php"><?= $_SESSION["level"] ?></a></li> 
                        <li class="breadcrumb-item active" aria-current="page">Data Kamar</a></li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Data Kamar</h4>

                            <!-- ini search by name -->
                            <form action="" method="POST" >
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search_input" placeholder="Search by Tipe kamar" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-secondary" name="search" type="submit" id="button-addon2">Search</button>
                                </div>
                            </form>


                

                            <a href="/hotelindahhai/admin/kamar/form.php" class="btn btn-primary">Tambah Data Kamar</a>
                        </div>
                        <hr>
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Foto Kamar</th>
                                    <th scope="col">Tipe Kamar</th>
                                    <th scope="col">Jumlah Kamar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($result->num_rows > 0) {  ?>
                                    <?php while($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td scope="row" class="text-center">
                                            <img src="/hotelindahhai/assets/admin/image/<?= $row['image_kamar'] ?>" width="120px" alt="">
                                        </td>
                                        <td scope="row"><?= $row['tipe_kamar'] ?></td>
                                        <td scope="row" class="text-center"><?= $row['jumlah_kamar'] ?></td>
                                        <td class="text-center">
                                            <a href="/hotelindahhai/admin/kamar/form.php?id=<?= $row['id'] ?>" class="btn btn-warning">Ubah</a>
                                            <a href="/hotelindahhai/admin/kamar/delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ??')" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                <?php }; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include "../layout/footer.php";
    
    ?>

</body>

</html>