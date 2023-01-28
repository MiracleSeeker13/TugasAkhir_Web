<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Kelola Artikel</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">  
                <div class="row">
                    <div class="col col-lg-12 col-md-12 col-12">
                        <div class="input-group mb-3">
                            <label class="form-label">Judul Artikel</label>
                            <div class="col-lg-12 col-md-12 col-12">
                                <input type="text" hidden class="form-control" name="id_artikel" value="<?= $row["id_artikel"]?>">
                                <input type="text" hidden class="form-control" name="tgl_posting" value="<?= $row["tgl_posting"]?>">
                                <input type="text" class="form-control" required name="judul_artikel" value="<?= $row["judul_artikel"]?>">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-12 col-md-12 col-12 col-form-label">Referensi</label>
                            <div class="col-lg-12 col-md-12 col-12">
                                <?php if( $row["referensi"] == "") : ?>
                                    <input type="text" class="form-control" name="referensi" value="" placeholder="-">
                                <?php else : ?>
                                    <input type="text" class="form-control" name="referensi" value="<?= $row["referensi"]?>">
                                <?php endif ?>   
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header"> Gambar Artikel </div>
                            <div class="card-body">
                                <img src="../gambar/artikel/<?= $row["gambar_artikel"]?>" class="img-fluid rounded mx-auto d-block" alt="Gambar Artikel" style="height: 183px" >
                            </div>
                            <div class="card-footer">
                                <input type="text" hidden class="form-control" name="gambar_artikel_lama" value="<?= $row["gambar_artikel"]?>"> 
                                <input type="file" class="form-control" name="gambar_artikel">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-12 col-md-12 col-12 col-form-label">Isi Artikel</label>
                            <div class="col-lg-12 col-md-12 col-12">   
                            <textarea class="form-control" name="isi_artikel" rows="50" required><?= $row["isi_artikel"] ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary text-white rounded-pill" name="edit_artikel">
                Simpan
            </button>
        </div>
    </div>
</div>