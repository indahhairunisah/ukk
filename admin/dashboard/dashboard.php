<?php
    include "../../model/koneksi.php";
    session_start();
    
    if(!$_SESSION) {
        header("location: /hotelindahhai/view/login.php");
    }

    $sql = "SELECT * FROM fasilitas_hotel";
    
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
                    <a href="../dashboard/dashboard.php" class="list-group-item list-group-action active" aria-current="true">
                        Dashboard
                    </a>

                    <?php if($_SESSION && $_SESSION['level'] == 'admin') : ?>
                        <a href="../kamar/data.php" class="list-group-item list-group-item-action">Data Kamar</a>
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
                <div class="card">
                    <div class="card-body">
                            <h3>Selamat datang <?= $_SESSION && $_SESSION['username'] ?  $_SESSION['username']: '' ?>, sebagai <?= $_SESSION && $_SESSION['level'] ? $_SESSION['level'] : '' ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include "../layout/footer.php"; 
    ?>
</body>



