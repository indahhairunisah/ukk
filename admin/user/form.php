<?php
include "../../model/koneksi.php";
session_start();

$id = $_GET && $_GET['id'] ? $_GET['id'] : 0;
$dataById = [];
if($id) {
    $sql = "SELECT * FROM user WHERE id_user='$id'";
    $result = $koneksi->query($sql);
    $dataById = $result->fetch_assoc();
}

$alert = false;

if (isset($_POST['simpan'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    if($id) {
        $sql = "UPDATE user SET username='$username', password='$password', level='$level' WHERE id_user='$id'";
    }else {
        $sql = "INSERT INTO user ( username, password, level)
        VALUES ('$username', '$password', '$level')";
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
                        <a href="../user/data.php" class="list-group-item list-group-item-action active">Data User</a>
                    <?php endif; ?>

                    <?php if($_SESSION &&  $_SESSION['level'] == 'admin' || $_SESSION['level'] == 'resepsionis') : ?>
                        <a href="../pesanan/data.php" class="list-group-item list-group-item-action">Data Pesanan</a>
                    <?php endif; ?> 
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
                        <h2>INPUT USER</h2>

                        <?php if ($alert) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Data User Berhasil <?= $id ? 'diubah' : 'ditambahkan' ?> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif;  ?>

                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Username</label>
                                <input type="text" required value="<?= $dataById && $dataById['username'] ? $dataById['username'] : '' ?>" name="username" class="form-control" id="exampleFormControlInput1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input type="text" required value="<?= $dataById && $dataById['password'] ? $dataById['password'] : '' ?>" name="password" class="form-control" id="exampleFormControlInput1">
                            </div>

                            <div class="mb-3">
                                <label for="tipe_kamar" class="form-label">Level</label>
                                <select class="form-select" name="level" aria-label="Default select example">
                                    <option selected>Pilih Level</option>
                                    <option value="admin" <?= $dataById && $dataById['level'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                    <option value="resepsionis" <?= $dataById && $dataById['level'] == 'resepsionis' ? 'selected' : '' ?>>Resepsionis</option>
                                </select>
                            </div>
                            
                            <div class="mb-3 d-flex justify-content-between">
                                <a href="/hotelindahhai/admin/user/data.php" class="btn btn-outline-primary">Kembali</a>
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