<div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Buku</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body">
            <div class="container-fluid">  
                <div class="row">
                    <div class="col col-lg-6 col-md-12 col-12">
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Kode Buku</label>
                            <div class="col-lg-8 col-md-8 col-7">   
                                <input type="text" class="form-control" name="kode_buku" required>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Judul Buku</label>
                            <div class="col-lg-8 col-md-8 col-7">
                            <textarea class="form-control" name="judul" style="resize: none; height: 90px;" required></textarea>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Edisi</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <input type="text" class="form-control" name="edisi">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">ISBN</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <input type="text" class="form-control" name="ISBN">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Bahasa</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <input type="text" class="form-control" name="bahasa">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Subjek</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                    <select class="form-select" name="subjek" required>
                                        <option value="" selected>Pilih Subjek</option>
                                        <?php foreach( $subjek as $rowsubjek)  : ?>
                                            <option value="<?= $rowsubjek['nama_subjek'];?>"><?= $rowsubjek['nama_subjek'];?></option>
                                        <?php endforeach?>
                                    </select>
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-12 col-12">
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Pengarang</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <input type="text" class="form-control" name="pengarang">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Penerbit</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <input type="text" class="form-control" name="penerbit">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Tahun Terbit</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <input type="text" class="form-control" name="tahun_terbit">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Tempat Terbit</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <input type="text" class="form-control" name="tempat_terbit">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Jumlah</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <input type="text" class="form-control" name="jumlah">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Kondisi</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                    <select class="form-select" name="kondisi" required>
                                        <option value="" selected>Pilih Kondisi</option>
                                        <option value="Baik">Baik</option>
                                        <option value="Rusak">Rusak</option>
                                        <option value="Tidak Relevan">Tidak Relevan</option>
                                    </select>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Gambar Cover</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <input type="file" class="form-control" name="cover" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary rounded-pill" name="tambah_buku">
                Simpan
            </button>
        </div>
    </div>
</div>