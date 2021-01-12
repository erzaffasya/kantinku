@extends('layouts.main')
@section('body')

<div class="card">
  <form method="post" action="{{route('produk.update',$produk->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <div class="card-header">
    <h4>Form Produk</h4>
  </div>

  <div class="card-body">
    <div class="form-group">
      <label>Nama</label>
      <input type="text" name="nama" value="{{$produk->nama}}" class="form-control">
    </div>
    
    <div class="form-group">
      <label>Stok</label>
      <input type="text" name="stok" value="{{$produk->stok}}" class="form-control">
    </div>

    <div class="form-group">
      <label>Harga</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            $
          </div>
        </div>
        <input name="harga" type="text" value="{{$produk->harga}}" class="form-control currency">
      </div>
    </div>
   
    <div class="form-group">
        <label>Penjual ID</label>
        <input type="text" name="penjual_id" value="{{Auth::User()->id}}" class="form-control currency" readonly/>
    </div>
  

    <div class="form-group">
          <label>Foto Produk</label>
          <input type="file" name="image" value="{{$produk->foto}}" class="form-control">
        </div>
    </div>
 
    <div class="card-footer text-right">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>

  </div>
</form>
</div>

@endsection