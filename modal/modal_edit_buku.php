<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Kelola Buku</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body">
            <div class="container-fluid">  
                <div class="row">
                    <div class="col col-lg-6 col-md-12 col-12">
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Kode Buku</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <input type="text" hidden class="form-control" name="id_buku" value="<?= $row["id_buku"]?>">
                                <input type="text" hidden class="form-control" name="kode_buku_lama" value="<?= $row['kode_buku'];?>">   
                                <input type="text" class="form-control" name="kode_buku" value="<?= $row['kode_buku'];?>" required>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Judul Buku</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <textarea class="form-control" name="judul" style="resize: none; height: 149px;" required><?= $row['judul'];?></textarea>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Edisi</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <?php if( $row["edisi"] == "") : ?>
                                    <input type="text" class="form-control" name="edisi" value="" placeholder="-">
                                <?php else : ?>
                                    <input type="text" class="form-control" name="edisi" value="<?= $row['edisi'];?>">
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">ISBN</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <?php if( $row["ISBN"] == "") : ?>
                                    <input type="text" class="form-control" name="ISBN" value="" placeholder="-">
                                <?php else : ?>
                                    <input type="text" class="form-control" name="ISBN" value="<?= $row['ISBN'];?>">
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Bahasa</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <input type="text" class="form-control" name="bahasa" value="<?= $row['bahasa'];?>">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Subjek</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <select class="form-select" name="subjek" required>
                                    <option value="<?= $row['subjek'];?>" selected><?= $row['subjek'];?></option> 
                                    <?php foreach( $subjek as $rowsubjek)  : ?>
                                        <?php if( $row['subjek'] != $rowsubjek['nama_subjek']) : ?>
                                            <option value="<?= $rowsubjek['nama_subjek'];?>"><?= $rowsubjek['nama_subjek'] ?></option>
                                        <?php endif ?>
                                    <?php endforeach?>
                                </select>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Pengarang</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <input type="text" class="form-control" name="pengarang" value="<?= $row['pengarang'];?>">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Penerbit</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <input type="text" class="form-control" name="penerbit" value="<?= $row['penerbit'];?>">
                            </div>
                        </div>
                    </div>
                    <div class="col col-lg-6 col-md-12 col-12">
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Tahun Terbit</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <input type="text" class="form-control" name="tahun_terbit" value="<?= $row['tahun_terbit'];?>">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Tempat Terbit</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <input type="text" class="form-control" name="tempat_terbit" value="<?= $row['tempat_terbit'];?>">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Jumlah</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <input type="text" class="form-control" name="jumlah" value="<?= $row['jumlah'];?>">
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Kondisi</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <select class="form-select" name="kondisi" required>
                                <?php if( $row['kondisi'] == "Bagus") : ?>
                                    <option value="<?= $row['kondisi'];?>" selected><?= $row['kondisi'];?></option>
                                    <option value="Rusak">Rusak</option>
                                    <option value="Tidak Relevan">Tidak Relevan</option>
                                <?php elseif( $row['kondisi'] == "Rusak") : ?>
                                    <option value="<?= $row['kondisi'];?>" selected><?= $row['kondisi'];?></option>
                                    <option value="Bagus">Bagus</option>
                                    <option value="Tidak Relevan">Tidak Relevan</option>
                                <?php elseif( $row['kondisi'] == "Tidak Relevan") : ?>
                                    <option value="<?= $row['kondisi'];?>" selected><?= $row['kondisi'];?></option>
                                    <option value="Bagus">Bagus</option>
                                    <option value="Rusak">Rusak</option>
                                <?php else : ?> 
                                    <option value="" selected>Pilih Kondisi</option>
                                    <option value="Bagus">Bagus</option>
                                    <option value="Rusak">Rusak</option>
                                    <option value="Tidak Relevan">Tidak Relevan</option>
                                <?php endif ?>
                                </select>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header"> Gambar Cover Buku </div>
                            <div class="card-body">
                                <img src="../gambar/buku/<?= $row["cover"]?>" class="img-fluid rounded mx-auto d-block" alt="Cover Buku" style="height: 183px" >
                            </div>
                            <div class="card-footer">
                                <input type="text" hidden class="form-control" name="cover_lama" value="<?= $row["cover"]?>"> 
                                <input type="file" class="form-control" name="cover">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary text-white rounded-pill" name="edit_buku">
                Simpan
            </button>
        </div>
    </div>
</div>