<?php
include "layout/header.php";
?>

<!-- <?php
// include "layout/navbar.php";
?> -->

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
            <a class="nav-link active ms-2" style="color: white;"  aria-current="page" href="#"> HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ms-2" style="color: white;"  href="index.php#tipekamar">Tipe Kamar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" style="color: white;"  href="index.php#fasilitaskamar"> <b>Fasilitas Kamar</b></a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" style="color: white;"  href="index.php#fasilitashotel">Fasilitas Hotel</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" style="color: white;"  href="#">LOGIN</a>
          </li> -->
          <button type="button" class="btn btn-primary shadow me-3" style="color: white;" >LOGIN</button>
        </ul>
      </div>
    </div> 
  </div>
</nav>

<body style="background-color: #e6e6e6;">

    <div class=" py-5">
            <div class="container">
                <div class="row justify-content-center">
                <h2 style="text-align: center;" class="border-bottom border-dark"> <b>FASILITAS KAMAR</b></h2>
                </div>
                <div class="row justify-content-center pt-5">
                    <div class="col-md py-2 text-center ">
                        <!-- card fk1 -->
                        <div class="card">
                            <img src="../view/assets/tv.jfif" class="card-img-top p-2" style="height: 20rem;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">LED TV 32inch</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md py-2 text-center ">
                        <!-- card fk2 -->
                        <div class="card">
                            <img src="../view/assets/coffem.jpg" class="card-img-top p-2" style="height: 20rem;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Coffee Maker</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md py-2 text-center ">
                        <!-- card fk3 -->
                        <div class="card ">
                            <img src="../view/assets/ac.jpg" class="card-img-top p-2" style="height: 20rem;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">AC</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" pb-5">
            <div class="container">
                <div class="row justify-content-center">
                <div class="row justify-content-center pt-5">
                    <div class="col-md py-2 text-center ">
                        <!-- card fk1 -->
                        <div class="card">
                            <img src="../view/assets/tv.jfif" class="card-img-top p-2" style="height: 20rem;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">LED TV 32inch</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md py-2 text-center ">
                        <!-- card fk2 -->
                        <div class="card">
                            <img src="../view/assets/coffem.jpg" class="card-img-top p-2" style="height: 20rem;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Coffee Maker</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md py-2 text-center ">
                        <!-- card fk3 -->
                        <div class="card ">
                            <img src="../view/assets/ac.jpg" class="card-img-top p-2" style="height: 20rem;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">AC</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" pb-5">
            <div class="container">
                <div class="row justify-content-center">
                <div class="row justify-content-center pt-5">
                    <div class="col-md py-2 text-center ">
                        <!-- card fk1 -->
                        <div class="card">
                            <img src="../view/assets/tv.jfif" class="card-img-top p-2" style="height: 20rem;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">LED TV 32inch</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md py-2 text-center ">
                        <!-- card fk2 -->
                        <div class="card">
                            <img src="../view/assets/coffem.jpg" class="card-img-top p-2" style="height: 20rem;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Coffee Maker</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md py-2 text-center ">
                        <!-- card fk3 -->
                        <div class="card ">
                            <img src="../view/assets/ac.jpg" class="card-img-top p-2" style="height: 20rem;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">AC</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
    include "../layout/footer.php";
?>