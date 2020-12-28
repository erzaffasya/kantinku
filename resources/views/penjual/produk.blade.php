@extends('layouts.main')
@section('title','Dashboard')

@section('body')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Selamat Datang, {{ Auth::user()->name }}</h4>
      </div>
      <div class="card-body">
        <h4>Anda Login Sebagai {{ Auth::user()->role }}</h4>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-12 col-md-12 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>
        <a href="{{route('seller.produk.create',Auth::user()->id)}}">Product Table</a>
        </h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tbody>
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Foto</th>
                <th>Action</th>
              </tr>
              @foreach ($produk as $prdk)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$prdk->nama}}</td>
                <td>{{$prdk->harga}}</td>
                <td>{{$prdk->stok}}</td>
                <td class="gallery ">
                  <img class="gallery-item" src="{{asset('img/products/'.$prdk->foto)}}">
                  {{-- <div class="badge badge-success">Active</div> --}}
                </td>
                <td>
                  <form method="post" action="{{route('produk.destroy',$prdk->id)}}">
                    @csrf
                    @method('DELETE') 
                    <a href="{{route('produk.edit',$prdk->id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-exclamation-triangle"></i> Edit</a>
                  <button type="submit" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Delete</a> </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer text-center">
          {{ ($produk->links()) }}
      </div>
      {{-- <div class="card-footer text-right">
        <nav class="d-inline-block">
          <ul class="pagination mb-0">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
            <li class="page-item">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
            </li>
          </ul>
        </nav>
      </div> --}}

     
    </div>
  </div>
</div>

@endsection