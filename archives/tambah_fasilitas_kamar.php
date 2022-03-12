<?php

include("../../model/koneksi.php");


if (isset($_POST['simpan'])) {
    var_dump($_POST);

    $id_fasilitas_kamar = $_POST['id_fasilitas_kamar'];
    $tipe_kamar = $_POST['tipe_kamar'];
    $nama_fasilitas_kamar = $_POST['nama_fasilitas_kamar'];
    $image_fasilitas_kamar = $_POST['image_fasilitas_kamar'];

    $query_fasilitas_kamar = "INSERT INTO fasilitas_kamar (id_fasilitas_kamar, tipe_kamar, nama_fasilitas_kamar, image_kamar, image_fasilitas_kamar) VALUE ('$id_fasilitas_kamar', '$tipe_kamar', '$nama_fasilitas_kamar', '$image_fasilitas_kamar')";
    $data_fasilitas_kamar = mysqli_query($koneksi, $query_fasilitas_kamar);



    if ($data_fasilitas_kamar) {
        header('Location: halaman-admin.php?status=sukses');
    } else {
        header('Location: halaman-admin.php?status=gagal');
    }
} else {
    die("Akses dilarang...");
}
