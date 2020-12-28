<div class="row mt-sm-4">
    <div class="col-12 col-md-12 col-lg-8 center">
        <div class="card">
            <form method="post" class="needs-validation" novalidate="">
                <div class="card-header">
                    <h4>Edit Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label>Nama</label>
                            <input type="text" class="form-control" value="{{$profile->nama}}" required="">
                            <div class="invalid-feedback">
                                Please fill in the first name
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label>Jenis Kelamin</label>
                            <input type="text" class="form-control" value="Maman" required="">
                            <div class="invalid-feedback">
                                Please fill in the last name
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label>Alamat</label>
                            <input type="text" class="form-control" value="{{$profile->alamat}}" required="">
                            <div class="invalid-feedback">
                                Please fill in the first name
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label>Nama Toko</label>
                            <input type="text" class="form-control" value="{{$profile->nama_toko}}" required="">
                            <div class="invalid-feedback">
                                Please fill in the first name
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                            <label>Foto</label>
                            <input type="text" class="form-control" value="{{$profile->foto}}" required="">
                            <div class="invalid-feedback">
                                Please fill in the first name
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>