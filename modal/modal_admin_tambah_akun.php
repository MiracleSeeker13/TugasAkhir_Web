<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-fluid">  
                <div class="row">
                    <div class="col col-lg-12 col-md-12 col-12">
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Nomor Identitas</label>
                            <div class="col-lg-8 col-md-8 col-7">   
                                <input type="text" class="form-control" name="no_identitas" title="Angka (0-9)" pattern="[0-9]+" required>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Username</label>
                            <div class="col-lg-8 col-md-8 col-7">   
                                <input type="text" class="form-control" name="username" title="Huruf dan Angka (A-Z, a-z, 0-9)" pattern="[A-Za-z0-9 .,]+" minlength="4" required>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Email</label>
                            <div class="col-lg-8 col-md-8 col-7">   
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Password</label>
                            <div class="col-lg-8 col-md-8 col-7"> 
                                <div class="input-group">  
                                    <input type="password" class="form-control" name="password" data-toggle="password" id="password" title="Huruf dan Angka (A-Z, a-z, 0-9)" pattern="[A-Za-z0-9]+" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text ms-1 bg-light" style="padding:0.6rem;"><i class="fa fa-eye"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Konfirmasi Password</label>
                            <div class="col-lg-8 col-md-8 col-7">   
                                <div class="input-group">
                                    <input type="password" class="form-control" name="password2" data-toggle="password" id="password" title="Huruf dan Angka (A-Z, a-z, 0-9)" pattern="[A-Za-z0-9]+" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text ms-1 bg-light" style="padding:0.6rem;"><i class="fa fa-eye"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Hak Akses</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                    <select class="form-select" name="level" required>
                                        <option value="" selected>Pilih Hak Akses</option>
                                        <option value="admin">admin</option>
                                        <option value="pengunjung">pengunjung</option>
                                    </select>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <label class="col-lg-4 col-md-4 col-5 col-form-label">Foto Profil Akun</label>
                            <div class="col-lg-8 col-md-8 col-7">
                                <input type="file" class="form-control" name="gambar" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary rounded-pill" name="admin_tambah_akun">
                Simpan
            </button>
        </div>
    </div>
</div>