@extends('layouts.main')
@section('body')
<div class="section-header">
  <h1>Dashboard</h1>
</div>
<div class="row">

  <!-- KOTAK PALING KIRI -->
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-primary">
        <i class="far fa-user"></i>
      </div>

      <div class="card-wrap">
        <div class="card-header">
          @if (Auth::user()->role === 'admin')
          <h4>Total Users</h4>
          @elseif (Auth::user()->role === 'seller')
          <h4>Total Produk</h4>
          @elseif (Auth::user()->role === 'buyer')
          <h4>Total Transaksi</h4>
          @endif          
        </div>

        <div class="card-body">
          @if (Auth::user()->role === 'admin')
          <h4>{{($user->count())}}</h4>
          @elseif (Auth::user()->role === 'seller')
          <h4>{{($produk->count())}}</h4>
          @elseif (Auth::user()->role === 'buyer')
          <h4>{{($transaksi->count())}}</h4>
          @endif 
        </div>

      </div>

    </div>
  </div>

  <!-- KOTAK KE-2 PALING KIRI --> 
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-warning">
        <i class="far fa-newspaper"></i>
      </div>

      <div class="card-wrap">

        <div class="card-header">
          @if (Auth::user()->role === 'admin')
          <h4>Total Transaksi</h4>
          @elseif (Auth::user()->role === 'seller')
          <h4>Transaksi Berhasil</h4>
          @elseif (Auth::user()->role === 'buyer')
          <h4>Belum Bayar</h4>
          @endif 
        </div>

        <div class="card-body">
          @if (Auth::user()->role === 'admin')
          <h4>{{($transaksi->count())}}</h4>
          @elseif (Auth::user()->role === 'seller')
          <h4>{{($terjual->count())}}</h4>
          @elseif (Auth::user()->role === 'buyer')
          <h4>{{($belum->count())}}</h4>
          @endif 
        </div>

      </div>

    </div>
  </div>

  <!-- KOTAK KE 3 DARI KIRI -->
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-success">
        <i class="far fa-file"></i>
      </div>

      <div class="card-wrap">        
        <div class="card-header">
          @if (Auth::user()->role === 'admin')
          <h4>Total Produk</h4>
          @elseif (Auth::user()->role === 'seller')
          {{-- <h4>Total Produk</h4> --}}
          @elseif (Auth::user()->role === 'buyer')
          <h4>Sudah Bayar</h4>
          @endif 
        </div>
        
        <div class="card-body">
          @if (Auth::user()->role === 'admin')
          <h4>{{($produk->count())}}</h4>
          @elseif (Auth::user()->role === 'seller')
          {{-- <h4>{{($produk->count())}}</h4> --}}
          @elseif (Auth::user()->role === 'buyer')
          <h4>{{($sudah->count())}}</h4>
          @endif 
        </div>
      </div>

    </div>
  </div>

  <!-- KOTAK KE 4 DARI KIRI -->
  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
    <div class="card card-statistic-1">
      <div class="card-icon bg-danger">
        <i class="fas fa-circle"></i>
      </div>
      
      <div class="card-wrap">
        <div class="card-header">
          @if (Auth::user()->role === 'admin')
          <h4>Akun Penjual</h4>
          @elseif (Auth::user()->role === 'seller')
          {{-- <h4>Total Produk</h4> --}}
          @elseif (Auth::user()->role === 'buyer')
          {{-- <h4>Total Transaksi</h4> --}}
          @endif 
        </div>
        <div class="card-body">
          @if (Auth::user()->role === 'admin')
          <h4>{{($seller->count())}}</h4>
          @elseif (Auth::user()->role === 'seller')
          {{-- <h4>{{($produk->count())}}</h4> --}}
          @elseif (Auth::user()->role === 'buyer')
          {{-- <h4>{{($transaksi->count())}}</h4> --}}
          @endif 
        </div>
      </div>
      
    </div>
  </div>
</div>



<div class="row">
  <div class="col-lg-5 col-md-12 col-12 col-sm-12">
    <form method="post" class="needs-validation" novalidate="">
      <div class="card">
        <div class="card-header">
          <h4>Quick Draft</h4>
        </div>
        <div class="card-body pb-0">
          <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" required>
            <div class="invalid-feedback">
              Please fill in the title
            </div>
          </div>
          <div class="form-group">
            <label>Content</label>
            <textarea class="summernote-simple"></textarea>
          </div>
        </div>
        <div class="card-footer pt-0">
          <button class="btn btn-primary">Save Draft</button>
        </div>
      </div>
    </form>
  </div>
  <div class="col-lg-7 col-md-12 col-12 col-sm-12">
    <div class="card">
      <div class="card-header">
        <h4>Latest Posts</h4>
        <div class="card-header-action">
          <a href="#" class="btn btn-primary">View All</a>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-striped mb-0">
            <thead>
              <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  Introduction Laravel 5
                  <div class="table-links">
                    in <a href="#">Web Development</a>
                    <div class="bullet"></div>
                    <a href="#">View</a>
                  </div>
                </td>
                <td>
                  <a href="#" class="font-weight-600"><img src="../assets/img/avatar/avatar-1.png" alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                </td>
                <td>
                  <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                  <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
              
              <tr>
                <td>
                  Laravel 5 Tutorial - Deploy
                  <div class="table-links">
                    in <a href="#">Web Development</a>
                    <div class="bullet"></div>
                    <a href="#">View</a>
                  </div>
                </td>
                <td>
                  <a href="#" class="font-weight-600"><img src="../assets/img/avatar/avatar-1.png" alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                </td>
                <td>
                  <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                  <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
              <tr>
                <td>
                  Laravel 5 Tutorial - Closing
                  <div class="table-links">
                    in <a href="#">Web Development</a>
                    <div class="bullet"></div>
                    <a href="#">View</a>
                  </div>
                </td>
                <td>
                  <a href="#" class="font-weight-600"><img src="../assets/img/avatar/avatar-1.png" alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                </td>
                <td>
                  <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                  <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection