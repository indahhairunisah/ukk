<?php
include "../../model/koneksi.php";
session_start();

if(!$_SESSION) {
    header("location: /hotelindahhai/view/login.php");
}
$sql = "SELECT * FROM kamar";
$result = $koneksi->query($sql);

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

    <div class="container-fluid bg-light text-dark p-4 mt-4">
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
                        <li class="breadcrumb-item"><a href="../admin/dashboard.php"><?= $_SESSION["level"] ?></a></li> 
                        <li class="breadcrumb-item active" aria-current="page">Data Kamar</a></li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>Data Kamar</h4>
                            <a href="/hotelindahhai/admin/form_data_kamar.php" class="btn btn-primary">Tambah Data Kamar</a>
                        </div>
                        <hr>
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Tipe Kamar</th>
                                    <th scope="col">Jumlah Kamar</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php if ($result->num_rows > 0) {  ?>
                                    <?php while($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td scope="row"><?= $row['tipe_kamar'] ?></td>
                                        <td scope="row"><?= $row['jumlah_kamar'] ?></td>
                                        <td scope="row">
                                            <img src="/hotelindahhai/admin/image/<?= $row['image_kamar'] ?>" width="50px" alt="">
                                        </td>
                                        <td>
                                            <a href="/hotelindahhai/admin/form_data_kamar.php?id=<?= $row['id'] ?>" class="btn btn-warning">Ubah</a>
                                            <a href="/hotelindahhai/admin/delete_data_kamar.php?id=<?= $row['id'] ?>" class="btn btn-danger">Hapus</a>
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