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
                    <form action="proses_tambah.php" method="POST">
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
                                    <input class="form-control" id="type_kamar" name="type_kamar" type="text" placeholder="Masukkan Type kamar" aria-label="default input example">
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