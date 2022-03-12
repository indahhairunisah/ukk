<?php
include "../../model/koneksi.php";

session_start();

if(!$_SESSION) {
    header("location: /hotelindahhai/view/login.php");
}

$list_kamar = $koneksi->query("SELECT * FROM kamar");
$list_fasilitas_kamar = $koneksi->query("SELECT * FROM fasilitas_kamar");

// Digunakan Ketika Update
$id = $_GET && $_GET['id'] ? $_GET['id'] : 0;
$dataById = [];
if($id) {
    $sql = "SELECT * FROM detail_kamar WHERE id='$id'";
    $result = $koneksi->query($sql);
    $dataById = $result->fetch_assoc();
}
// Tutup Update

$alert = false;

if (isset($_POST['simpan'])) {
    $id_kamar = $_POST['tipe_kamar'];
    $id_fasilitas_kamar = $_POST['fasilitas_kamar'];

    if($id) {
        $sql = "UPDATE detail_kamar SET id_kamar='$id_kamar', id_fasilitas_kamar='$id_fasilitas_kamar' WHERE id='$id'";
    }else {
        $sql = "INSERT INTO `detail_kamar` (`id_kamar`, `id_fasilitas_kamar`) VALUES ('$id_kamar', '$id_fasilitas_kamar')";
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
                    <h2>INPUT Detail Fasilitas Kamar</h2>

                    <?php if ($alert) : ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            Data Detail Fasilitas Kamar Berhasil <?= $id ? 'diubah' : 'ditambahkan' ?> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif;  ?>

                    <!-- Dropdown Select Option, untuk pilih kamar dan fasilitas kamar untuk di tambahkan ke tabel detail_kamar -->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                            <select class="form-select" name="tipe_kamar" aria-label="Default select example">
                                <option selected>Pilih Tipe Kamar</option>
                                <?php while($kamar = mysqli_fetch_assoc($list_kamar)) : ?>
                                    <option value="<?= $kamar['id_kamar'] ?>"><?= $kamar['tipe_kamar'] ?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tipe_kamar" class="form-label">Fasilitas Kamar</label>
                            <select class="form-select" name="fasilitas_kamar" aria-label="Default select example">
                                <option selected>Pilih Fasilitas Kamar</option>
                                <?php while($fasilitas_kamar = mysqli_fetch_assoc($list_fasilitas_kamar)) : ?>
                                    <option value="<?= $fasilitas_kamar['id_fasilitas_kamar'] ?>"><?= $fasilitas_kamar['fasilitas_kamar'] ?></option>
                                <?php endwhile; ?>

                            </select>
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