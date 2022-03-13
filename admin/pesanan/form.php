<?php
include "../../model/koneksi.php";
session_start();

$list_kamar = $koneksi->query("SELECT * FROM kamar");

$id = $_GET && $_GET['id'] ? $_GET['id'] : 0;
$dataById = [];
if($id) {
    $sql = "SELECT * FROM reservasi WHERE id_reservasi='$id'";
    $result = $koneksi->query($sql);
    $dataById = $result->fetch_assoc();
}

$alert = false;

if (isset($_POST['simpan'])) {
    $id_kamar = $_POST['id_kamar'];
    $nama_pemesan = $_POST['nama_pemesan'];
    $nama_tamu = $_POST['nama_tamu'];
    $email = $_POST['email'];
    $no_telepon = $_POST['no_telepon'];
    $tanggal_check_in = $_POST['tanggal_check_in'];
    $tanggal_check_out = $_POST['tanggal_check_out'];
    $jumlah_pesan = $_POST['jumlah_pesan'];
    $status = 1;

    if($id) {
        $sql = "UPDATE reservasi SET id_kamar='$id_kamar', nama_pemesan='$nama_pemesan', nama_tamu='$nama_tamu', email='$email', no_telepon='$no_telepon', tanggal_check_in='$tanggal_check_in', tanggal_check_out='$tanggal_check_out', jumlah_pesan='$jumlah_pesan', status='$status' WHERE id_reservasi='$id'";
    }else {
        $sql = "INSERT INTO reservasi (id_kamar, nama_pemesan, nama_tamu, email, no_telepon, tanggal_check_in, tanggal_check_out, jumlah_pesan, status)
        VALUES ('$id_kamar', '$nama_pemesan', '$nama_tamu', '$email', '$no_telepon', '$tanggal_check_in', '$tanggal_check_out', '$jumlah_pesan', '$status')";
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
                        <a href="../fasilitas_hotel/data.php" class="list-group-item list-group-item-action">Data Fasilitas Hotel</a>
                        <a href="../user/data.php" class="list-group-item list-group-item-action">Data User</a>
                    <?php endif; ?>

                    <?php if($_SESSION &&  $_SESSION['level'] == 'admin' || $_SESSION['level'] == 'resepsionis') : ?>
                        <a href="../pesanan/data.php" class="list-group-item list-group-item-action active">Data Pesanan</a>
                    <?php endif; ?> 
                </div>
            </div>
            <div class="col-10">
                <nav aria-label="breacrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php">Admin</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $id ? 'Edit' : 'Tambah' ?> Reservasi Hotel</a></li>
                    </ol>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <h2>INPUT Reservasi</h2>

                        <?php if ($alert) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Data User Berhasil <?= $id ? 'diubah' : 'ditambahkan' ?> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif;  ?>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                                <select class="form-select" name="id_kamar" aria-label="Default select example">
                                    <option selected>Pilih Tipe Kamar</option>
                                    <?php while($kamar = mysqli_fetch_assoc($list_kamar)) : ?>
                                        <option value="<?= $kamar['id_kamar'] ?>" <?= $dataById && $dataById['id_kamar'] == $kamar['id_kamar'] ? 'selected' : '' ?>><?= $kamar['tipe_kamar'] ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Pemesan</label>
                                <input type="text" required value="<?= $dataById && $dataById['nama_pemesan'] ? $dataById['nama_pemesan'] : '' ?>" name="nama_pemesan" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Nama Tamu</label>
                                <input type="text" required value="<?= $dataById && $dataById['nama_tamu'] ? $dataById['nama_tamu'] : '' ?>" name="nama_tamu" class="form-control" id="exampleFormControlInput1">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="text" required value="<?= $dataById && $dataById['email'] ? $dataById['email'] : '' ?>" name="email" class="form-control" id="exampleFormControlInput1">
                            </div>
                            
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">No Telepon</label>
                                <input type="text" required value="<?= $dataById && $dataById['no_telepon'] ? $dataById['no_telepon'] : '' ?>" name="no_telepon" class="form-control" id="exampleFormControlInput1">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Check in</label>
                                <input type="date" required value="<?= $dataById && $dataById['tanggal_check_in'] ? $dataById['tanggal_check_in'] : '' ?>" name="tanggal_check_in" class="form-control" id="exampleFormControlInput1">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Check out</label>
                                <input type="date" required value="<?= $dataById && $dataById['tanggal_check_out'] ? $dataById['tanggal_check_out'] : '' ?>" name="tanggal_check_out" class="form-control" id="exampleFormControlInput1">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Jumlah Pesanan</label>
                                <input type="text" required value="<?= $dataById && $dataById['jumlah_pesan'] ? $dataById['jumlah_pesan'] : '' ?>" name="jumlah_pesan" class="form-control" id="exampleFormControlInput1">
                            </div>
                            
                            <div class="mb-3 d-flex justify-content-between">
                                <a href="/hotelindahhai/admin/pesanan/data.php" class="btn btn-outline-primary">Kembali</a>
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