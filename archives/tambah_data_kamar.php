<?php

include("../../model/koneksi.php");


if (isset($_POST['simpan'])) {
    var_dump($_POST);

    $id_kamar = $_POST['id_kamar'];
    $type_kamar = $_POST['tipe_kamar'];
    $ukuran_kamar = $_POST['ukuran_kamar'];
    $foto_kamar = $_POST['image_kamar'];
    $jumlah_kamar = $_POST['jumlah_kamar'];


    $query_kamar = "INSERT INTO kamar (id_kamar, tipe_kamar, ukuran_kamar, image_kamar, jumlah_kamar) VALUE ('$id_kamar', '$ipe_kamar', '$ukuran_kamar', '$image_kamar', '$jumlah_kamar')";
    $data_kamar = mysqli_query($koneksi, $query_kamar);



    if ($data_kamar) {
        header('Location: halaman-admin.php?status=sukses');
    } else {
        header('Location: halaman-admin.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
