@extends('layouts.main')
@section('body')

<div class="card">
  <form method="post" action="{{route('Transaksi.store')}}">
    @csrf
  <div class="card-header">
    <h4>Form Produk</h4>
  </div>

  <div class="card-body">
    <div class="form-group">
      <label>Nama</label>
      <input type="text" name="pembeli_id" value="{{Auth::user()->name}}" class="form-control" disabled/>
      <input type="hidden" name="pembeli_id" value="{{Auth::user()->name}}" >
    </div>

    <div class="form-group">
      <label>Produk</label>
      <select name='produk_id' class="form-control">
        @foreach ($produk as $item)          
          <option value="{{$item->id}}">{{$item->nama}}</option>
        @endforeach
      </select>
    </div>
        
    <div class="form-group">
      <label>Jumlah</label>
      <input type="text" name="jumlah" class="form-control">
    </div>

    <div class="form-group">
      <label>Status</label>
      <input type="text" name="status" value="Belum Bayar" class="form-control" disabled/>
      <input type="hidden" name="status" value="Belum Bayar" class="form-control" disabled/>
    </div>

    <div class="card-footer text-right">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>

  </div>
</form>
</div>

@endsection