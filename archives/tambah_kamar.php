<?php 
 
 include "../admin/layout/header.php";
?>

    <!-- <div class="container">
        <div class="card">
            <div class="card-body">
                <h2 class="text-center text-light bg-primary"> Tambah Kamar </h2>
                <form action="controller/aksi_tambah_kamar.php" method="POST">
                    </div>
                    <div class="mx-3">
                        <div class="form-floating">
                            <input type="text" name="id_kamar" class="form-control" id="id_kamar">
                            <label for="id_kamar">Id Kamar</label>
                        </div>
                        </div>
                        <div class=" mb-3 mx-3">
                        <label for="Image" class="mx-2">Image</label>
                            <input type="file" name="image" class="form-control" id="image">
                        </div>
                        <div class="form-floating mb-3 mx-3">
                            <input type="text" name="tipe_kamar" class="form-control" id="tipe_kamar">
                            <label for="tipe_kamar">Tipe Kamar</label>
                        </div>
                        <div class="form-floating mb-3 mx-3">
                            <input type="text" name="ukuran_kamar" class="form-control" id="ukuran_kamar">
                            <label for="ukuran_kamar">Ukuran Kamar</label>
                        </div>
                        <div class="form-floating mb-3 mx-3">
                            <input type="text" name="jumlah_kamar" class="form-control" id="jumlah_kamar">
                            <label for="jumlah_kamar">Jumlah Kamar</label>
                        </div>
                        <div class="d-flex justify-content-between mx-3">
                            <button class="btn btn-primary btn-md">Submit</button>
                            <button class="btn btn-danger btn-sm">Cancel</button>
                        </div>
                    </div>
                </form>
        </div>
    </div> -->
<!-- ---------------Bagian Modal bawaan----------------- -->
    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Data
    </button> -->
    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            ...
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
        </div>
    </div>
    </div> -->
    <!-- ---------------Bagian Penutup Modal bawaan----------------- -->

    <div class="mb-2" dir="rtl">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Data
    </button>
    </div>
    <!-- Modal -->
    <div class="container">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Kamar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="proses-tambah.php" method="POST">
                            <div class="container">
                                <div class="row my-1">
                                    <div class="col-3">
                                        <label for="id_kamar">Id Kamar: </label>
                                    </div>
                                    <div class="col-9">
                                        <input class="form-control" id="id_kamar" name="id_kamar" type="text" placeholder="Masukkan Id kamar" aria-label="default input example">
                                    </div>
                                </div>
                                <div class="row my-1">
                                    <div class="col-3">
                                        <label for="type_kamar">Type Kamar: </label>
                                    </div>
                                    <div class="col-9">
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected>Pilih Type kamar</option>
                                            <option value="1">Deluxe</option>
                                            <option value="2">Two</option>
                                            <option value="3">T1`1"hree</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row my-1">
                                    <div class="col-3">
                                        <label for="ukuran_kamar">Ukuran Kamar: </label>
                                    </div>
                                    <div class="col-9">
                                        <input class="form-control" id="ukuran_kamar" name="ukuran_kamar" type="text" placeholder="Masukkan Ukuran kamar" aria-label="default input example">
                                    </div>
                                </div>
                                <div class="row my-1">
                                    <div class="col-3">
                                        <label for="image">Foto Kamar: </label>
                                    </div>
                                    <div class="col-9">
                                        <input class="form-control" id="foto_kamar" name="foto_kamar" type="file" id="formFile">
                                    </div>
                                </div>
                                <div class="row my-1">
                                    <div class="col-3">
                                        <label for="jumlah_kamar">Jumlah Kamar: </label>
                                    </div>
                                    <div class="col-9">
                                        <input class="form-control" id="jumlah_kamar" name="jumlah_kamar" type="text" placeholder="Masukkan Jumlah kamar" aria-label="default input example">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input class="btn btn-primary" type="submit" value="Simpan" name="simpan">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

<!-- <?php include "layout/footer.php" ?> -->