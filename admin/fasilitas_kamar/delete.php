<?php
include "../../../model/koneksi.php";


$id = $_GET && $_GET['id'] ? $_GET['id'] : 0;
if($id) {
    $sql = "DELETE FROM detail_kamar WHERE id=$id";
    $koneksi->query($sql);
    Header('location: data_fasilitas_kamar.php');
}

?>
