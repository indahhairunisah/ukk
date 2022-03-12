<?php
include "../../model/koneksi.php";


$id = $_GET && $_GET['id'] ? $_GET['id'] : 0;
if($id) {
    $sql = "DELETE FROM kamar WHERE id=$id";
    $koneksi->query($sql);
    // Header('location: data_kamar.php');
}

?>
