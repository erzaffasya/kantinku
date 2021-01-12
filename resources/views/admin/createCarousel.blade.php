@extends('layouts.main')
@section('body')

<div class="card">
  <form method="post" action="{{route('Carousel.store')}}" enctype="multipart/form-data">
    @csrf
  <div class="card-header">
    <h4>Form Create Carousel</h4>
  </div>

  <div class="card-body">
    <div class="form-group">
      <label>Nama</label>
      <input type="text" name="nama" value="" class="form-control">
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <input type="text" name="deskripsi" value="" class="form-control">
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