<?php
include './layout/header.php';

include "../model/koneksi.php";


?>

<?php
include './layout/navbar.php';
?>

<body style="background-color: #e6e6e6;"  id="index">
    <div style="background-color: #2d2d2d;">
        <div class="row justify content">
            <img src="/hotelindahhai/assets/view/image/hotel.PNG" alt="" width="100%" height="700" >
                <div class="col position-absolute start-50 top-50 translate-middle">
                    <div class="container">
                        <h1 class="text-white mt-5 pt-5" style="font-size: 70px;"> <b>SHILLA HOTEL</b></h1>
                        <p class="text-white" style="width: 40%; font-size:20px" >Temukan Kenyamanan Dan Kemewahan Pada Hotel Ini, Kemudian Bersenang-Senang lah Dengan Orang Tersayang Anda.</p>
                        <a type="submit" class="text-white btn btn-info text-shadow px-4 py-2" href="/hotelindahhai/view/tipe_kamar.php"> <b>LIHAT KAMAR</b></a>
                    </div>
                    <!-- <br><br><br><br><br> -->
                    <br>
                    <div class="container mt-5 pt-5">
                        <div class="row mt-2">
                            <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <form action="/hotelindahhai/view/reservasi.php" method="get">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" name="tanggal_check_in" id="floatingInputGrid">
                                                    <label for="floatingInputGrid">Tanggal Cek In</label>
                                                </div>
                                                </div>
                                                <div class="col">
                                                <div class="form-floating">
                                                    <input type="date" class="form-control" name="tanggal_check_out" id="floatingInputGrid">
                                                    <label for="floatingInputGrid">Tanggal Cek Out</label>
                                                </div>
                                                </div>
                                                <div class="col">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" name="jumlah_kamar" id="floatingInputGrid">
                                                    <label for="floatingInputGrid">Jumlah Kamar</label>
                                                </div>
                                                </div>
                                                <div class="col d-none">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control d-none" name="id_kamar"  id="floatingInputGrid">
                                                    <label for="floatingInputGrid">Jumlah Kamar</label>
                                                </div>
                                                </div>
                                                <div class="col">
                                                    <button type="submit" class="btn btn-primary w-100" style="height: 100%;">Pesan Sekarang</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- <hr style="background-color: #fff;"> -->
        </div>
        <div class="container pt-5" style="color: #2d2d2d;">
            <h2 style="text-align: center;" class="border-bottom border-dark mb-3"> <b>ABOUT US</b></h2>
            <p style="font-size: 18px"> &emsp; &emsp; Hotel Shilla terletak di pusat kota Seoul yang memiliki luas kurang lebih 1 hektar , The Shilla Seoul adalah Hotel bintang 5 nominasi Forbes selama 4 tahun berturut-turut dari 2019 hingga 2022. Hotel Shilla adalah salah satu dalam jajaran The Leading Hotels of the World. </p>
            <p style="font-size: 18px;"> &emsp; &emsp; Hotel Shilla mulai beroperasi pada bulan Maret 1979 di bawah arahan dari Lee Byung-chull, pendiri Samsung Group. Sebelum tahun 1979, hotel tersebut merupakan tempat menginap bagi tamu Republik Korea saat masih dipimpin oleh Park Chung-hee. Hotel Shilla fokus pada "harmoni dan kecantikan dari modernisme dan tradisi". Pada bulan Januari 2008, The Shilla dipilih sebagai salah satu dari 500 hotel terbaik di dunia oleh Travel & Leisure. </p>
        <br>
        </div>
    </div>


                
 <!-- BAGIAN TIPE KAMAR -->
 <div class="container py-4" id="tipekamar">
            <div class="row justify-content-center">
            <h2 style="text-align: center;" class="border-bottom border-dark"> <b>TIPE KAMAR</b></h2>
            </div>
            <div class="row justify-content-center pt-5">
                <div class="col-md py-2 text-center ">
                    <!-- card tipe kamar standar -->
                    <div class="card">
                        <img src="../assets/view/image/standard.png" class="card-img-top p-2" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">STANDARD</h5>
                            <p class="card-text">LED TV, AC, Free Wifi Dst</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md py-2 text-center ">
                    <!-- card tipe kamar superior -->
                    <div class="card">
                        <img src="assets/seperior.jpg" class="card-img-top p-2" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">SUPERIOR</h5>
                            <p class="card-text">LED TV, AC, Free Wifi, Cofee Maker Dst</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md py-2 text-center ">
                    <!-- card tipe kamar Deluxe -->
                    <div class="card ">
                        <img src="assets/deluxe.jpg" class="card-img-top p-2" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">DELUXE</h5>
                            <p class="card-text">LED TV, AC, Free Wifi, Cofee Maker, Sofa Dst</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- PENUTUP BAGIAN TIPE KAMAR -->







    <!-- PEMBUKA FASILITAS KAMAR -->
        <div class="container py-5" id="fasilitaskamar">
            <div class="row justify-content-center">
            <h2 style="text-align: center;" class="border-bottom border-dark"> <b>FASILITAS KAMAR</b></h2>
            </div>

            <div class="row justify-content-center pt-5" >
                <div class="col-md py-2 text-center ">
                    <!-- card fk1 -->
                    <div class="card">
                        <img src="assets/tv.jfif" class="card-img-top p-2" style="height: 15rem;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">LED TV</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md py-2 text-center ">
                    <!-- card fk2 -->
                    <div class="card">
                        <img src="../assets/view/image/wifii.PNG" class="card-img-top p-2" style="height: 15rem;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Free Wifi</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md py-2 text-center ">
                    <!-- card fk3 -->
                    <div class="card ">
                        <img src="assets/coffem.jpg" class="card-img-top p-2" style="height: 15rem;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Coffee Maker</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md py-2 text-center ">
                    <!-- card fk3 -->
                    <div class="card ">
                        <img src="assets/ac.jpg" class="card-img-top p-2" style="height: 15rem;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">AC</h5>
                        </div>
                    </div>
                </div>

                <div class="d-grid  d-md-flex justify-content-md-end">
                    <a href="fasilitas_kamar_web.php" class="btn btn-info my-4">Lihat Selengkapnya</a>
                </div>
            </div>
        </div>
        <!-- PENUTUP BAGIAN FASILITAS KAMAR -->

        <!-- container Fasilitas Hotel -->
            <div class="container pb-5" id="fasilitashotel">
                <div class="row justify-content-center">
                <h2 style="text-align: center;" class="border-bottom border-dark"> <b>FASILITAS HOTEL</b></h2>
                </div>
                <div class="row justify-content-center pt-5">
                    <div class="col-md py-2 text-center ">
                        <!-- card fh1 -->
                        <div class="card">
                            <img src="../assets/view/image/kl-min.jpg" class="card-img-top p-2" style="height: 20rem;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">SwimmingPool Outdoor</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md py-2 text-center ">
                        <!-- card fh2 -->
                        <div class="card">
                            <img src="../assets/view/image/gymm-min.jpeg" class="card-img-top p-2" style="height: 20rem;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">GYM Center</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md py-2 text-center ">
                        <!-- card fh3 -->
                        <div class="card ">
                            <img src="../assets/view/image/biliard-min.jpg" class="card-img-top p-2" style="height: 20rem;" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Billiard</h5>
                            </div>
                        </div>
                    </div>

                    <div class="d-grid  d-md-flex justify-content-md-end">
                        <a href="fasilitas_hotel.php" class="btn btn-info my-4">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
        <!-- penutup Fasilitas Hotel -->

        

</body>

    <?php
 include "./layout/footer.php";
    ?>