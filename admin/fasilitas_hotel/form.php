<?php
include "../../model/koneksi.php";
session_start();

$id = $_GET && $_GET['id'] ? $_GET['id'] : 0;
$dataById = [];
if($id) {
    $sql = "SELECT * FROM fasilitas_hotel WHERE id_fasilitas_hotel='$id'";
    $result = $koneksi->query($sql);
    $dataById = $result->fetch_assoc();
}

$alert = false;

if (isset($_POST['simpan'])) {
    $id_fasilitas_hotel = $_POST['id_fasilitas_hotel'];
    $image_fasilitas_hotel = $_FILES['foto_fasilitas_hotel']['name'];
    $fasilitas_hotel = $_POST['fasilitas_hotel'];
    $ukuran_fh = $_POST['ukuran_fh'];

    $destination_path = '../../assets/admin/image/';

    $target_path = $destination_path . basename( $_FILES["foto_fasilitas_hotel"]["name"]);
    @move_uploaded_file($_FILES['foto_fasilitas_hotel']['tmp_name'], $target_path);

    if($id) {
        $sql = "UPDATE fasilitas_hotel SET id_fasilitas_hotel='$id_fasilitas_hotel', ukuran_fh='$ukuran_fh', fasilitas_hotel='$fasilitas_hotel', image_fasilitas_hotel='$image_fasilitas_hotel' WHERE id_fasilitas_hotel='$id_fasilitas_hotel'";
    }else {
        $sql = "INSERT INTO fasilitas_hotel (id_fasilitas_hotel,fasilitas_hotel, image_fasilitas_hotel, ukuran_fh)
        VALUES ('$id_fasilitas_hotel', '$fasilitas_hotel', '$image_fasilitas_hotel', '$ukuran_fh')";
    }
    
    if ($koneksi->query($sql) === TRUE) {
        $alert = true;
    } else {
        $alert = false;
    }
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

    <div class="container-fluid bg-light text-dark p-4 mt-4">
        <div class="row">
            <div class="col-2">
                <div class="list-group">
                    <a href="../dashboard/dashboard.php" class="list-group-item list-group-action" aria-current="true">
                        Dashboard
                    </a>

                    <?php if($_SESSION && $_SESSION['level'] == 'admin') : ?>
                        <a href="../kamar/data.php" class="list-group-item list-group-item-action">Data Kamar</a>
                        <a href="../fasilitas_kamar/data.php" class="list-group-item list-group-item-action">Data Fasilitas Kamar</a>
                        <a href="../fasilitas_hotel/data.php" class="list-group-item list-group-item-action active">Data Fasilitas Hotel</a>
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
                        <li class="breadcrumb-item"><a href="../dashboard/dashboard.php">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $id ? 'Edit' : 'Tambah' ?> Fasilitas Hotel</a></li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <h2>INPUT FASILITAS HOTEL</h2>

                        <?php if ($alert) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Data Fasilitas Hotel Berhasil <?= $id ? 'diubah' : 'ditambahkan' ?> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif;  ?>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Id Fasilitas Hotel</label>
                                <input type="text" required name="id_fasilitas_hotel" value="<?= $dataById && $dataById['id_fasilitas_hotel'] ? $dataById['id_fasilitas_hotel'] : '' ?>" class="form-control" id="exampleFormControlInput1" placeholder="FH01">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Fasilitas hotel</label>
                                <input type="text" required value="<?= $dataById && $dataById['fasilitas_hotel'] ? $dataById['fasilitas_hotel'] : '' ?>" name="fasilitas_hotel" class="form-control" id="exampleFormControlInput1" placeholder="SwimmingPool Indoor">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Foto Fasilitas hotel</label>
                                <input type="file" name="foto_fasilitas_hotel" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Ukuran Fasilitas Hotel</label>
                                <input type="text" name="ukuran_fh"  required value="<?= $dataById && $dataById['ukuran_fh'] ? $dataById['ukuran_fh'] : '' ?>"  class="form-control" id="exampleFormControlInput1" placeholder="100 m2">
                            </div>
                            <div class="mb-3 d-flex justify-content-between text-center">
                                <a href="/hotelindahhai/admin/fasilitas_hotel/data.php" class="btn btn-outline-primary">Kembali</a>
                                <button class="btn btn-info" name="simpan" type="submit">
                                    Simpan
                                </button>
                            </div>

                        </form>
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