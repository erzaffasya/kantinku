@extends('layouts.main')
@section('body')

<div class="card">
  <form method="post" action="{{route('Seller.store')}}" enctype="multipart/form-data">
    @csrf
  <div class="card-header">
    <h4>Form Seller</h4>
  </div>

  <div class="card-body">
    <div class="form-group">
      <label>Nama</label>
      <input type="text" name="nama" value="" class="form-control">
    </div>

    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control" required="">
      <div class="invalid-feedback">
        Oh no! Email is invalid.
      </div>
    </div>
        
    <div class="form-group">
      <label>Alamat</label>
      <input type="text" name="alamat" class="form-control">
    </div>

    <div class="form-group">
      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form-control">
        <option>laki-laki</option>
        <option>perempuan</option>
      </select>
    </div>

    <div class="form-group">
      <label>Nama Toko</label>
      <input type="text" name="nama_toko" class="form-control">
    </div>

    <div class="form-group">
      <label>Foto Seller</label>
      <input type="file" name="image" class="form-control">
    </div>

    <div class="card-footer text-right">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>

  </div>
</form>
</div>

@endsection