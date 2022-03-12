<?php 
include "../../model/koneksi.php";

// mysqli_query ($koneksi, "INSERT INTO kamar VALUE  '$POST[id_kamar]', '$POST[tipe_kamar]', '$POST[ukuran_kamar]', '$POST[jumlah_kamar]', '$POST[image_kamar]', ");
$simpan = mysqli_query($koneksi, "INSERT INTO kamar value ('', 
'$_POST[id_kamar]', 
'$_POST[tipe]', 
'$_POST[ukuran]', 
'$_POST[stok]', 
'')");
if ($simpan) {
    echo "<script>alert('Simpan Data Berhasil');
    window.location=('kamar.php');</script>";
} else {
    echo "<script>alert('Simpan Data Gagal');</script>";
}