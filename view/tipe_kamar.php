<?php
    include "./layout/header.php";
?>

<?php
    include "./layout/navbar.php";
?>

<body style="background-color: #e6e6e6; ">
    <h2 class="text-center mt-5 mb-4">PILIH TIPE KAMAR</h2>
    <div class="container py-2">
        <div class="row">
                <div class="col-4">
                    <img src="assets/seperior.jpg" width="100%" height="100%" alt="">
                </div>
                <div class="col-5 card">
                    <div class="card-body">
                        <small class="text-danger">Stok :</small>
                        <h4>Superior</h4>
                        <p>Fasilitas</p>
                        <ol>
                            <li>kocak</li>
                            <li>kocak</li>
                            <li>kocak</li>
                        </ol>
                        <div class="position-absolute top-0 end-0 p-3">
                            <h6>KETERSEDIAAN</h6>
                            <h3>90</h3>
                            <p>Kamar</p>  
                        </div     > 
                        <small class="text-warning">Ukuran : </small>
                        <button class="position-absolute bottom-0 end-0 translate-middle btn btn-warning btn-sm">Pesan</button>
                    </div>
                    
                </div>

        </div>
    </div>

</body>

<?php
    include "./layout/footer.php";
?>
