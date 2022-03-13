<?php
include "../model/koneksi.php";
session_start();

$list_kamar = $koneksi->query("SELECT * FROM kamar");
$tanggal_check_in = $_GET && $_GET['tanggal_check_in'] ? $_GET['tanggal_check_in'] : 0;
$tanggal_check_out = $_GET && $_GET['tanggal_check_out'] ? $_GET['tanggal_check_out'] : 0;
$id_kamar = $_GET && $_GET['id_kamar'] ? $_GET['id_kamar'] : 0;
$jumlah_kamar = $_GET && $_GET['jumlah_kamar'] ? $_GET['jumlah_kamar'] : 0;

$alert = "";
$type_alert = "";
$getKamarById = [];

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
   

    // Trigger Update jumlah stock kamar Open 
    if(mysqli_query($koneksi, "SELECT jumlah_kamar FROM kamar WHERE id_kamar='$id_kamar'")->fetch_assoc()['jumlah_kamar'] < $jumlah_pesan) {
        $alert = "Maaf, Jumlah Pesanan mu belebihi ketersediaan kamar!";
        $type_alert = "warning";
    }
    // Trigger Update Jumlah Stock Kamar Close
    
    
    if(mysqli_query($koneksi, "SELECT jumlah_kamar FROM kamar WHERE id_kamar='$id_kamar'")->fetch_assoc()['jumlah_kamar'] > $jumlah_pesan) {
        //    Update Stock data kamar
        $total = mysqli_query($koneksi, "SELECT jumlah_kamar FROM kamar WHERE id_kamar='$id_kamar'")->fetch_assoc()['jumlah_kamar'] - $jumlah_pesan;
        $koneksi->query("UPDATE kamar SET jumlah_kamar='$total' WHERE id_kamar='$id_kamar'");

        // Tambah data ke reservasi
        $sql = "INSERT INTO reservasi (id_kamar, nama_pemesan, nama_tamu, email, no_telepon, tanggal_check_in, tanggal_check_out, jumlah_pesan, status)
        VALUES ('$id_kamar', '$nama_pemesan', '$nama_tamu', '$email', '$no_telepon', '$tanggal_check_in', '$tanggal_check_out', '$jumlah_pesan', '$status')";
    
        if($koneksi->query($sql) == TRUE) {
            $alert = "Data Akan Segera diproses";
            $type_alert = "success";
        }
    }
}



?>


<?php
include "./layout/header.php";
?>


    <?php
    include "./layout/navbar.php";
    ?>

    <div class="container-fluid bg-light text-dark p-4">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="row">
                    <div class="col-7 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <h2>Konfirmasi Pemesanan</h2>

                                <?php if ($alert) : ?>
                                    <div class="alert alert-<?= $type_alert ?> alert-dismissible fade show" role="alert">
                                        <?= $alert; ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif;  ?>

                                <form action="" method="post" enctype="multipart/form-data">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="exampleFormControlInput1" class="form-label">Tanggal Check in</label>
                                        <input type="date" required value="<?= $tanggal_check_in ?>" name="tanggal_check_in" class="form-control" id="exampleFormControlInput1">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="exampleFormControlInput1" class="form-label">Tanggal Check out</label>
                                        <input type="date" required value="<?= $tanggal_check_out ?>" name="tanggal_check_out" class="form-control" id="exampleFormControlInput1">
                                    </div>
                                    <div class="col-md-4">
                                     <label for="exampleFormControlInput1" class="form-label">Jumlah Pesanan</label>
                                        <input type="text" required value="<?= $jumlah_kamar ?>" name="jumlah_pesan" class="form-control" id="exampleFormControlInput1">
                                    </div>
                                </div>

                                  
                                <div class="mb-3">
                                    <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                                    <select class="form-select" name="id_kamar" id="id_kamar" onchange="myFunction()" aria-label="Default select example">
                                        <option selected>Pilih Tipe Kamar</option>
                                        <?php while ($kamar = mysqli_fetch_assoc($list_kamar)) : ?>
                                            <option value="<?= $kamar['id_kamar'] ?>" <?= $id_kamar == $kamar['id_kamar'] ? 'selected' : '' ?>><?= $kamar['tipe_kamar'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Pemesan</label>
                                        <input type="text" required value="" name="nama_pemesan" class="form-control" id="exampleFormControlInput1">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Tamu</label>
                                        <input type="text" required value="" name="nama_tamu" class="form-control" id="exampleFormControlInput1">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                                        <input type="text" required value="" name="email" class="form-control" id="exampleFormControlInput1">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">No Telepon</label>
                                        <input type="text" required value="" name="no_telepon" class="form-control" id="exampleFormControlInput1">
                                    </div>

                                    <div class="mb-3 d-flex justify-content-between">
                                        <button class="btn btn-info" name="simpan" type="submit">
                                            Pesan
                                        </button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-5">
                        <div class="card" id="printableArea">
                            <div class="card-body">
                                <h2>Invoice Pesanan</h2>
                                <hr>
                                <p>Nama Pemesan: <?= $_POST && $_POST['nama_pemesan'] ? $_POST['nama_pemesan'] : '-' ?></p>
                                <p>Tipe Kamar:
                            
                                <?php 
                                    $list_kamar = $koneksi->query("SELECT * FROM kamar");
                                    if($list_kamar) {
                                        while ($kamar = mysqli_fetch_assoc($list_kamar)) { 
                                            echo $_POST && $_POST['id_kamar'] == $kamar['id_kamar'] ? $kamar['tipe_kamar'] : '' ; 
                                        }
                                    }
                                ?>

                                </p>
                                <p>Nama Tamu: <?= $_POST && $_POST['nama_tamu'] ? $_POST['nama_tamu'] : '-' ?></p>
                                <p>email: <?= $_POST && $_POST['email'] ? $_POST['email'] : '-' ?></p>
                                <p>No Telepon: <?= $_POST && $_POST['no_telepon'] ? $_POST['no_telepon'] : '-' ?></p>
                                <p>Tanggal Check In: <?= $_POST && $_POST['tanggal_check_in'] ? $_POST['tanggal_check_in'] : '-' ?></p>
                                <p>Tanggal Check Out: <?= $_POST && $_POST['tanggal_check_out'] ? $_POST['tanggal_check_out'] : '-' ?></p>
                                <p>Jumlah Pesanan: <?= $_POST && $_POST['jumlah_pesan'] ? $_POST['jumlah_pesan'] : '-' ?></p>
                                <button class="btn btn-primary" onclick="printDiv('printableArea')">Print</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- <div class="col-5 mx-auto">
                        <img src="assets/seperior.jpg" width="100%" height="50%" alt="">
                        TIPE SUPERIOR
                        Fasilitas:
                        <ul>
                            <li> Kamar Berukuran 36 m2 </li>
                            <li> Kamar Mandi Shower</li>
                            <li> Coffe Maker</li>
                            <li>
                                AC dan WIFI Gratis</li>
                            <li>
                                LED TV 32 inch</li>
                        </ul>

                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

    <?php
        include "./layout/footer.php";
    ?>

</body>

</html>