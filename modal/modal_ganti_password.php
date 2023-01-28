<div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
        <!-- Modal Header -->
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password Akun <?= $row["username"]?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <!-- Form / Modal Body -->
            <div class="modal-body">
            <!-- Data -->
                <div class="container-fluid">  
                    <div class="row">
                        <div class="col col-lg-12 col-md-12 col-12">
                            <div class="mb-2">
                                <label for="disabledSelect" class="form-label ms-1">Password</label>
                                <div class="input-group">
                                    <input type="text" hidden class="form-control-plaintext" name="id_user" value="<?= $row["id_user"]?>">
                                    <input type="password"  placeholder="Masukkan Password Baru" class="form-control" name="password" data-toggle="password" id="password" title="Huruf dan Angka (A-Z, a-z, 0-9)" pattern="[A-Za-z0-9]+" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text ms-1 bg-light" style="padding:0.6rem;"><i class="fa fa-eye"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2">
                                <label for="disabledSelect" class="form-label ms-1">Ulang Password</label>
                                <div class="input-group">
                                    <input type="password"  placeholder="Ulangi Password" class="form-control" name="password2" data-toggle="password" id="password" title="Huruf dan Angka (A-Z, a-z, 0-9)" pattern="[A-Za-z0-9]+" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text ms-1 bg-light" style="padding:0.6rem;"><i class="fa fa-eye"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div> 
        <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary rounded-pill" name="edit_password">Simpan</button>
            </div>
        </div>
    </div>