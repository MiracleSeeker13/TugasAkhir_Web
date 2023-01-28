<div class="modal-dialog text-start modal-dialog-centered modal-dialog-scrollable modal-lg ">
        <div class="modal-content">
        <!-- Modal Header -->
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Kelola Akun</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <!-- Form / Modal Body -->
            <div class="modal-body">
            <!-- Data -->
                <div class="container-fluid">  
                    <div class="row">
                        <div class="col col-lg-4 col-md-12 col-12 mb-3">
                            <div class="card">
                                <div class="card-header"> Foto Profil Akun </div>
                                <div class="card-body">
                                    <img src="../gambar/akun/<?= $row["gambar"]?>" class="img-fluid rounded mx-auto d-block" alt="Logo" height="150" >
                                </div>
                                <div class="card-footer">
                                    <input type="text" hidden class="form-control" name="gambar_lama" value="<?= $row["gambar"]?>"> 
                                    <input type="file" class="form-control" name="gambar">
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-8 col-md-12 col-12 mb-3">
                                <input type="text" hidden class="form-control-plaintext" name="id_user" value="<?= $row["id_user"]?>">
                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-md-4 col-5 col-form-label">Nomor Identitas</label>
                                <div class="col-lg-8 col-md-8 col-7">
                                    <input type="text" hidden class="form-control" name="no_identitas_lama" value="<?= $row["no_identitas"]?>">   
                                    <input type="text" class="form-control" name="no_identitas" value="<?= $row["no_identitas"]?>" title="Angka (0-9)" pattern="[0-9]+" required>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-md-4 col-5 col-form-label">Username</label>
                                <div class="col-lg-8 col-md-8 col-7">   
                                    <input type="text" class="form-control" name="username" value="<?= $row["username"]?>" title="Huruf dan Angka (A-Z, a-z, 0-9)" pattern="[A-Za-z0-9 .,]+" minlength="4" required>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <label class="col-lg-4 col-md-4 col-5 col-form-label">Email</label>
                                <div class="col-lg-8 col-md-8 col-7">   
                                    <input type="email" class="form-control" name="email" value="<?= $row["email"]?>" required>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Hak Akses</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <select class="form-select" name="level" required>
                                <?php if( $row['level'] == "admin") : ?>
                                    <option value="<?= $row['level'];?>" selected><?= $row['level'];?></option>
                                    <option value="pengunjung">pengunjung</option>
                                <?php elseif( $row['level'] == "pengunjung") : ?>
                                    <option value="<?= $row['level'];?>" selected><?= $row['level'];?></option>
                                    <option value="admin">admin</option>
                                <?php else : ?> 
                                    <option value="" selected>Pilih Hak Akses</option>
                                    <option value="admin">admin</option>
                                    <option value="pengunjung">pengunjung</option>
                                <?php endif ?>
                                </select>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                </div> 
        <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger rounded-pill" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary rounded-pill" name="admin_edit_akun">Simpan</button>
            </div>
        </div>
    </div>