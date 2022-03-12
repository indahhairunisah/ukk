<?php
include "../../model/koneksi.php";


$id = $_GET && $_GET['id'] ? $_GET['id'] : 0;
$dataById = [];
if($id) {
    $sql = "SELECT id, tipe_kamar, jumlah_kamar, id_kamar FROM kamar WHERE id='$id'";
    $result = $koneksi->query($sql);
    $dataById = $result->fetch_assoc();
}

$alert = false;

if (isset($_POST['simpan'])) {
    $id_kamar = $_POST['id_kamar'];
    $tipe_kamar = $_POST['tipe_kamar'];
    $jumlah_kamar = $_POST['jumlah_kamar'];
  
    $image_kamar = $_FILES['foto_kamar']['name'];

    $destination_path = getcwd().DIRECTORY_SEPARATOR . 'image/';

    $target_path = $destination_path . basename( $_FILES["foto_kamar"]["name"]);
    @move_uploaded_file($_FILES['foto_kamar']['tmp_name'], $target_path);

    if($id) {
        $sql = "UPDATE kamar SET id_kamar='$id_kamar', tipe_kamar='$tipe_kamar', jumlah_kamar='$jumlah_kamar', image_kamar='$image_kamar' WHERE id=$id";
    }else {
        $sql = "INSERT INTO kamar (id_kamar,tipe_kamar, jumlah_kamar, image_kamar)
        VALUES ('$id_kamar', '$tipe_kamar', '$jumlah_kamar', '$image_kamar')";
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
                    <a href="indexx.php" class="list-group-item list-group-action" aria-current="true">
                        Dashboard
                    </a>
                    <a href="../admin/data_kamar.php" class="list-group-item list-group-item-action">Data Kamar</a>
                    <a href="../admin/data_fasilitas_kamar.php" class="list-group-item list-group-item-action">Data Fasilitas Kamar</a>
                    <a href="../admin/data_fasilitas_hotel.php" class="list-group-item list-group-item-action">Data Fasilitas Hotel</a>
                    <a href="../admin/data_pesanan.php" class="list-group-item list-group-item-action active ">Data Pesanan</a>
                    <a href="../admin/data_user.php" class="list-group-item list-group-item-action">Data User</a>
                </div>
            </div>
            <div class="col-10">
                <nav aria-label="breacrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="indexx.php">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $id ? 'Edit' : 'Tambah' ?> Data Kamar</a></li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <h2>INPUT DATA KAMAR</h2>

                        <?php if ($alert) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Data pesanan Berhasil <?= $id ? 'diubah' : 'ditambahkan' ?> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif;  ?>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Tamu</label>
                                <input type="text" required name="nama_tamu" value="<?= $dataById && $dataById['nama_tamu'] ? $dataById['nama_tamu'] : '' ?>" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Check In</label>
                                <input type="text" required value="<?= $dataById && $dataById['tanggal_check_in'] ? $dataById['tanggal_check_in'] : '' ?>" name="tanggal_check_in" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Check Out</label>
                                <input type="text" required value="<?= $dataById && $dataById['tanggal_check_out'] ? $dataById['tanggal_check_out'] : '' ?>" name="tanggal_check_out" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3 d-flex justify-content-between">
                                <a href="/hotelindahhai/admin/data_pemesanan.php" class="btn btn-outline-primary">Kembali</a>
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