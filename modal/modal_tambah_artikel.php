<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Artikel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">  
                <div class="row">
                    <div class="col col-lg-12 col-md-12 col-12">
                        <div class="input-group mb-3">
                            <label class="form-label">Judul Artikel</label>
                            <div class="col-lg-12 col-md-12 col-12">
                                <input type="text" class="form-control" required name="judul_artikel">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-12 col-md-12 col-12 col-form-label">Referensi</label>
                            <div class="col-lg-12 col-md-12 col-12">   
                                <input type="text" class="form-control" required name="referensi">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-12 col-md-12 col-12 col-form-label">Gambar Artikel</label>
                            <div class="col-lg-12 col-md-12 col-12">   
                                <input type="file" class="form-control" required name="gambar_artikel">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-12 col-md-12 col-12 col-form-label">Isi Artikel</label>
                            <div class="col-lg-12 col-md-12 col-12">   
                            <textarea class="form-control" name="isi_artikel" rows="50" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary text-white rounded-pill" name="tambah_artikel">
                Simpan
            </button>
        </div>
    </div>
</div>