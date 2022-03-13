<?php
include "../../model/koneksi.php";

session_start();

if(!$_SESSION) {
    header("location: /hotelindahhai/view/login.php");
}

// Digunakan Ketika Update
$id = $_GET && $_GET['id'] ? $_GET['id'] : 0;
$dataById = [];
if($id) {
    $sql = "SELECT * FROM fasilitas_kamar WHERE id_fasilitas_kamar='$id'";
    $result = $koneksi->query($sql);
    $dataById = $result->fetch_assoc();
}
// Tutup Update

$alert = false;

if (isset($_POST['simpan'])) {
    $id_fasilitas_kamar = $_POST['id_fasilitas_kamar'];
    $nama_fasilitas_kamar = $_POST['nama_fasilitas_kamar'];
  
    $image_fasilitas_kamar = $_FILES['foto_fasilitas_kamar']['name'];

    $destination_path = '../../assets/admin/image/';

    $target_path = $destination_path . basename( $_FILES["foto_fasilitas_kamar"]["name"]);
    @move_uploaded_file($_FILES['foto_fasilitas_kamar']['tmp_name'], $target_path);

    if($id) {
        $sql = "UPDATE fasilitas_kamar SET id_fasilitas_kamar='$id_fasilitas_kamar', fasilitas_kamar='$nama_fasilitas_kamar', image_fasilitas_kamar='$image_fasilitas_kamar' WHERE id_fasilitas_kamar='$id_fasilitas_kamar'";
    }else {
        $sql = "INSERT INTO `fasilitas_kamar` (`id_fasilitas_kamar`, `fasilitas_kamar`, `image_fasilitas_kamar`) VALUES ('$id_fasilitas_kamar', '$nama_fasilitas_kamar', '$image_fasilitas_kamar')";
    }

    if ($koneksi->query($sql) === TRUE) {
        $alert = true;
    } else {
        $alert = false;
    }
}


?>

<?php
include "../layout/header.php";
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
                        <a href="../fasilitas_kamar/data.php" class="list-group-item list-group-item-action active">Data Fasilitas Kamar</a>
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
                    <li class="breadcrumb-item"><a href="indexx.php">Admin</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $id ? 'Edit' : 'Tambah' ?> Fasilitas Kamar</a></li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">
                    <h2>INPUT FASILITAS KAMAR</h2>

                    <?php if ($alert) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Fasilitas Kamar Berhasil <?= $id ? 'diubah' : 'ditambahkan' ?> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif;  ?>

                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Id Fasilitas Kamar</label>
                            <input type="text" required name="id_fasilitas_kamar" value="<?= $dataById && $dataById['id_fasilitas_kamar'] ? $dataById['id_fasilitas_kamar'] : '' ?>" class="form-control" id="exampleFormControlInput1" placeholder="FK01">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama Fasilitas Kamar</label>
                            <input type="text" required value="<?= $dataById && $dataById['fasilitas_kamar'] ? $dataById['fasilitas_kamar'] : '' ?>" name="nama_fasilitas_kamar" class="form-control" id="exampleFormControlInput1" placeholder="Swimmingpool Indoor">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Foto Fasilitas Kamar</label>
                            <input type="file" name="foto_fasilitas_kamar" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            <a href="/hotelindahhai/admin/fasilitas_kamar/data.php" class="btn btn-outline-primary">Kembali</a>
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


<?php include "../layout/footer.php"; ?>