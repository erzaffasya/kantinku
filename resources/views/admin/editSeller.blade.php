@extends('layouts.main')
@section('body')

<div class="card">
  <form method="post" action="{{route('Seller.update',$Seller->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <div class="card-header">
    <h4>FORM EDIT DATA SELLER</h4>
  </div>

  <div class="card-body">
    <div class="form-group">
      <label>Nama</label>
      <input type="text" name="nama" value="{{$Seller->nama}}" class="form-control">
    </div>
    
    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control"> {{$Seller->jenis_kelamin}}
          <option>laki-laki</option>
          <option>perempuan</option>
        </select>
      </div>

      <div class="form-group">
        <label>Alamat</label>
        <input type="text" name="alamat" value="{{$Seller->alamat}}" class="form-control">
      </div>
    
      <div class="form-group">
        <label>Nama Toko</label>
        <input type="text" name="nama_toko" value="{{$Seller->nama_toko}}" class="form-control">
      </div>

      <div class="form-group">
        <label>Foto Produk</label>
        <input type="file" name="image" class="form-control">
      </div>
  
   
    <div class="form-group">
        <label>User ID</label>
        <input type="text" name='user_id' value="{{$Seller->user_id}}" class="form-control currency">
    </div>

 
    <div class="card-footer text-right">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>

  </div>
</form>
</div>

@endsection