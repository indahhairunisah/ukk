<?php

// $server ="localhost";
// $user = "root";
// $pass = "";
// $db = "hotelindah";

$koneksi = mysqli_connect("localhost", "root", "", "hotelindah");

if (!$koneksi) {
    die("Gagal terhubung dengan database:" . mysqli_connect_error());
} else { 
    echo "";
}