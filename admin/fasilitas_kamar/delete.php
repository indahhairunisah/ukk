<?php
include "../../model/koneksi.php";


$id = $_GET && $_GET['id'] ? $_GET['id'] : 0;
if($id) {
    $sql = "DELETE FROM fasilitas_kamar WHERE id_fasilitas_kamar='$id'";
    $koneksi->query($sql);
    Header('location: /hotelindahhai/admin/fasilitas_kamar/data.php');
}

$id_detail_kamar = $_GET && $_GET['id_detail_kamar'] ? $_GET['id_detail_kamar'] : 0;
if($id_detail_kamar) {
    $sql = "DELETE FROM detail_kamar WHERE id='$id_detail_kamar'";
    $koneksi->query($sql);
    Header('location: /hotelindahhai/admin/fasilitas_kamar/data.php');
}



?>
