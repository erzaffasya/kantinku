@extends('layouts.main')
@section('body')

<div class="card">
  <form method="post" action="{{route('produk.store')}}">
    @csrf
  <div class="card-header">
    <h4>Form Produk</h4>
  </div>

  <div class="card-body">
    <div class="form-group">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control">
    </div>
    
    <div class="form-group">
      <label>Stok</label>
      <input type="text" name="stok" class="form-control">
    </div>

    <div class="form-group">
      <label>Harga</label>
      <div class="input-group">
        <div class="input-group-prepend">
          <div class="input-group-text">
            $
          </div>
        </div>
        <input name="harga" type="text" class="form-control currency">
      </div>
    </div>
   
    <div class="form-group">
        <label>Penjual ID</label>
        <input type="hidden" name="penjual_id" value="{{Auth::User()->id}}">
        <input type="text" value="{{Auth::User()->id}}" class="form-control currency" disabled/>
    </div>
  

    <div class="form-group">
          <label>Foto Produk</label>
          <input type="file" name="foto" class="form-control">
        </div>
    </div>
 
    <div class="card-footer text-right">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>

  </div>
</form>
</div>

@endsection