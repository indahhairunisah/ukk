<?php
include "../model/koneksi.php";
session_start();

if(!$_SESSION) {
    header("location: /hotelindahhai/view/login.php");
}
$sql = "SELECT * FROM fasilitas_hotel";
$result = $koneksi->query($sql);
?>

<?php
include "layout/header.php";
?>

<?php
// include "layout/navbar.php";
// ?>

<nav class="navbar navbar-expand-lg navbar-light bg-info"  >
  <div class="container-fluid">
    <a class="navbar-brand px-5" style="color: white ; font-size:24px;" href="#"> <b>SHILLA HOTEL</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="d-flex justify-content-center">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav" style="font-size: 16px;">
          <li class="nav-item">
            <a class="nav-link active ms-2" style="color: white;"  aria-current="page" href="index.php#index"> HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ms-2" style="color: white;"  href="index.php#tipekamar">Tipe Kamar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" style="color: white;"  href="index.php#fasilitaskamar">Fasilitas Kamar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" style="color: white;"  href="index.php#fasilitashotel"> <b>Fasilitas Hotel</b></a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" style="color: white;"  href="#">LOGIN</a>
          </li> -->
          <a type="button" class="btn btn-primary shadow me-3" style="color: white;" href="/hotelindahhai/view/login.php" > LOGIN</a>
        </ul>
      </div>
    </div> 
  </div>
</nav>

<body style="background-color: #e6e6e6;">

<div class=" py-5">
            <div class="container">
                <div class="row justify-content-center">
                <h2 style="text-align: center;" class="border-bottom border-dark"> <b>FASILITAS HOTEL</b></h2>
                </div>
                <div class="row pt-5">
                    <?php if ($result->num_rows > 0) {  ?>
                    <?php while($row = $result->fetch_assoc()) : ?>
                    <div class="col-4 py-2 text-center ">
                        <!-- card fk1 -->
                        <div class="card">
                            <img src="/hotelindahhai/assets/admin/image/<?= $row['image_fasilitas_hotel'] ?>" class="card-img-top p-2" style="height: 20rem;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= $row['fasilitas_hotel'] ?>
                                    
                                </h5>
                                <p>Berukuran <?= $row['ukuran_fh'] ?> </p>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php }; ?> 
                </div>
            </div>
        </div>
    
</body>

<?php
 include "./layout/footer.php";
    ?>