<?php
include "../../model/koneksi.php";
session_start();

if(!$_SESSION) {
    header("location: /hotelindahhai/view/login.php");
}
//ini perintah join tabel reservasi dan kamar
$sql = "SELECT * FROM reservasi JOIN kamar ON reservasi.id_kamar = kamar.id_kamar";
$result = $koneksi->query($sql);

if(isset($_POST['check_in'])) {
    $id_reservasi = $_POST['id_reservasi'];
    $sql = "UPDATE reservasi SET status='2' WHERE id_reservasi='$id_reservasi'";
    $koneksi->query($sql);
    Header("location: /hotelindahhai/admin/pesanan/data.php");
}

if(isset($_POST['check_out'])) {
    $id_reservasi = $_POST['id_reservasi'];
    $id_kamar = $_POST['id_kamar'];
    $sql = "UPDATE reservasi SET status='3' WHERE id_reservasi='$id_reservasi'";
    $koneksi->query($sql);

    $jumlah_pesan = $_POST['jumlah_pesan'];
    $jumlah_kamar_result = $koneksi->query("SELECT jumlah_kamar FROM kamar WHERE id_kamar='$id_kamar'")->fetch_assoc()['jumlah_kamar'] + $jumlah_pesan;
    $sql_kamar = "UPDATE kamar SET jumlah_kamar='$jumlah_kamar_result' WHERE id_kamar='$id_kamar'";
    $koneksi->query($sql_kamar);
    Header("location: /hotelindahhai/admin/pesanan/data.php");
}

//search by date
if (isset($_POST['search_date_checkin'])) {
    $cari = $_POST['search_input_date_in'];
    $result = mysqli_query($koneksi, "SELECT * from reservasi JOIN kamar ON reservasi.id_reservasi where tanggal_check_in like '%$cari%' GROUP BY id_reservasi");
}

if (isset($_POST['search_date_checkout'])) {
    $cari = $_POST['search_input_date_out'];
    $result = mysqli_query($koneksi, "SELECT * from reservasi JOIN kamar ON reservasi.id_reservasi where tanggal_check_out like '%$cari%' GROUP BY id_reservasi");
}

//search by nama tamu
if (isset($_POST['search'])) {
    $cari = $_POST['search_input'];
    $result = mysqli_query($koneksi, "SELECT * from reservasi JOIN kamar ON reservasi.id_kamar = kamar.id_kamar where nama_tamu like '%$cari%'");
}
  

?>

<?php
include "../layout/header.php";
include "../layout/navbar2.php";

?>

<div class="container-fluid bg-light text-dark p-4 ">
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
                    <li class="breadcrumb-item"><a href="../dashboard/dashboard.php"><?= $_SESSION["level"] ?></a></li> 
                    <li class="breadcrumb-item active" aria-current="page">Data Pesanan</a></li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Data Pesanan</h4>
                            <form action="" method="POST" >
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="search_input" placeholder="Search by name" aria-label="" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" name="search" type="submit" id="button-addon2">Search</button>
                                </div>
                              
                            </form>

                            <form action="" method="POST" >
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" name="search_input_date_in" placeholder="Search by date" aria-label="" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" name="search_date_checkin" type="submit" id="button-addon2">Check In</button>
                                </div>
                            </form>

                            <form action="" method="POST" >
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" name="search_input_date_out" placeholder="Search by date" aria-label="" aria-describedby="button-addon2">
                                    <button class="btn btn-outline-secondary" name="search_date_checkout" type="submit" id="button-addon2">Checkout</button>
                                </div>
                            </form>

                        <a href="/hotelindahhai/admin/pesanan/form.php" class="btn btn-primary">Tambah Data Pesanan</a>
                    </div>
                    
                    <hr>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Nama Tamu</th>
                                <th scope="col">Tipe Kamar</th>
                                <th scope="col">Jumlah Kamar</th>
                                <th scope="col">Tanggal Check in</th>
                                <th scope="col">Tanggal Check Out</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result->num_rows > 0) {  ?>
                                <?php while($row = $result->fetch_assoc()) : ?>
                                <tr>
                                    <td scope="row"><?= $row['nama_tamu'] ?></td>
                                    <td scope="row" class="text-center"><?= $row['tipe_kamar'] ?></td>
                                    <td scope="col" class="text-center"><?= $row['jumlah_pesan'] ?></td>
                                    <td scope="row" class="text-center"><?= $row['tanggal_check_in'] ?></td>
                                    <td scope="row" class="text-center"><?= $row['tanggal_check_out'] ?></td>
                                    <td scope="row" class="text-center">
                                        <?php
                                            if($row['status'] == 1) echo "Pending Order";
                                            if($row['status'] == 2) echo "Check-In";
                                            if($row['status'] == 3) echo "Check-Out";
                                        ?>



                                        <!-- button untuk update status (pending,check-in,check-out) -->
                                        <div class="btn-group d-block text-center" role="group" aria-label="Basic mixed styles example">
                                            <form action="" method="post">
                                                <input type="text" value="<?= $row['id_kamar'] ?>" class="d-none" name="id_kamar">
                                                <input type="text" value="<?= $row['jumlah_pesan'] ?>" class="d-none" name="jumlah_pesan">
                                                <input type="text" class="d-none" value="<?= $row['id_reservasi'] ?>" name="id_reservasi">
                                                <button type="submit" name="check_in" class="btn btn-sm btn-warning text-center <?= $row['status'] == 1  ? '' : 'd-none' ?>">Check-In
                                                </button>
                                                <button type="submit" name="check_out" class="btn btn-sm btn-success <?= $row['status'] == 2  ? '' : 'd-none' ?>">Check-Out</button>
                                                
                                            </form>
                                            <?php 
                                            
                                            ?> 
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="/hotelindahhai/admin/pesanan/form.php?id=<?= $row['id_reservasi'] ?>" class="btn btn-warning">Ubah</a>
                                        <a href="/hotelindahhai/admin/pesanan/delete.php?id=<?= $row['id_reservasi'] ?>" class="btn btn-danger">Hapus</a>
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
