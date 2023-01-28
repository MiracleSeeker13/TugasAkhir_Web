<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Kelola Subjek</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">  
                <div class="row">
                    <div class="col col-lg-12 col-md-12 col-12">
                        <div class="input-group mb-3">
                            <label class="form-label">Nama Subjek</label>
                            <div class="col-lg-12 col-md-12 col-12">
                                <input type="text" hidden class="form-control" required name="id_subjek" value="<?= $row["id_subjek"]?>">
                                <input type="text" hidden class="form-control" name="nama_subjek_lama" value="<?= $row["nama_subjek"]?>">
                                <input type="text" class="form-control" required name="nama_subjek" value="<?= $row["nama_subjek"]?>">
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header"> Ikon Subjek </div>
                            <div class="card-body">
                                <img src="../gambar/ikon_subjek/<?= $row["ikon_subjek"]?>" class="img-fluid rounded mx-auto d-block" alt="Ikon Subjek" style="height: 183px" >
                            </div>
                            <div class="card-footer">
                                <input type="text" hidden class="form-control" name="ikon_subjek_lama" value="<?= $row["ikon_subjek"]?>"> 
                                <input type="file" class="form-control" name="ikon_subjek">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary text-white rounded-pill" name="edit_subjek">
                Simpan
            </button>
        </div>
    </div>
</div>