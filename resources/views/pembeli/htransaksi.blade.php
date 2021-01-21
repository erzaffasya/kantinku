@extends('layouts.main')
@section('body')


<div class="section-header">
  <h1>Form Pemesanan</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Forms</a></div>
    <div class="breadcrumb-item">Editor</div>
  </div>
</div>


<div class="section-body">
  <form method="post" action="{{route('pembeli.htransaksi.store',Auth::user()->id)}}" enctype="multipart/form-data">
    @csrf
  <h2 class="section-title">Transaksi</h2>
  <p class="section-lead">Form Tambah Pemesanan.</p>

  <div class="card author-box card-primary">
    <div class="card-body">
      <div class="author-box-left ">
        <img alt="image" src="{{asset('img/products/'.$produk->foto)}}" class="rounded-circle author-box-picture">
        <div class="clearfix" style="padding-top: 15px">Stok Barang</div>
        <div class="clearfix">
          <h1>{{$produk->stok}}</h1>
        </div>
      </div>
      <div class="author-box-details">
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Barang</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" value="{{$produk->nama}}" class="form-control" disabled/>
          </div>
        </div>
        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" id="harga" value="{{$produk->harga}}" class="form-control" disabled/>
            <input type="hidden" name="pembeli_id" value="{{Auth::user()->id}}" class="form-control">
            <input type="hidden" name="produk_id" value="{{$produk->id}}" class="form-control">
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah</label>
          <div class="col-sm-12 col-md-7">
            <input type="number" name="jumlah" id="jumlah" onKeyDown="return false" oninput="totalHarga()" min="1" max="{{$produk->stok}}" class="form-control" >
          </div>
        </div>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total Harga</label>
          <div class="col-sm-12 col-md-7">
            <input type="text" name="total_harga" id="totalharga"  class="form-control" readonly/>
          </div>
        </div>

      <script>
        function totalHarga() {
        var harga = document.getElementById("harga").value;
        var jumlah = document.getElementById("jumlah").value;
        document.getElementById("totalharga").value = jumlah*harga;
       }

      </script>

        <div class="form-group row mb-4">
          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
          <div class="col-sm-12 col-md-7 text-right">
            <button type="submit" class="btn btn-primary ">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
</div>
@endsection