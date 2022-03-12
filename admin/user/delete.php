<?php
include "../../model/koneksi.php";


$id = $_GET && $_GET['id'] ? $_GET['id'] : 0;
if($id) {
    $sql = "DELETE FROM user WHERE id_user='$id'";
    $koneksi->query($sql);
    Header('location: /hotelindahhai/admin/user/data.php');
}

?>
