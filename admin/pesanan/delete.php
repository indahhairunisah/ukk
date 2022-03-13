<?php
include "../../model/koneksi.php";


$id = $_GET && $_GET['id'] ? $_GET['id'] : 0;
if($id) {
    $sql = "DELETE FROM reservasi WHERE id_reservasi='$id'";
    $koneksi->query($sql);
    Header('location: /hotelindahhai/admin/pesanan/data.php');
}

?>
