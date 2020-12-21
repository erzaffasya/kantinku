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
        <a href="#">User Table</a>
        </h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-md">
            <tbody>
              <tr class="">
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                {{-- <th>Password</th> --}}
                <th>Role</th>
                <th>Action</th>
              </tr>
              @foreach ($User as $usr)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$usr->name}}</td>
                <td>{{$usr->email}}</td>
                {{-- <td>{{$tsk->passsword}}</td> --}}
                <td>{{$usr->role}}</td>
                {{-- <td>
                  <div class="badge badge-success">Active</div>
                </td> --}}
                <td>
                  <form method="post" action="{{route('User.destroy',$usr->id)}}">
                    @csrf
                    @method('DELETE') 
                    <a href="{{route('User.edit',$usr->id)}}" class="btn btn-icon icon-left btn-warning"><i class="fas fa-exclamation-triangle"></i> Edit</a>
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
        {{ ($User->links()) }}
    </div>
    </div>
  </div>
</div>

@endsection