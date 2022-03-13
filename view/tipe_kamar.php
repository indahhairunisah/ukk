<?php
include "../model/koneksi.php";
session_start();

$sql = "SELECT * FROM kamar";
$result = $koneksi->query($sql);

$no = 1;
if (isset($_POST['search'])) {
  $cari = $_POST['search_input'];
  $result = mysqli_query($koneksi, "SELECT * from kamar where tipe_kamar like '%$cari%'");
} else {
  $result = mysqli_query($koneksi, "SELECT * FROM kamar");
}


?>


<?php
include "./layout/header.php";
?>

<?php
include "./layout/navbar.php";
?>

<body style="background-color: #e6e6e6; ">

    <div class="container">
        <h2 class="text-center mt-5 mb-4">PILIH TIPE KAMAR</h2>

        
        <?php 
             $no = 1;
             $dataJoin = mysqli_query($koneksi, "SELECT
                                                   *, detail_kamar.id as  id_detail_kamar
                                                   FROM detail_kamar
                                                   JOIN fasilitas_kamar
                                                   ON detail_kamar.id_fasilitas_kamar = fasilitas_kamar.id_fasilitas_kamar
                                                   JOIN kamar
                                                   ON detail_kamar.id_kamar = kamar.id_kamar
                                                   GROUP BY detail_kamar.id");

             $rows = array();
             while($row = mysqli_fetch_array($dataJoin)) {
                 $rows[] = $row;
             }
        ?>
        <div class="row py-4">
            <div class="col-10 mx-auto">
                <?php if ($result->num_rows > 0) {  ?>
                    <?php while($kamarItem = $result->fetch_assoc()) : ?>
                    <div class="row my-5">
                        <div class="col-4">
                            <img src="/hotelindahhai/assets/admin/image/<?= $kamarItem['image_kamar'] ?>" width="100%" height="100%" alt="">
                        </div>
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body py-5">
                                    <small class="text-success">Tipe Kamar :</small>
                                    <h4><?= $kamarItem['tipe_kamar'] ?></h4>
                                    <p>Fasilitas</p>

                                    <ol>
                                        <?php foreach($rows as $row): ?>
                                            <?php if($row['id_kamar'] == $kamarItem['id_kamar']) : ?>
                                                <li><?= $row['fasilitas_kamar'] ?></li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ol>
                                    <div class="position-absolute top-0 end-0 p-4 pe-5 text-center">
                                        <h5 class="text-success">KETERSEDIAAN</h5>
                                        <h3 class="text-center"><?= $kamarItem['jumlah_kamar'] ?></h3>
                                        <p class="text-center mb-2">Kamar</p>
                                        <a class="btn btn-primary btn-md" href="/hotelindahhai/view/reservasi.php?tanggal_check_in=&tanggal_check_out&jumlah_kamar=1&id_kamar=<?= $kamarItem['id_kamar'] ?>">Pesan</a>
                                    </div>
                                    <small class="text-warning">Ukuran : </small>
                                    <p class=""><?= $kamarItem['ukuran_kamar'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php }; ?> 
            </div>
        </div>

        
        <?php if ($result->num_rows > 0) {  ?>
            <?php while($row = $result->fetch_assoc()) : ?>
            <tr>
                <td scope="row"><?= $row['tipe_kamar'] ?></td>
                <td scope="row" class="text-center"><?= $row['jumlah_kamar'] ?></td>
                <td scope="row">
                    <img src="/hotelindahhai/admin/image/<?= $row['image_kamar'] ?>" width="50px" alt="">
                </td>
                <td class="text-center">
                    <a href="/hotelindahhai/admin/kamar/form.php?id=<?= $row['id'] ?>" class="btn btn-warning">Ubah</a>
                    <a href="/hotelindahhai/admin/kamar/delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ??')" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php }; ?> 

        <!-- <div class="row py-4">
            <div class="col-10 mx-auto">
                <div class="row">
                    <div class="col-4">
                        <img src="assets/seperior.jpg" width="100%" height="100%" alt="">
                    </div>
                    <div class="col-8">
                        <div class="card">
                            <div class="card-body">
                                <small class="text-success">Tipe Kamar :</small>
                                <h4>STANDARD</h4>
                                <p>Fasilitas</p>
                                <ol>
                                    <li>input dari DB </li>
                                    <li>input dari DB </li>
                                    <li>input dari DB </li>
                                </ol>
                                <div class="position-absolute top-0 end-0 p-4 pe-5 text-center">
                                    <h5 class="text-success">KETERSEDIAAN</h5>
                                    <h3 class="text-center">90</h3>
                                    <p class="text-center mb-2">Kamar</p>
                                    <button class="btn btn-primary btn-md">Pesan</button>
                                </div>
                                <small class="text-warning">Ukuran : </small>
                                <p class="">50 m2</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row py-4">
            <div class="row">
                <div class="col-10 mx-auto">
                    <div class="row">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">
                                    <small class="text-success">Tipe Kamar :</small>
                                    <h4>STANDARD</h4>
                                    <p>Fasilitas</p>
                                    <ol>
                                        <li>input dari DB </li>
                                        <li>input dari DB </li>
                                        <li>input dari DB </li>
                                    </ol>
                                    <div class="position-absolute top-0 end-0 p-4 pe-5 text-center">
                                        <h5 class="text-success">KETERSEDIAAN</h5>
                                        <h3 class="text-center">90</h3>
                                        <p class="text-center mb-2">Kamar</p>
                                        <button class="btn btn-primary btn-md">Pesan</button>
                                    </div>
                                    <small class="text-warning">Ukuran : </small>
                                    <p class="">50 m2</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <img src="assets/seperior.jpg" width="100%" height="100%" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- <div class="row py-4">
            <div class="row">
                <div class="col-10 mx-auto">
                    <div class="row">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-body">
                                    <small class="text-success">Tipe Kamar :</small>
                                    <h4>STANDARD</h4>
                                    <p>Fasilitas</p>
                                    <ol>
                                        <li>input dari DB </li>
                                        <li>input dari DB </li>
                                        <li>input dari DB </li>
                                    </ol>
                                    <div class="position-absolute top-0 end-0 p-4 pe-5 text-center">
                                        <h5 class="text-success">KETERSEDIAAN</h5>
                                        <h3 class="text-center">90</h3>
                                        <p class="text-center mb-2">Kamar</p>
                                        <button class="btn btn-primary btn-md">Pesan</button>
                                    </div>
                                    <small class="text-warning">Ukuran : </small>
                                    <p class="">50 m2</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <img src="assets/seperior.jpg" width="100%" height="100%" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div> -->



        <!-- <div class="container">
            <div class="card mb-3 p-2" style="width: 100%">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="../assets/view/image/seperior.jpg" class="img-fluid rounded-start" alt="...">
                                </div>
                                <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Superior</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                </div>
                            </div>
                        </div>
            </div>
        </div> -->

    </div>



</body>

<?php
include "./layout/footer.php";
?>