@extends('layouts.main')
@section('body')

<div class="card">
  <form method="post" action="{{route('User.store')}}" enctype="multipart/form-data">
    @csrf
  <div class="card-header">
    <h4>Form User</h4>
  </div>

  <div class="card-body">
    <div class="form-group">
      <label>Nama</label>
      <input type="text" name="nama"  class="form-control">
    </div>
    
    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" class="form-control">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password"  class="form-control">
      </div>    
   
      <div class="form-group">
        <label>Role</label>
        <select name='role' class="form-control">  
            <option value="admin">ADMIN</option>
            <option value="seller">PENJUAL</option>
            <option value="buyer">PEMBELI</option>
        </select>
      </div>  

    <div class="form-group">
        <label>Foto</label>
        <input type="file" name="image" class="form-control">
    </div>
 
    <div class="card-footer text-right">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>

  </div>
</form>
</div>

@endsection