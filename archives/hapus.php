<?php
include("../view/koneksi.php");
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE from kamar where id_kamar='$id'");
if ($query) {
    echo "<script>window.location=('halaman-admin.php')</script>";
}
