@extends('layouts.main')
@section('body')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4>Laporan Transaksi</h4>
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
        <a href="{{route('page')}}">Transaction Table</a>
        </h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tbody>
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              @foreach ($Transaksi as $tsk)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$tsk->nama}}</td>
                <td>{{$tsk->produks}}</td>
                <td>{{$tsk->jumlah}}</td>
                <td>Rp. {{$tsk->total_harga}}</td>
                <td>
                  @if (Auth::user()->role == 'admin')
                    <form method="post" action="{{route('Transaksi.update',$tsk->id)}}">
                      @csrf
                      @method('PUT')
                        @if ($tsk->status == 'Belum Bayar')
                          <input name="status" value="Sudah Bayar" type="hidden">
                          <button type="submit" class="badge badge-warning">Belum Bayar</button>                  
                        @else
                          <input name="status" value="Belum Bayar" type="hidden">
                          <button type="submit" class="badge badge-success">Sudah Bayar</button>
                        @endif
                    </form>
                  @else
                      @if ($tsk->status == 'Belum Bayar')
                        <button type="submit" class="badge badge-warning">Belum Bayar</button>                  
                      @else
                        <button type="submit" class="badge badge-success">Sudah Bayar</button>
                      @endif
                  @endif
                </td>
                <td>
                  <a href="{{route('Transaksi.show',$tsk->id)}}" target="_blank" class="btn btn-icon icon-left btn-warning">Invoice </a>                
                  @if ($tsk->status == 'Belum Bayar')                  
                    <form method="post" action="{{route('Transaksi.destroy',$tsk->id)}}">
                      @csrf
                      @method('DELETE') 
                    <button type="submit" class="btn btn-icon icon-left btn-danger"></i>Delete</a> </button>                    
                    </form>
                  @endif
                </td>            
               


              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer text-center">
        {{ ($Transaksi->links()) }}
    </div>
    </div>
  </div>
</div>

@endsection