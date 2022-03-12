<?php 
 include "../admin/layout/header.php";
 include "../../model/koneksi.php";
?>

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
        <?php
include 'tambah-data.php'
        ?>
        <table class="table table-striped table-hover table-bordered text-center">
            <tr class="table-info">
                    <th>Id Kamar</th>
                    <th>Image Kamar</th>
                    <th>Tipe Kamar</th>
                    <th>Ukuran Kamar</th>
                    <th>Jumlah Kamar</th>
            <tr>
                <?php
                $query = mysqli_query($koneksi, "SELECT * from kamar");
                while ($data = mysqli_fetch_assoc($query)){
                ?>
            <tr>
                <td> <?= $data['id_kamar'] ?> </td>
                <td> <?= $data['image_kamar'] ?> </td>
                <td> <?= $data['tipe_kamar'] ?> </td>
                <td><?= $data['ukuran_kamar'] ?></td>
                <td><?= $data['jumlah_kamar']?> </td>
            </tr>
            <?php } ?>
        </table> 
        </div>
    </div>
</div>


<?php
//  include "../admin/layout/footer.php"
?>