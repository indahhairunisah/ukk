<?php
include "../../model/koneksi.php";


$id = $_GET && $_GET['id'] ? $_GET['id'] : 0;
if($id) {
    $sql = "DELETE FROM fasilitas_hotel WHERE id_fasilitas_hotel='$id'";
    $koneksi->query($sql);
    Header('location: /hotelindahhai/admin/fasilitas_hotel/data.php');
}

?>
