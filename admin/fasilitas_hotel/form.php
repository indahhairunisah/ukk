<?php
include "../../model/koneksi.php";


$id = $_GET && $_GET['id_fasilitas_hotel'] ? $_GET['id_fasilitas_hotel'] : 0;
$dataById = [];
if($id) {
    $sql = "SELECT id_fasilitas_hotel, fasilitas_hotel, image_fasilitas_hotel FROM fasilitas_hotel WHERE id_fasilitas_hotel='$id'";
    $result = $koneksi->query($sql);
    $dataById = $result->fetch_assoc();
}

$alert = false;

if (isset($_POST['simpan'])) {
    $id_fasilitas_hotel = $_POST['id_fasilitas_hotel'];
    $image_fasilitas_hotel = $_FILES['foto_fasilitas_hotel']['name'];
    $fasilitas_hotel = $_POST['fasilitas_hotel'];

    $destination_path = getcwd().DIRECTORY_SEPARATOR . 'image/';

    $target_path = $destination_path . basename( $_FILES["foto_fasilitas_hotel"]["name"]);
    @move_uploaded_file($_FILES['foto_fasilitas_hotel']['tmp_name'], $target_path);

    if($id) {
        $sql = "UPDATE fasilitas_hotel SET id_fasilitas_hotel='$id_fasilitas_hotel', fasilitas_hotel='$fasilitas_hotel', foto_fasilitas_hotel='$image_fasilitas_hotel' WHERE id_fasilitas_hotel=$id_fasilitas_hotel";
    }else {
        $sql = "INSERT INTO fasilitas_hotel (id_fasilitas_hotel,fasilitas_hotel, foto_fasilitas_hotel)
        VALUES ('$id_fasilitas_hotel', '$fasilitas_hotel', '$image_fasilitas_hotel')";
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
include "../admin/layout/header.php";
?>

<body>
    <?php
    include "../admin/layout/navbar2.php";
    ?>

    <div class="container-fluid bg-light text-dark p-4 mt-4">
        <div class="row">
            <div class="col-2">
                <div class="list-group">
                    <a href="indexx.php" class="list-group-item list-group-action" aria-current="true">
                        Dashboard
                    </a>
                    <a href="../admin/data_kamar.php" class="list-group-item list-group-item-action">Data Kamar</a>
                    <a href="../admin/data_kamar.php" class="list-group-item list-group-item-action">Data Fasilitas Kamar</a>
                    <a href="../admin/data_kamar.php" class="list-group-item list-group-item-action active">Data Fasilitas Hotel</a>
                    <a href="../admin/data_kamar.php" class="list-group-item list-group-item-action">Data Pesanan</a>
                    <a href="../admin/data_kamar.php" class="list-group-item list-group-item-action">Data User</a>
                </div>
            </div>
            <div class="col-10">
                <nav aria-label="breacrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Admin</a></li>
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
                                <label for="exampleFormControlInput1" class="form-label">No Kamar</label>
                                <input type="text" required name="id_fasilitas_kamar" value="<?= $dataById && $dataById['id_fasilitas_kamar'] ? $dataById['id_fasilitas_kamar'] : '' ?>" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tipe Kamar</label>
                                <input type="text" required value="<?= $dataById && $dataById['tipe_kamar'] ? $dataById['tipe_kamar'] : '' ?>" name="tipe_kamar" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Fasilitas Kamar</label>
                                <input type="text" required value="<?= $dataById && $dataById['nama_fasilitas_kamar'] ? $dataById['nama_fasilitas_kamar'] : '' ?>" name="nama_fasilitas_kamar" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Foto Fasilitas Kamar</label>
                                <input type="file" name="foto_fasilitas_kamar" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Ukuran Fasilitas Kamar</label>
                                <input type="text" required value="<?= $dataById && $dataById['ukuran_fh'] ? $dataById['ukuran_fh'] : '' ?>" name="ukuran_fh" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3 d-flex justify-content-between">
                                <a href="/hotelindahhai/admin/data_fasilitas_kamar.php" class="btn btn-outline-primary">Kembali</a>
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
    include "layout/footer.php";

    ?>

</body>

</html>