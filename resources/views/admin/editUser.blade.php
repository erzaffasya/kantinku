@extends('layouts.main')
@section('body')

<div class="card">
  <form method="post" action="{{route('User.update',$User->id)}}">
    @csrf
    @method('PUT')
  <div class="card-header">
    <h4>Form User</h4>
  </div>

  <div class="card-body">
    <div class="form-group">
      <label>Nama</label>
      <input type="text" name="name" value="{{$User->name}}" class="form-control">
    </div>
    
    <div class="form-group">
      <label>Email</label>
      <input type="text" name="email" value="{{$User->email}}" class="form-control">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" value="" class="form-control">
      </div>    
   
      <div class="form-group">
        <label>Role</label>
        <select name='role' class="form-control">{{$User->role}}   
            <option value="admin">ADMIN</option>
            <option value="penjual">PENJUAL</option>
            <option value="pembeli">PEMBELI</option>
        </select>
      </div>  
 
    <div class="card-footer text-right">
      <button type="submit" class="btn btn-primary">Submit</button>
    </div>

  </div>
</form>
</div>

@endsection